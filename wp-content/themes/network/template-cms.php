<?php
/*
Template Name: CMS Page Template
*/
?>
<?php get_header(); ?> 
<?php if(have_posts()): while(have_posts()): the_post();?>
<div id="content">
  <div class="padder">  	
  		<div class="cms_template_container">
        	<h2 class="pagetitle"><?php the_title();?></h2>
            <div id="articleBox"> 
            	   <?php the_content();?>
                <div class="clear"></div>
            </div>
    		<!-- featured article box -->
        </div>     
  </div>
</div>
<?php endwhile; endif;?>
<?php get_footer(); ?>