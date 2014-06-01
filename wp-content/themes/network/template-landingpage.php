<?php
/*
Template Name: Band Versity Landing Page
*/
get_header('landing');
ob_start();
?>
<section class="landing_main">
    	<article class="land_left">
        	<h1 class="land_logo"><a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url');?>/images/landing_logo.png" alt="land_logo" /></a></h1>
            <section class="land_text">
           	  <h2>Welcome to Bandversity</h2>
              <h3>Find out what's happening in universities now with  the friends and bands you care about.</h3>
              <h4>You MUST have a edu address to join.</h4>
            </section>
      </article>
        <aside class="land_right">        	
        	<fieldset class="land_box">
            	<h4>New Member?<span>Sign Up</span></h4>
                <iframe src="http://bandversity.com/register" id="i" name="i" width="336" height="302" style="border:0;"></iframe> 
            </fieldset>
            <fieldset class="land_box">            
            <?php if (!(current_user_can('level_0'))){ ?>
            <h4>Sign In</h4>
            <form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
            <p><input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="20" placeholder="Email"/></p>
            <p><input type="password" name="pwd" id="pwd" size="20" placeholder="Password" /></p>
            <p class="land_btn2">
             	<span class="land_checkbox">
                	<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" />Remember me</label>
                	<input type="hidden" name="redirect_to" value="<?php bloginfo('url');?>/home/" />
                </span>
            	<input type="submit" name="submit" value="Login" />
            </p>
            </form>
            <p class="land_forgot"><a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">Forgot password?</a></p>
            <?php } ?> 
            </fieldset>
        </aside>
        <section class="land_peaople"><img src="<?php bloginfo('template_url');?>/images/land_pepole.png" alt="land_peaople" /></section>
    </section>

<?php get_footer('landing');?>