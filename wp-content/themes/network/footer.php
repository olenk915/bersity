<?php global $bp, $bp_existed; ?>

		<div class="clear"></div>
	</div>
    <div class="bottom_people"><img src="<?php bloginfo('template_directory'); ?>/new_images/bottom_people.png" alt="people" /></div>
</div>
<div class="footer-wrapper">
		<div id="footerWidgets" class="generic-box">
        	<nav class="footer_nav">
                <ul>
                    <li><a href="<?php echo get_permalink(41); ?>">Contact Us</a></li>
                    <li><a href="<?php echo get_permalink(43); ?>">Advertising</a></li>
                    <li><a href="<?php echo get_permalink(45); ?>">Partner with Us</a></li> 
                    <li><a href="<?php echo get_permalink(47); ?>">Feature Artist</a></li>
                    <li><a href="<?php echo get_permalink(260); ?>">Intern for Us</a></li><br />
                    <li><a href="<?php echo get_permalink(49); ?>">About Us</a></li>
                    <li><a href="<?php echo get_permalink(51); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo get_permalink(53); ?>">Terms of Use</a></li>
                    <li><a href="<?php echo get_permalink(622); ?>">Join Mailing List</a></li>
                </ul>
            </nav>
                <ul class="land_social_link">
                	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Social Media Link')): ?><?php endif;?>                    
                </ul>
			<address class="coyright">BandVersity &reg;</address>
		</div>
</div>

</div>	
<?php if($bp_existed == 'true') : ?><?php do_action( 'bp_footer' ) ?><?php endif; ?>
<div class="clear"></div>

<!-- start google code-->
<?php $googlecode = get_option('dev_network_google');
echo stripslashes($googlecode);
?>
<!-- end google code -->

<?php wp_footer(); ?>

<script>
jQuery('.profile-fields td.data a').contents().unwrap();
//Remove Links in Extended Profile (don't know why they are there)
</script>
</body>
</html>