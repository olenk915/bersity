<?php //get_header( 'network' ) ?>
<style type="text/css">
body{
	margin:0;
	padding:0;
}
.standard-form{
	margin:0;
}
.land_box .register-section h4{
	clear:both;
	display:block;
	margin:0;
	padding:0 0 20px 0;
	font:normal 16px/16px Arial, Helvetica, sans-serif;
	color:#525254;
}

#signup_username {
text-transform: lowercase;
}
.land_box .register-section h4 span{
	padding:0 0 0 12px;
}
.land_box h4 span a{
	color:#929497;
}
.land_box .register-section .filed{
	clear:both;
	display:block;
	padding:0 0 10px 0;
	margin:0;
	position:relative;
}
.editfield p.description{
	display:none;
}

#register-page #profile-details-section {
	display: none;
	}

.land_box .register-section .filed input[type="text"],.land_box .register-section .filed input[type="password"]{
	width:100%;
	display:block;
	padding:0 11px;
	margin:0;
	height:39px;
	border:1px solid #bbbcbd;
	border-radius:8px;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	-o-border-radius:8px;
	font:normal 14px/39px Arial, Helvetica, sans-serif;
	color:#a6a8ab;
}
.land_box .page p.land_btn1{
	text-align:right;
	padding:0;
	margin:0;
	clear:both;
	display:block;
}
.land_box .page p.land_btn1 input[type="submit"]{
	padding:0;
	width:205px;
	height:38px;
	font:normal 20px/38px Arial, Helvetica, sans-serif;
	color:#5a5a5a;
	text-align:center;
	text-indent:-9999em;
	background: url(http://bandversity.com/wp-content/themes/network/images/sign_up.png) no-repeat 0 0;
	cursor:pointer;
	border:0;
}
.land_box .register-section .filed span.land_checkbox{
	padding:18px 0 0 34px;
	float:left;
}
.land_box .register-section .filed span.land_checkbox label{
	font:13px/13px Arial, Helvetica, sans-serif;
	color:#808284;
}
.land_box .register-section .filed span.land_checkbox input{
	margin:0 14px 0 0;
}
.land_box .error {
    background: none repeat scroll 0 0 #FFFFFF;
   /* border: 1px solid red;
    border-radius: 8px;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
	-o-border-radius: 8px;*/
    clear: both;
    color: red;
    display: block;
    font: 72%/20px Arial,Helvetica,sans-serif;
    /*height: 55%;*/
    left: 3px;
    margin: 0;
    padding: 6px 9px 0;
    position: absolute;
    top: 3px;
    width: 90%;
}
.land_box .register-section .filed input#field_4[name="field_4"], .land_box .register-section .filed input#field_5[name="field_5"]{
	display:none;
}
.land_box  #profile-details-section.register-section .editfield:nth-child(2),.land_box  #profile-details-section.register-section .editfield:nth-child(3){
	display:none;
}
.land_box small{
	font:normal 10px/10px Arial,Helvetica,sans-serif;
	color: #808284;
	padding:0 0 6px 0;
	display:block;
}
@media only screen and (min-width : 768px) and (max-width : 1060px) {
.land_box .error {
    width: 90%;	
}
}
</style>
	<div id="content" class="land_box">
		<div class="padder">

		<?php do_action( 'bp_before_register_page' ) ?>

		<div class="page" id="register-page">

			<form action="" name="signup_form" id="signup_form" class="standard-form" method="post" enctype="multipart/form-data">

			<?php if ( 'registration-disabled' == bp_get_current_signup_step() ) : ?>
				<?php do_action( 'template_notices' ) ?>
				<?php do_action( 'bp_before_registration_disabled' ) ?>

					<p><?php _e( 'User registration is currently not allowed.', 'network' ); ?></p>

				<?php do_action( 'bp_after_registration_disabled' ); ?>
			<?php endif; // registration-disabled signup setp ?>

			<?php if ( 'request-details' == bp_get_current_signup_step() ) : ?>

				<!--<h2><?php //_e( 'Create an Account', 'network' ) ?></h2>-->

				<?php do_action( 'template_notices' ) ?>

				<!--<p><?php //_e( 'Registering for this site is easy, just fill in the fields below and we\'ll get a new account set up for you in no time.', 'network' ) ?></p>-->

				<?php do_action( 'bp_before_account_details_fields' ) ?>

				<div class="register-section" id="basic-details-section">

					<?php /***** Basic Account Details ******/ ?>

					<!--<h4><?php //_e( 'Account Details', 'network' ) ?></h4>-->

					<!--<label for="signup_username"><?php //_e( 'Username', 'network' ) ?> <?php _e( '*', 'network' ) ?></label>-->
					
					<div class="filed"><input type="text" name="signup_username" id="signup_username" value="<?php bp_signup_username_value() ?>" placeholder="*Create your username" /><?php do_action( 'bp_signup_username_errors' ) ?></div>

					<!--<label for="signup_email"><?php //_e( 'Email Address', 'network' ) ?> <?php _e( '*', 'network' ) ?></label>-->
					
					<div class="filed"><input type="text" name="signup_email" id="signup_email" value="<?php bp_signup_email_value() ?>" placeholder="Type your .edu email address" /><?php do_action( 'bp_signup_email_errors' ) ?></div>

					<!--<label for="signup_password"><?php //_e( 'Choose a Password', 'network' ) ?> <?php _e( '*', 'network' ) ?></label>-->
					
					<div class="filed"><input type="password" name="signup_password" id="signup_password" value="" placeholder="Choose a password" /><?php do_action( 'bp_signup_password_errors' ) ?></div>

					<!--<label for="signup_password_confirm"><?php //_e( 'Confirm Password', 'network' ) ?> <?php _e( '*', 'network' ) ?></label>-->
					
					<div class="filed"><input type="password" name="signup_password_confirm" id="signup_password_confirm" value="" placeholder="Confirm your password"/><?php do_action( 'bp_signup_password_confirm_errors' ) ?></div>

				</div><!-- #basic-details-section -->

				<?php do_action( 'bp_after_account_details_fields' ) ?>

				<?php /***** Extra Profile Details ******/ ?>

				<?php if ( bp_is_active( 'xprofile' ) ) : ?>

					<?php do_action( 'bp_before_signup_profile_fields' ) ?>

					<div class="register-section" id="profile-details-section">

						<!--<h4><?php //_e( 'Profile Details', 'network' ) ?></h4>-->

						<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
						<?php if ( bp_is_active( 'xprofile' ) ) : if ( bp_has_profile( 'profile_group_id=1' ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

						<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

							<div class="editfield">

								<?php if ( 'textbox' == bp_get_the_profile_field_type() ) : ?>

									<label for="<?php //bp_the_profile_field_input_name() ?>"><?php //bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php //_e( '*', 'network' ) ?><?php endif; ?></label>
									
									<div class="filed"><input type="text" name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>" value="<?php bp_the_profile_field_edit_value() ?>" placeholder="Type your full name" /><?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?></div>

								<?php endif; ?>

								<?php if ( 'textarea' == bp_get_the_profile_field_type() ) : ?>

									<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'network' ) ?><?php endif; ?></label>
									<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
									<textarea rows="5" cols="40" name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_edit_value() ?></textarea>

								<?php endif; ?>

								<?php if ( 'selectbox' == bp_get_the_profile_field_type() ) : ?>

									<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'network' ) ?><?php endif; ?></label>
									<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
									<select name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>">
										<?php bp_the_profile_field_options() ?>
									</select>

								<?php endif; ?>

								<?php if ( 'multiselectbox' == bp_get_the_profile_field_type() ) : ?>

									<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'network' ) ?><?php endif; ?></label>
									<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
									<select name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>" multiple="multiple">
										<?php bp_the_profile_field_options() ?>
									</select>

								<?php endif; ?>

								<?php if ( 'radio' == bp_get_the_profile_field_type() ) : ?>

									<div class="radio">
										<span class="label"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'network' ) ?><?php endif; ?></span>

										<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
										<?php bp_the_profile_field_options() ?>

										<?php if ( !bp_get_the_profile_field_is_required() ) : ?>
											<a class="clear-value" href="javascript:clear( '<?php bp_the_profile_field_input_name() ?>' );"><?php _e( 'Clear', 'network' ) ?></a>
										<?php endif; ?>
									</div>

								<?php endif; ?>

								<?php if ( 'checkbox' == bp_get_the_profile_field_type() ) : ?>

									<div class="checkbox">
										<span class="label"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'network' ) ?><?php endif; ?></span>

										<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
										<?php bp_the_profile_field_options() ?>
									</div>

								<?php endif; ?>

								<?php if ( 'datebox' == bp_get_the_profile_field_type() ) : ?>

									<div class="datebox">
										<label for="<?php bp_the_profile_field_input_name() ?>_day"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'network' ) ?><?php endif; ?></label>
										<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>

										<select name="<?php bp_the_profile_field_input_name() ?>_day" id="<?php bp_the_profile_field_input_name() ?>_day">
											<?php bp_the_profile_field_options( 'type=day' ) ?>
										</select>

										<select name="<?php bp_the_profile_field_input_name() ?>_month" id="<?php bp_the_profile_field_input_name() ?>_month">
											<?php bp_the_profile_field_options( 'type=month' ) ?>
										</select>

										<select name="<?php bp_the_profile_field_input_name() ?>_year" id="<?php bp_the_profile_field_input_name() ?>_year">
											<?php bp_the_profile_field_options( 'type=year' ) ?>
										</select>
									</div>

								<?php endif; ?>

								<?php do_action( 'bp_custom_profile_edit_fields' ) ?>

								<p class="description"><?php bp_the_profile_field_description() ?></p>

							</div>

						<?php endwhile; ?>

						<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_group_field_ids() ?>" />

						<?php endwhile; endif; endif; ?>

					</div><!-- #profile-details-section -->

					<?php do_action( 'bp_after_signup_profile_fields' ) ?>

				<?php endif; ?>

				<?php if ( bp_get_blog_signup_allowed() ) : ?>

					<?php do_action( 'bp_before_blog_details_fields' ) ?>

					<?php /***** Blog Creation Details ******/ ?>

					<div class="register-section" id="blog-details-section">

						<h4><?php _e( 'Blog Details', 'network' ) ?></h4>

						<p><input type="checkbox" name="signup_with_blog" id="signup_with_blog" value="1"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes, I\'d like to create a new site', 'network' ) ?></p>

						<div id="blog-details"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?>class="show"<?php endif; ?>>

							<label for="signup_blog_url"><?php _e( 'Blog URL', 'network' ) ?> <?php _e( '(required)', 'network' ) ?></label>
							<?php do_action( 'bp_signup_blog_url_errors' ) ?>

							<?php if ( is_subdomain_install() ) : ?>
								http:// <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value() ?>" /> .<?php echo preg_replace( '|^https?://(?:www\.)|', '', site_url() ) ?>
							<?php else : ?>
								<?php echo site_url() ?>/ <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value() ?>" />
							<?php endif; ?>

							<label for="signup_blog_title"><?php _e( 'Site Title', 'network' ) ?> <?php _e( '(required)', 'network' ) ?></label>
							<?php do_action( 'bp_signup_blog_title_errors' ) ?>
							<input type="text" name="signup_blog_title" id="signup_blog_title" value="<?php bp_signup_blog_title_value() ?>" />

							<span class="label"><?php _e( 'I would like my site to appear in search engines, and in public listings around this network.', 'network' ) ?>:</span>
							<?php do_action( 'bp_signup_blog_privacy_errors' ) ?>

							<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_public" value="public"<?php if ( 'public' == bp_get_signup_blog_privacy_value() || !bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes', 'network' ) ?></label>
							<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_private" value="private"<?php if ( 'private' == bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'No', 'network' ) ?></label>

						</div>

					</div><!-- #blog-details-section -->

					<?php do_action( 'bp_after_blog_details_fields' ) ?>

				<?php endif; ?>
                <small>*Username must be lowercase and numbers</small>

				<?php do_action( 'bp_before_registration_submit_buttons' ) ?>

				<!--<div class="submit">-->
					<p class="land_btn1"><input type="submit" name="signup_submit" id="signup_submit" value="<?php _e( 'Sign up for BandVersity', 'network' ) ?>" /></p>
				<!--</div>-->

				<?php do_action( 'bp_after_registration_submit_buttons' ) ?>

				<?php wp_nonce_field( 'bp_new_signup' ) ?>

			<?php endif; // request-details signup step ?>

			<?php if ( 'completed-confirmation' == bp_get_current_signup_step() ) : ?>

				<h2><?php _e( 'Sign Up Complete!', 'network' ) ?></h2>

				<?php do_action( 'template_notices' ) ?>
				<?php do_action( 'bp_before_registration_confirmed' ) ?>

				<?php if ( bp_registration_needs_activation() ) : ?>
					<p><?php _e( 'You have successfully created your account! To begin using this site you will need to activate your account via the email we have just sent to your address.', 'network' ) ?></p>
				<?php else : ?>
					<p><?php _e( 'You have successfully created your account! Please log in using the username and password you have just created.', 'network' ) ?></p>
				<?php endif; ?>

				<?php do_action( 'bp_after_registration_confirmed' ) ?>

			<?php endif; // completed-confirmation signup step ?>

			<?php do_action( 'bp_custom_signup_steps' ) ?>

			</form>

		</div>

		<?php do_action( 'bp_after_register_page' ) ?>

		</div><!-- .padder -->
	</div><!-- #content -->

	<?php get_sidebar( 'network' ) ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready( function() {
			if ( jQuery('div#blog-details').length && !jQuery('div#blog-details').hasClass('show') )
				jQuery('div#blog-details').toggle();

			jQuery( 'input#signup_with_blog' ).click( function() {
				jQuery('div#blog-details').fadeOut().toggle();
			});
			
			jQuery('.error').click(function(){
				jQuery('.error').hide("slow");
			});
			
		});
	</script>

<?php //get_footer( 'network' ) ?>