<?php
/*
Template Name: Top Listing Shortcode Test 
*/
?>
<?php include(WP_PLUGIN_DIR . '/tubepress_pro_3_0_1/sys/classes/TubePressPro.class.php');?>
<?php get_header(); ?> 
<div id="content">
  <div class="padder">
  	<div class="inner_template_container">     
    	<div id="articleBox">
    	<div class="featured_main">
        <h2 class="big_title"><?php the_title(); ?></h2>
		
		                        <?php if (have_posts()) :  ?>
                                        
                                        <?php while (have_posts()) : the_post(); ?>                                       
                                        
                                           <?php the_content(); ?>
                                        
                                        <?php endwhile;?>                                        
                  
                        <?php endif; ?>
                                                                
    
          </div>
         </div>
      <div class="clear"></div>
    </div>
    	<!-- featured article box --> 
    </div>    
  </div>
</div>
<?php get_footer(); ?>