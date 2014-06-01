<?php
/**
Plugin Name: Facebook Profile Master
Plugin URI: http://wordpress.techgasp.com/facebook-profile-master/
Version: 4.3
Author: TechGasp
Author URI: http://wordpress.techgasp.com
Text Domain: facebook-profile-master
Description: Facebook Profile Master gives you full control over all Facebook User Profile plugins, Facebook User Badges and Facebook Follow Button.
License: GPL2 or later
*/
/*  Copyright 2013 TechGasp  (email : info@techgasp.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!class_exists('facebook_profile_master')) :
///////DEFINE ID//////
define('FACEBOOK_PROFILE_MASTER_ID', 'facebook-profile-master');
///////DEFINE VERSION///////
define( 'facebook_profile_master_VERSION', '4.3' );
global $facebook_profile_master_version, $facebook_profile_master_name;
$facebook_profile_master_version = "4.3"; //for other pages
$facebook_profile_master_name = "Facebook Profile Master"; //pretty name
if( is_multisite() ) {
update_site_option( 'facebook_profile_master_installed_version', $facebook_profile_master_version );
update_site_option( 'facebook_profile_master_name', $facebook_profile_master_name );
}
else{
update_option( 'facebook_profile_master_installed_version', $facebook_profile_master_version );
update_option( 'facebook_profile_master_name', $facebook_profile_master_name );
}
// HOOK ADMIN
require_once( dirname( __FILE__ ) . '/includes/facebook-profile-master-admin.php');
// HOOK ADMIN IN & UN SHORTCODE
require_once( dirname( __FILE__ ) . '/includes/facebook-profile-master-admin-shortcodes.php');
// HOOK ADMIN WIDGETS
require_once( dirname( __FILE__ ) . '/includes/facebook-profile-master-admin-widgets.php');
// HOOK ADMIN ADDONS
require_once( dirname( __FILE__ ) . '/includes/facebook-profile-master-admin-addons.php');
// HOOK ADMIN UPDATER
require_once( dirname( __FILE__ ) . '/includes/facebook-profile-master-admin-updater.php');
// HOOK WIDGET BUTTONS
require_once( dirname( __FILE__ ) . '/includes/facebook-profile-master-widget-buttons.php');


class facebook_profile_master{
//REGISTER PLUGIN
public static function facebook_profile_master_register(){
register_setting(FACEBOOK_PROFILE_MASTER_ID, 'tsm_quote');
}
public static function content_with_quote($content){
$quote = '<p>' . get_option('tsm_quote') . '</p>';
	return $content . $quote;
}
//SETTINGS LINK IN PLUGIN MANAGER
public static function facebook_profile_master_links( $links, $file ) {
	if ( $file == plugin_basename( dirname(__FILE__).'/facebook-profile-master.php' ) ) {
		$links[] = '<a href="' . admin_url( 'admin.php?page=facebook-profile-master' ) . '">'.__( 'Settings' ).'</a>';
	}

	return $links;
}

public static function facebook_profile_master_updater_version_check(){
global $facebook_profile_master_version;
//CHECK NEW VERSION
$facebook_profile_master_slug = basename(dirname(__FILE__));
$current = get_site_transient( 'update_plugins' );
$facebook_profile_plugin_slug = $facebook_profile_master_slug.'/'.$facebook_profile_master_slug.'.php';
@$r = $current->response[ $facebook_profile_plugin_slug ];
if (empty($r)){
$r = false;
$facebook_profile_plugin_slug = false;
if( is_multisite() ) {
update_site_option( 'facebook_profile_master_newest_version', $facebook_profile_master_version );
}
else{
update_option( 'facebook_profile_master_newest_version', $facebook_profile_master_version );
}
}
if (!empty($r)){
$facebook_profile_plugin_slug = $facebook_profile_master_slug.'/'.$facebook_profile_master_slug.'.php';
@$r = $current->response[ $facebook_profile_plugin_slug ];
if( is_multisite() ) {
update_site_option( 'facebook_profile_master_newest_version', $r->new_version );
}
else{
update_option( 'facebook_profile_master_newest_version', $r->new_version );
}
}
}
		// Advanced Updater

//END CLASS
}
if ( is_admin() ){
	add_action('admin_init', array('facebook_profile_master', 'facebook_profile_master_register'));
	add_action('init', array('facebook_profile_master', 'facebook_profile_master_updater_version_check'));
}
add_filter('the_content', array('facebook_profile_master', 'content_with_quote'));
add_filter( 'plugin_action_links', array('facebook_profile_master', 'facebook_profile_master_links'), 10, 2 );
endif;