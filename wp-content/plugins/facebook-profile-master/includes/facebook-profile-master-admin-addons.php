<?php
if( is_multisite() ) {
	function menu_multi_facebook_profile_admin_addons(){
	// Create menu
	add_submenu_page( 'facebook-profile-master', 'Add-ons', 'Add-ons', 'manage_options', 'facebook-profile-master-admin-addons', 'facebook_profile_master_admin_addons' );
	}
}
else {
	// Create menu
	function menu_single_facebook_profile_admin_addons(){
		if ( is_admin() )
		add_submenu_page( 'facebook-profile-master', 'Add-ons', 'Add-ons', 'manage_options', 'facebook-profile-master-admin-addons', 'facebook_profile_master_admin_addons' );
	}
}

function facebook_profile_master_admin_addons(){
?>
<div class="wrap">
<div style="width:40px; vertical-align:middle; float:left;"><img src="<?php echo plugins_url('../images/techgasp-minilogo.png', __FILE__); ?>" alt="' . esc_attr__( 'TechGasp Plugins') . '" /><br /></div>
<h2><b>&nbsp;<?php echo get_option('facebook_profile_master_name'); ?> Add-ons</b></h2>
<?php
if(!class_exists('facebook_profile_master_admin_addons_table')){
	require_once( dirname( __FILE__ ) . '/facebook-profile-master-admin-addons-table.php');
}
//Prepare Table of elements
$wp_list_table = new facebook_profile_master_admin_addons_table();
//Table of elements
$wp_list_table->display();

?>
</br>

<h2>IMPORTANT: Makes no use of Javascript or Ajax to keep your website fast and conflicts free</h2>

<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>

<br>

<p>
<a class="button-secondary" href="http://wordpress.techgasp.com" target="_blank" title="Visit Website">More TechGasp Plugins</a>
<a class="button-secondary" href="http://wordpress.techgasp.com/support/" target="_blank" title="Facebook Page">TechGasp Support</a>
<a class="button-primary" href="http://wordpress.techgasp.com/facebook-profile-master/" target="_blank" title="Visit Website"><?php echo get_option('facebook_profile_master_name'); ?> Info</a>
<a class="button-primary" href="http://wordpress.techgasp.com/facebook-profile-master-documentation/" target="_blank" title="Visit Website"><?php echo get_option('facebook_profile_master_name'); ?> Documentation</a>
<a class="button-primary" href="http://wordpress.techgasp.com/facebook-profile-master/" target="_blank" title="Visit Website">Get Add-ons</a>
</p>
<?php
}
if( is_multisite() ) {
add_action( 'network_admin_menu', 'menu_multi_facebook_profile_admin_addons' );
}
else {
add_action( 'admin_menu', 'menu_single_facebook_profile_admin_addons' );
}