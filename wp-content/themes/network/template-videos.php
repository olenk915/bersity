<?php
/*
Template Name: User Video Page
*/
?>
<?php get_header(); ?> 
<div id="content">
  <div class="padder">
  	<div class="inner_template_container">     
    	<div id="articleBox">
    	<div class="featured_main">
        <h2 class="big_title">Videos</h2>
		 	<?php 
					global $current_user;
				  	get_currentuserinfo();
				  	$current_user_id = $current_user->ID;
					$user_last = get_user_meta( $current_user_id, 'yousername', true );					
					echo apply_filters('the_content', '[tubepress mode="user" userValue="'.$user_last.'"]');
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