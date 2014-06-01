<?php if (is_user_logged_in()){ 
wp_redirect( get_bloginfo("url").'/home/'); exit;
}
?>
<!doctype html>  
<html <?php language_attributes(); ?>>
<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 		<?php include (get_template_directory() . '/library/options/options.php'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>		
		<?php if($bp_existed == 'true') : ?>
			<?php do_action( 'bp_head' ) ?>
		<?php endif; ?>
		<!--<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />-->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="icon" href="<?php bloginfo('stylesheet_directory');?>/favicon.ico" type="images/x-icon" />
		<link type="text/css" href="<?php bloginfo('template_url');?>/css/landing_style.css" rel="stylesheet" />
			<!-- font_show start -->
			<?php font_show(); ?>
			<!-- font_show end -->
             <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
			<?php wp_head(); ?>
			
		<!--<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/new_style.css" type="text/css" media="screen" />-->
<script type="text/javascript">
</script>    
	</head>
	<body <?php body_class() ?>>
		<section class="landing_wrap">