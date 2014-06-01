<?php
/**
 * Plugin Name: WordPress Restrict Email Domains
 * Plugin URI: http://buddydev.com/plugins/wordpress-restrict-email-domains/
 * Version:1.0.1
 * Author: Brajesh singh
 * Author URI: http://buddydev.com
 * Description: Allows you to limit user registration by emails, domains(e.g example.com) or domain extensions(e.g .com,.edu). 
 */
/**
 * Admin Page 
 */
          
class BPDevRestrictedRegDomainAdmin{
    
    private static $instance;
    private $settings;//instance of BPDevBannedDomainSettings
    private $page_title= '';
    private $menu_title= '';
    private $option_name='';
    private $section_name='general';
    private $cap='manage_options';
    private $slug='restrict-domain-admin';
    
    function __construct(BPDevRestrictedRegDomainSettings $settings) {
        $this->settings=$settings;
        $this->page_title=__('Restrict Email Domains','restricted-domain-registration');
        $this->menu_title=__('Restrict Email Domains','restricted-domain-registration');
        $this->section_title=__('Restrict Email Domains','restricted-domain-registration');
        $this->option_title=__('Allowed domains/emails/extensions','restricted-domain-registration');
        $this->option_name=  $this->settings->get_settings_key();
        add_action('admin_init',array($this,'register_settings'));
        add_action('admin_menu',array($this,'add_menu'));
        
       // add_filter('bp_core_validate_user_signup',array($this,'ban'),20);
    }
    
    function get_instance(BPDevRestrictedRegDomainSettings $settings){
        if(!isset (self::$instance))
                self::$instance=new self($settings);
        return self::$instance;
    }
    
    function add_menu(){
        add_options_page($this->page_title,$this->menu_title, $this->cap, $this->slug, array($this,'render_settings'));
           
    }
    
    function register_settings(){
        register_setting($this->option_name, $this->option_name,array($this,'validate'));
        add_settings_section($this->section_name, $this->section_title, array($this,'description'),$this->slug);

        add_settings_field($this->option_name, $this->option_title, array($this,'description_field'), $this->slug, $this->section_name);
        add_settings_field('bpdev_ban_error_message', __('Error Message ','restricted-domain-registration'), array($this,'description_error'), $this->slug, $this->section_name);

    }
  function validate($input){
     //let us save global data
     //update_site_option('bpdev_banned_domains_list', $input); 
      return $input;
      
  }
  function description(){
      _e('<p>This sections allows you to include the domain, email, domain extension you want to allow.</p>','restricted-domain-registration');
      
      
  }
  function description_field(){?>
    <p><?php _e('Please enter domain names, emails and/or the domain extnesions from which you want to allow the registration.','restricted-domain-registration');?></p>      
    <textarea name="<?php echo $this->option_name;?>[allowed_list]" cols="80" rows="10" tabindex="1"><?php echo $this->settings->get_allowed_list();?></textarea>
      
 <?php      
  }  
   function description_error(){?>
    <p><?php _e('Please enter the error message you want to show the user when they try to register with emails/domain which are not allowed.','restricted-domain-registration');?></p>      

    <textarea name="<?php echo $this->option_name;?>[ban_message]" cols="80" rows="5" tabindex="2"><?php echo $this->settings->get_error_message();?></textarea>
 
<?php      
  }  
 
  function update(){
     
      if(!empty($_POST['submit'])&&  current_user_can($this->cap)&&  wp_verify_nonce($_POST['_wpnonce'],$this->option_name."-options")){
              $this->settings->update_settings ($_POST[$this->option_name]);
      ?>
    <div class='updated'><p><?php _e('Settings updated','restricted-domain-registration');?></p></div>
    <?php
      }
    else if(isset($_POST['submit'])){
       wp_die(__('Epic Fail! The sky is falling!','restricted-domain-registration'));
  }
  
  
  }
  
  function render_settings(){
      ?>
 <div class="wrap">
         <?php screen_icon();?>
     <h2><?php echo esc_html( $this->menu_title ); ?></h2>
     <?php $this->update();?>
     <form method='post' action="">
             <?php settings_fields( $this->option_name ); ?>
             <?php do_settings_sections( $this->slug ); ?>
           
           
           
            <?php submit_button(); ?>
        </form>
    </div>
      <?php
  }
}



/**
 * BannedDomain settings, an array with keys 'ban_list','ban_message'
 */
