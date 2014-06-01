<?php get_header(); ?>
<div id="container-background">
	<div id="content"><!-- start #content -->
		<div class="padder">
		<?php shailan_dropdown_menu(); ?>
		<div class="inner_template_container">		
		<h2 class="pagetitle"><?php single_cat_title(); ?></h2>

		<div class="page wideColumn" id="blog-archives"><!-- start #blog-archives -->
			<?php locate_template( array( '/library/components/headers.php' ), true ); ?>

			<?php if ( have_posts() ) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="post">
							<div class="post-title">
								<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<div class="post-date">
									<?php echo get_the_date(); ?>
								</div>
							</div>
							<?php the_post_thumbnail(); ?>
							<div class="excerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>
					<?php endwhile; ?>
					
				<?php locate_template( array( '/library/components/pagination.php' ), true ); ?>
			<?php else: ?>
					<?php locate_template( array( '/library/components/messages.php' ), true ); ?>
			<?php endif; ?>
		</div><!-- end #blog-archives -->
		
<!--		<div class="sidebar_ads">
		<img src="http://bandversity.com/wp-content/uploads/2014/03/fakead.jpg" width="160" height="600" alt="Your Ad Here" />
		</div>
		-->
		<!--end .sidebar_ads-->
		
		<div class="clear"></div>
		</div><!--end .inner_template_container-->
		
		<?php if($bp_existed == 'true') : ?>
			<?php do_action( 'bp_after_archive' ) ?>
		<?php endif; ?>
		</div>
	</div><!-- end #content -->
	<?php get_sidebar('blog'); ?>
	<div class="clear">
	</div>
<?php get_footer(); ?>
