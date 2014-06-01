<?php
//Hook Widget
add_action( 'widgets_init', 'facebook_profile_master_widget_buttons' );
//Register Widget
function facebook_profile_master_widget_buttons() {
register_widget( 'facebook_profile_master_widget_buttons' );
}

class facebook_profile_master_widget_buttons extends WP_Widget {
	function facebook_profile_master_widget_buttons() {
	$widget_ops = array( 'classname' => 'FB Profile Master - Buttons Widget', 'description' => __('FB Profile Master - Buttons Widget is perfect to let People Subscribe to your Public Updates. ', 'facebook_profile_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'facebook_profile_master_widget_buttons' );
	$this->WP_Widget( 'facebook_profile_master_widget_buttons', __('FB Profile Master - Buttons Widget', 'facebook_profile_master'), $widget_ops, $control_ops );
	}
	
function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$facebook_profile_title = isset( $instance['facebook_profile_title'] ) ? $instance['facebook_profile_title'] :false;
		$facebook_profile_title_new = isset( $instance['facebook_profile_title_new'] ) ? $instance['facebook_profile_title_new'] :false;
		$facebookprofilespacer ="'";
		$show_facebook_follow = isset( $instance['show_facebook_follow'] ) ? $instance['show_facebook_follow'] :false;
		$facebook_user_page = $instance['facebook_user_page'];
		echo $before_widget;
		
		// Display the widget title
	if ( $facebook_profile_title ){
		if (empty ($facebook_profile_title_new)){
		$facebook_profile_title_new = get_option('facebook_profile_master_name');
		}
		echo $before_title . $facebook_profile_title_new . $after_title;
	}
	else{
	}
	//Display Facebook Follow
	if ( $show_facebook_follow ){
			echo '<iframe src="//www.facebook.com/plugins/follow?href='.$facebook_user_page.'&amp;layout=button_count&amp;show_faces=false&amp;colorscheme=light&amp;width=450&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:visible; width:450px; height:21px;" allowTransparency="true"></iframe>';
	}
	else{
	}
	echo $after_widget;
}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['facebook_profile_title'] = strip_tags( $new_instance['facebook_profile_title'] );
		$instance['facebook_profile_title_new'] = $new_instance['facebook_profile_title_new'];
		$instance['show_facebook_follow'] = $new_instance['show_facebook_follow'];
		$instance['facebook_user_page'] = $new_instance['facebook_user_page'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'facebook_profile_title_new' => __('Facebook Profile Master', 'facebook_profile_master'), 'facebook_profile_title' => true, 'facebook_profile_title_new' => false, 'show_facebook_follow' => false, 'facebook_user_page' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['facebook_profile_title'], true ); ?> id="<?php echo $this->get_field_id( 'facebook_profile_title' ); ?>" name="<?php echo $this->get_field_name( 'facebook_profile_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'facebook_profile_title' ); ?>"><b><?php _e('Display Widget Title', 'facebook_profile_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'facebook_profile_title_new' ); ?>"><?php _e('Change Title:', 'facebook_profile_master'); ?></label>
	<br>
	<input id="<?php echo $this->get_field_id( 'facebook_profile_title_new' ); ?>" name="<?php echo $this->get_field_name( 'facebook_profile_title_new' ); ?>" value="<?php echo $instance['facebook_profile_title_new']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_facebook_follow'], true ); ?> id="<?php echo $this->get_field_id( 'show_facebook_follow' ); ?>" name="<?php echo $this->get_field_name( 'show_facebook_follow' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_facebook_follow' ); ?>"><b><?php _e('Display Facebook Follow Button', 'facebook_profile_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'facebook_user_page' ); ?>"><?php _e('insert Facebook Profile link:', 'facebook_profile_master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'facebook_user_page' ); ?>" name="<?php echo $this->get_field_name( 'facebook_user_page' ); ?>" value="<?php echo $instance['facebook_user_page']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Facebook Profile Master Website</b>
	</p>
	<p><a class="button-secondary" href="http://wordpress.techgasp.com/facebook-profile-master/" target="_blank" title="Facebook Profile Master Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/facebook-profile-master-documentation/" target="_blank" title="Facebook Profile Master Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/facebook-profile-master/" target="_blank" title="Visit Website">Get Add-ons</a></p>
	<?php
	}
 }
?>