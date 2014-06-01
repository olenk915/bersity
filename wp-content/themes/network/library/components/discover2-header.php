<?php include (get_template_directory() . '/library/options/options.php'); ?>
<?php $id_value = $post->ID;?>
<div id="discoveryBox" class="generic-box inner_sec">
	<div class="searchBox">
    <h1 class="top_logo"><a href="http://bandversity.com" title="Home"><img src="<?php bloginfo('template_directory'); ?>/new_images/top_logo.png" alt="top-logo" /></a></h1>
 <?php if(($id_value != '41') && ($id_value != '43') && ($id_value != '45') && ($id_value != '47') && ($id_value != '49') && ($id_value != '51') && ($id_value != '53')) {?>  
	<?php if ($bp_existed == "true") { ?>
		<form action="<?php echo home_url(); ?>/search" method="post" id="search-form">
        <div class="search_form">
			<label><?php _e( 'Find:', 'network' ) ?></label>
			<input type="text" id="search-terms" name="search-terms" value="" /><?php if(is_user_logged_in()) {?><div class="invalue">in</div>
			<select name="search-which" id="search-which" style="width: auto"><option value="members"><?php _e( 'Members', 'network' ) ?></option><option value="groups"><?php _e( 'Groups', 'network' ) ?></option><!--<option value="forums"><?php //_e( 'Forums', 'network' ) ?></option><option value="ublogs"><?php //_e( 'uBlogs', 'network' ) ?></option>--></select> <?php } ?>
			<button type="submit" name="search-submit" id="search-submit" value="Search" ><?php _e( 'Search', 'network' ) ?></button>
			<input type="hidden" id="_wpnonce" name="_wpnonce" value="e077bd408a" /><input type="hidden" name="_wp_http_referer" value="/" />
            </div>	
		</form>
	<?php } else { ?>
		<?php get_search_form(); ?>
	<?php } ?>
   <?php } ?>
    
    
	</div> <!-- searchbox -->
<?php if(($id_value != '41') && ($id_value != '43') && ($id_value != '45') && ($id_value != '47') && ($id_value != '49') && ($id_value != '51') && ($id_value != '53')) {?>
	<div class="profileBox">
		<ul>
			<?php 
				if ( !is_user_logged_in() ) {
					 global $user_login ;
				?>
				<?php if ($bp_existed == "true") { ?>
               <!-- <li class="logout"><a href="<?php //bloginfo('url');?>">Login</a></li>-->
					<li class="logout">
                    	<?php //signup_button(); ?>	
                        <form name="loginform" id="loginform" action="<?php echo get_option('siteurl'); ?>/wp-login.php" method="post">
							<div class="username-panel"><label for="email"><?php _e( 'Email', 'network' ) ?> </label><input value="" class="input" type="text" size="20" tabindex="10" name="log" id="user_login" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}" /></div> 
        					<div class="password-panel"><label for="password"><?php _e( 'Password', 'network' ) ?></label> <input value="" class="input" type="password" size="20" tabindex="20" name="pwd" id="user_pass" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}" /></div>
							<div class="submit-button"><input name="wp-submit" id="wp-submit" value="Login" tabindex="100" type="submit"></div>
							<input name="redirect_to" value="<?php echo get_option('siteurl'); ?>/wp-admin/" type="hidden">
							<input name="testcookie" value="1" type="hidden">
						</form>				
					</li>
				<?php } else { ?>
					<li class="logout">
						<form name="loginform" id="loginform" action="<?php echo get_option('siteurl'); ?>/wp-login.php" method="post">
							<div class="username-panel"><?php _e( 'Username', 'network' ) ?> <input value="Username" class="input" type="text" size="20" tabindex="10" name="log" id="user_login" onfocus="if (this.value == 'Username') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Username';}" /></div> 
        					<div class="password-panel"><?php _e( 'Password', 'network' ) ?> <input value="Password" class="input" type="password" size="20" tabindex="20" name="pwd" id="user_pass" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}" /></div>
							<div class="submit-button"><input name="wp-submit" id="wp-submit" value="Log In" tabindex="100" type="submit"></div>
							<input name="redirect_to" value="<?php echo get_option('siteurl'); ?>/wp-admin/" type="hidden">
							<input name="testcookie" value="1" type="hidden">
						</form>
					</li>
			
				<?php } ?>
			<?php } else { 
					
					global $current_user;
			        get_currentuserinfo();

					if ($bp_existed == "true") {
						global $bp; 
				?>
					<li><a href="<?php echo bp_loggedin_user_domain(); ?>"><?php bp_loggedin_user_fullname() ?></a></li>
					<li class="logout editprofile"><a href="<?php echo get_bloginfo('url') . '/members/'. $current_user->user_login . '/profile/'; ?>">Profile</a></li>
					<li class="logout"><a href="<?php echo wp_logout_url( bp_get_root_domain() ) ?>"><?php _e( 'Log out', 'network' ) ?></a></li>
					<!--<li class="avatar"><a href="<?php //echo bp_loggedin_user_domain(); ?>"><?php //echo bp_core_fetch_avatar( 'item_id='.$bp->loggedin_user->id ); ?></a></li>-->
				<?php } else { ?>

				   <?php if ($current_user->user_firstname != '') { ?>
					   <li><?php echo $current_user->user_firstname . " " . $current_user->user_lastname; ?></li>
				   <?php } else { ?>
					   <li><a href="<?php echo wp_login_url( ) ?>"><?php echo $current_user->user_nicename; ?></a></li>
				   <?php } ?>
				   <li class="logout editprofile"><a href="<?php echo get_bloginfo('url') . '/members/'. $current_user->user_login . '/profile/'; ?>">Profile</a></li>
				   <li class="logout"><a href="<?php echo wp_logout_url(); ?>"><?php _e( 'Log out', 'network' ) ?></a></li>
				   <!--<li class="avatar"><?php //echo get_avatar($current_user->user_email, '50'); ?></li>-->
				<?php } ?>
			<?php } ?>
		</ul>
	</div> <!-- profilebox -->
<?php } ?>
	<div class="clear"></div>
</div>