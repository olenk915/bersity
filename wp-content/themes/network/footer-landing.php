<?php global $bp, $bp_existed; ?>
<footer class="landing_footer">
    	<nav class="land_nav">
        	<ul>
            <li><a href="<?php echo get_permalink(41); ?>">Contact Us</a></li>
            <li><a href="<?php echo get_permalink(43); ?>">Advertising</a></li>
            <li><a href="<?php echo get_permalink(45); ?>">Partner with Us</a></li> 
            <li><a href="<?php echo get_permalink(47); ?>">Feature Artist</a></li>
            <li style="border: 0px;"><a href="<?php echo get_permalink(260); ?>">Intern for Us</a></li><br />
            <li><a href="<?php echo get_permalink(49); ?>">About Us</a></li>
            <li><a href="<?php echo get_permalink(51); ?>">Privacy Policy</a></li>
            <li><a href="<?php echo get_permalink(53); ?>">Terms of Use</a></li>
            <li><a href="<?php echo get_permalink(622); ?>">Join Mailing List</a></li>
        </ul>
        </nav>
      <ul class="land_social_link">
        	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Social Media Link')): ?><?php endif;?>
      </ul>
      <address class="land_copyright">Bandversity&reg; </address>
    </footer>
<!-- start google code-->
<?php $googlecode = get_option('dev_network_google');
echo stripslashes($googlecode);
?>
<!-- end google code -->
</section>

<?php wp_footer(); ?>
</body>
</html>