<?php
/*
Template Name: Featured Artists Page
*/
?>
<?php //ob_start(); if ( !is_user_logged_in() ) { wp_redirect( home_url() ); exit; }?>
<?php get_header(); ?> 
<div id="content">
  <div class="padder">
  	<div class="inner_template_container">     
    	<div id="articleBox">
    	<div class="featured_main">
		  <?php query_posts("cat=19");?>
          <h2 class="big_title">Featured Artists</h2>
          <div class="caption_inner"><p>Here you will find the featured artists that have been recommended by other students.To feature an artist, click on <a href="<?php bloginfo('url');?>/feature-artist/">Feature Artists</a>.</p><p>Hope you  enjoy their music!</p></div>
          <div class="featured_inner">
			  <?php if(have_posts()): ?>
              <ul>
              <?php while(have_posts()): the_post();?> 
              <li>
                    <div class="featurd_sec">
                        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2> 
                        <div class="author_details">By <?php echo get_the_author_link(); ?><em><?php echo get_the_date();?></em></div>
                        <?php the_excerpt();?>
                        <div class="read_more_btn"><a href="<?php the_permalink();?>">Read more</a></div>
                  </div>
              </li>
              <?php endwhile;?>
			  </ul>
			  <?php endif;?>
          </div>
         </div>
      <div class="clear"></div>
    </div>
    	<!-- featured article box --> 
    </div>    
  </div>
</div>
<?php get_footer(); ?>