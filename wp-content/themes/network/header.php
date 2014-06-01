<!doctype html>  
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 		<?php include (get_template_directory() . '/library/options/options.php'); ?>
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>		
		<?php if($bp_existed == 'true') : ?>
			<?php do_action( 'bp_head' ) ?>
		<?php endif; ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="icon" href="<?php bloginfo('stylesheet_directory');?>/favicon.ico" type="images/x-icon" />
	
		<?php 
		
if (is_user_logged_in() && is_page('77') ) {
wp_redirect('http://bandversity.com/blog/category/entertainment/featured-artists');
exit;} 


?>
		
			<!-- font_show start -->
			<?php font_show(); ?>
			<!-- font_show end -->
            <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
			<?php wp_head(); ?>
			
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/new_style.css" type="text/css" media="screen" />
	</head>
	<body <?php body_class() ?>>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<?php /*
		<div id="top-navigation-bar">
			<?php locate_template( array( '/library/components/navigation-header.php' ), true ); ?>
				<div class="clear"></div>
		</div> */ ?>
<div class="page_wrap">		
		<div id="top_bar_float">
        	<?php locate_template( array( '/library/components/discover2-header.php' ), true ); ?>
            
		</div>
		
		<div id="site-wrapper">		


			<div id="container">
				<?php if(is_front_page()){?>
				<div id="site-logo"><!-- start #site-logo -->
					<div id="header">
						<div class="logo">
							<a href="http://bandversity.com" title="Home">BandVersity</a>
						</div>
					</div>
				</div>
				<?php }?>