class BPDevRestrictedRegDomainSettings{
    private $option_name='bpdev_restricted_reg_domain_settings';
 
    public function __construct(){
        
    }
    /**
     *
     * @return type boolean true if plugin is network active else false
     */
    function is_network_active(){
        return self::is_plugin_active_for_network(plugin_basename(__FILE__));
    }
    
     //a copy of wp-admin/includes/plugin.php#is_plugin_active_for_network   
    function is_plugin_active_for_network( $plugin ) {
            if ( !is_multisite() )
                    return false;

            $plugins = get_site_option( 'active_sitewide_plugins');
            if ( isset($plugins[$plugin]) )
                    return true;

            return false;
    }
     
    function get_settings_key(){
        return $this->option_name;
    }
    function update_settings($settings){
        //if plugin is network active, store in site meta else in blog meta
        if(self::is_network_active()){    
            update_site_option($this->option_name, $settings);
        } else{
          update_option($this->option_name, $settings);  
        }     
    }
    function get_settings(){
        $default=array('ban_message'=>__('Sorry, you are not allowed!','restricted-domain-registration'),'allowed_list'=>'gmail.com');
        
        if(self::is_network_active()){
            $settings=get_site_option($this->option_name,$default);
        } else{
        
             $settings=get_option($this->option_name,$default);
            
        }
        
        return $settings;
    }
    
    function get_allowed_list(){
        $settings=$this->get_settings();
        $banned_list=$settings['allowed_list'];
    return $banned_list;
}


 /**
 * what error message to show
 * @return type 
 */
function get_error_message(){
    $settings=$this->get_settings();
    return $settings['ban_message'];
}
    
}

BPDevRestrictedRegDomainAdmin::get_instance(new BPDevRestrictedRegDomainSettings());
////end of admin class
class BPDevRestrictedRegDomain{
    private static $instance;
    private $settings;
    function __construct(BPDevRestrictedRegDomainSettings $settings) {
        $this->settings=$settings;
                
        add_filter('wpmu_validate_user_signup',array($this,'ban_bp'),20);//this will do it for wpms/BuddyPress 
        add_filter('registration_errors',array($this,'ban_wp'),20,3);//for normal wp
        //include languages file
        add_action('plugins_loaded',array(&$this,'load_textdomain'));
    }
    
    function get_instance(BPDevRestrictedRegDomainSettings $settings){
        if(!isset (self::$instance))
                self::$instance=new self($settings);
        return self::$instance;
    }

        //localization
     function load_textdomain() {
            $locale = apply_filters( 'wp_limited_domain_registration_get_locale', get_locale() );


            // if load .mo file
            if ( !empty( $locale ) ) {
                    $mofile_default = sprintf( '%slanguages/%s.mo', plugin_dir_path(__FILE__), $locale );

                    $mofile = apply_filters( 'wp_restricted_domain_registration_mofile', $mofile_default );

                    if ( file_exists( $mofile ) ) {
                        // make sure file exists, and load it
                            load_textdomain( 'restricted-domain-registration', $mofile );
                    }
            }
    }

    
    function is_allowed($email_or_domain){
        $extensions=  $this->settings->get_allowed_list();
        if(empty($extensions))
            return false;//we haven't allowed any domain/extension/email
           
        //let us replace the line break space and any other mistakes a user might have commited in updating the settings
        $extensions= preg_quote( $extensions);//quote any reex character like . etc
        $extensions=preg_replace("/([\t\n\s]+)/", ",", $extensions);
        //now, let us build a pattern which checks if the subject ends with
       $extn_pattern=  '/('.str_replace(",", "|", $extensions).')$/';
      
        $matches=array();//we won't need it any way
        $i=preg_match_all($extn_pattern, $email_or_domain,$matches);
        
        if($i===0)
            return false;
        return true;
    }
    
    function ban_bp($info){
       
        if(!$this->is_allowed($info['user_email']))
            $info['errors']->add('user_email',$this->settings->get_error_message());
	return $info;		
    }
    
    function ban_wp($errors,$user_login,$email){
        if(!$this->is_allowed($email))
            $errors->add( 'email_banned', sprintf (__('<strong>ERROR</strong>: %s','restricted-domain-registration' ),$this->settings->get_error_message() ));
	return $errors;	
    }
    

}
BPDevRestrictedRegDomain::get_instance(new BPDevRestrictedRegDomainSettings());
?>