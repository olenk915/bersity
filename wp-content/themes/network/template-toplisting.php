<?php
/*
Template Name: Top Listing Video Page
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
		 	<?php 
					global $current_user;
				  	get_currentuserinfo();
				  	$current_user_id = $current_user->ID;
					$user_last = get_user_meta( $current_user_id, 'yousername', true );					
					//echo apply_filters('the_content', '[tubepress mode="user" userValue="'.$user_last.'"]');
					    print TubePressPro::getHtmlForShortcode('mode="playlist" playlistValue="PLOKXYtbdm_LiEZIur7C6TMa7DeFMClOsF" resultsPerPage="21"');
			?>           
          </div>
         </div>
      <div class="clear"></div>
    </div>
    	<!-- featured article box --> 
    </div>    
  </div>
</div>
<?php get_footer(); ?>