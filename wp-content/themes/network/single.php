<?php get_header() ?>
<div id="container-background">
	<div id="content"><!-- start #content -->
		<div class="padder">
            <?php shailan_dropdown_menu(); ?>
        	<div class="inner_template_container">
				<div class="page wideColumn" id="blog-latest"><!-- start #blog-latest -->
					<?php if($bp_existed == 'true') : ?>
                        <?php do_action( 'bp_before_blog_single_post' ) ?>
                    <?php endif; ?>
                    <?php if (have_posts()) :  ?>
                    
                    <?php if( $bp_existed == 'true' ) { ?>
                        <?php //bp_wpmu_singleloop(); ?>
                        <?php rewind_posts();?>
						<?php while (have_posts()) : the_post(); ?>
                        
                                <div class="post" id="post-<?php the_ID(); ?>">
                                	<div class="post-content-wp">
                                        
                                        <?php the_post_thumbnail();?>
                                        
                                        <h2 class="big_title"><?php the_title();?></h2>

                                        <div class="author_details">By <?php echo get_the_author_link(); ?> <em><?php echo get_the_date();?></em></div>
                                        
                                        <?php the_content();?>

                                    </div>
<div class="uploader_main_2">
    <div class="social_sec">
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://bandversity.com/my-board/">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        <div class="fb-like" data-href="http://bandversity.com/my-board/" data-send="true" data-width="450" data-show-faces="true"></div>
    </div>          		
</div>
                				</div>
            
                        <?php //comments_template('', true); ?>
                        <?php endwhile; ?>          
                                    
                        
                        
                    <?php } else { ?>
                        <?php wpmu_singleloop(); ?>
                    <?php } ?>
                    
                    
                    <?php if($bp_existed == 'true') : ?>
                        <?php do_action( 'bp_after_blog_single_post' ) ?>
                    <?php endif; ?>
                    <?php endif; ?>
				</div> <!-- wideColumn -->
				
<!--		<div class="sidebar_ads">
		<img src="http://bandversity.com/wp-content/uploads/2014/03/fakead.jpg" width="160" height="600" alt="Your Ad Here" />
		</div>
		-->
		<!--end .sidebar_ads-->
		
		<div class="clear"></div>				
				
    		</div><!--end inner_template_container-->
		</div><!--end .padder-->
	</div><!-- end #content -->
	<?php //get_sidebar('blog'); ?>
	<div class="clear">
	</div>
<?php get_footer() ?>