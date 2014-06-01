<?php
if(!class_exists('WP_List_Table')){
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class facebook_profile_master_admin_addons_table extends WP_List_Table {
	/**
	 * Display the rows of records in the table
	 * @return string, echo the markup of the rows
	 */
	function display() {
?>
<table class="widefat fixed" cellspacing="0">
	<thead>
		<tr>
			<th id="columnname" class="manage-column column-columnname" scope="col" width="300"><legend><h3><img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Screenshot', 'facebook_profile_master'); ?></h3></legend></th>
			<th id="columnname" class="manage-column column-columnname" scope="col"><h3><img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Description', 'facebook_profile_master'); ?></h3></legend></th>
			<th id="columnname" class="manage-column column-columnname" scope="col"><h3><img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" /><?php _e('&nbsp;Installed', 'facebook_profile_master'); ?></h3></legend></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th class="manage-column column-columnname" scope="col" width="300"><a class="button-primary" href="http://wordpress.techgasp.com/facebook-profile-master/" target="_blank" title="Get Add-ons" style="float:left;">Get Add-ons</a></p></th>
			<th class="manage-column column-columnname" scope="col"></th>
			<th class="manage-column column-columnname" scope="col"><a class="button-primary" href="http://wordpress.techgasp.com/facebook-profile-master/" target="_blank" title="Get Add-ons" style="float:right;">Get Add-ons</a></p></th>
		</tr>
	</tfoot>

	<tbody>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-facebookprofilemaster-admin-addons-widget-buttons.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Facebook Profile Master Buttons Widget</h3><p>The Advanced Facebook Follow Button turns your Facebook User Profile "virulent" by allowing people to Subscribe to your Facebook Public Updates in your Wordpress Website. Watch those Facebook Subscribers explode!</p><p>Looks great when published under any of the below widgets, remember you can always hide the widget title to get the button closer to the below widgets.</p><p>Navigate to your wordpress widgets page and start using it.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-check-yes.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-facebookprofilemaster-admin-addons-widget-profile.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Facebook Profile Master Profile Widget</h3><p>This "Top of the Line" Widget is perfect to share your Facebook User Information. Intended for Facebook User Profiles that need professional integration into WordPress. Fully Mobile Responsive.</p><p>We achieved fast website page load speeds and perfect Google SEO by encapsulating and cleaning the facebook script.</p><p>Check Add-ons Page.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-check-no.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-facebookprofilemaster-admin-addons-widget-like.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Facebook Profile Master Like Widget</h3><p>Perfect to show off your Favourite Facebook Pages.</p><p>We achieved fast website page load speeds and perfect Google SEO by encapsulating and cleaning the facebook script. Fully Mobile Responsive.</p><p>Check Add-ons Page.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-check-no.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-facebookprofilemaster-admin-addons-widget-page.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Facebook Profile Master Page Widget</h3><p>Perfect to Share your Facebook Page Information.</p><p>We achieved fast website page load speeds and perfect Google SEO by encapsulating and cleaning the facebook script. Fully Mobile Responsive.</p><p>Check Add-ons Page.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-check-no.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-facebookprofilemaster-admin-addons-widget-photo.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Facebook Profile Master Photos Widget</h3><p>Perfect to Share your Facebook Photos.</p><p>We achieved fast website page load speeds and perfect Google SEO by encapsulating and cleaning the facebook script. Fully Mobile Responsive.</p><p>Check Add-ons Page.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-check-no.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-facebookprofilemaster-admin-addons-shortcode-in.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Individual Shortcode</h3><p>Facebook Profile Master uses TechGasp Wordpress Framework. The <b>Individual Shortcode</b> allows you to have a different customized shortcode in each page or post. Easy to use it can be found when you edit a page or a post under the wordpress text editor. Once you have created your shortcode, Just insert the shortcode <b>[facebook-profile-master]</b> anywhere inside that text.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-check-no.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-facebookprofilemaster-admin-addons-shortcode-un.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Universal Shortcode</h3><p>Facebook Profile Master uses TechGasp Wordpress Framework. The <b>Universal Shortcode</b> allows you to have the same shortcode across different pages or posts. Easy to use it can be found right here under the Shortcodes menu. Once you have created your shortcode, Just insert the shortcode <b>[facebook-profile-master-un]</b> anywhere inside the text of your pages or posts.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-check-no.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr>
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-facebookprofilemaster-admin-addons-updater.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Advanced Updater</h3><p>The Advanced Updater allows you to easily Update / Upgrade your Advanced Plugin. You can instantly update your plugin after we release a new version with more goodies without having to wait for the nightly native wordpress updater that runs every 24/48 hours. Get it fresh, get it fast.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-check-no.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
		<tr class="alternate">
			<td class="column-columnname" width="300" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-facebookprofilemaster-admin-addons-support.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="300px" height="139px" style="padding:5px;"/></td>
			<td class="column-columnname"style="vertical-align:middle"><h3>Award Winning Professional Support</h3><p>Need professional help deploying this plugin? TechGasp provides 24/7 award winning professional wordpress support for all advanced version costumers and replies to support tickets usually within minutes of being received. Support Us and we will Support You.</p></td>
			<td class="column-columnname" style="vertical-align:middle"><img src="<?php echo plugins_url('../images/techgasp-check-no.png', __FILE__); ?>" alt="<?php echo get_option('facebook_profile_master_name'); ?>" align="left" width="200px" height="121px" style="padding:5px;"/></td>
		</tr>
	</tbody>
</table>
<?php
		}
}