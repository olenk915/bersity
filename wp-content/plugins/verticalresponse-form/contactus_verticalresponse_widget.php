<?php
/*
  The VerticalResponse Form Plugin by ContactUs.com.
 */

//ActiveCampaign Subscribe Box widget extend 

class contactus_verticalresponse_Widget extends WP_Widget {

	function contactus_verticalresponse_Widget() {
		$widget_ops = array( 
			'description' => __('Displays a VerticalResponse Newsletter Subscribe Form by ContactUs.com', 'contactus_ac')
		);
		$this->WP_Widget('contactus_verticalresponse_Widget', __('VerticalResponse Form by ContactUs.com', 'contactus_ac'), $widget_ops);
	}

	function widget( $args, $instance ) {
		if (!is_array($instance)) {
			$instance = array();
		}
		contactus_verticalresponse_signup_form(array_merge($args, $instance));
	}
};

function contactus_verticalresponse_signup_form($args = array()) {
    extract($args);
    $cUs_form_key = get_option('cUsVR_settings_form_key'); //get the saved verticalresponse settings
    
    if(strlen($cUs_form_key)):
        $xHTML  = '<aside id="cUsMC_form_widget" style="clear:both;min-height:250px;margin:10px auto;">';
        $xHTML .= '<script type="text/javascript" src="//cdn.contactus.com/cdn/forms/'. $cUs_form_key .'/inline.js"></script>';
        $xHTML .= '</aside>';
        
        echo $xHTML;
    endif;
};  

?>
