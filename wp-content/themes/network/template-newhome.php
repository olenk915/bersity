<?php
/*
Template Name: Custom Home Page
*/
?>
<?php ob_start(); if ( !is_user_logged_in() ) { wp_redirect( home_url() ); exit; }?>
<?php get_header(); ?> 
<div id="content">
  <div class="padder">
        <?php shailan_dropdown_menu(); ?>
      	<div class="home_container">
        	<div id="articleBox">
          <ul class="articles">
            <li> <a href="<?php bloginfo('url');?>/featured-artists/" class="featured">Featured Artist</a> </li> 
            <li> <a href="<?php bloginfo('url');?>/groups/" class="groups">Groups</a> </li> 
            <li> <a href="<?php bloginfo('url');?>/jobs/" class="forums">Jobs</a> </li> 
            <li> <a href="<?php bloginfo('url');?>/top-playlists/" class="top-playlists">Top Playlists</a> </li> 
            <li> <a href="<?php bloginfo('url');?>/videos/" class="videos">Videos</a> </li> 
            <li> <a href="https://www.youtube.com/user/collegehumor" target="_blank" class="humor">College Humor</a> </li>
            <li> <a href="<?php bloginfo('url');?>/travel/" class="ublogs">Travel</a> </li>
            <li> <a href="http://espn.go.com/college-sports/" target="_blank" class="sports">Sports</a> </li>          
            <li> <a href="<?php bloginfo('url');?>/my-board/" class="my-board"> My Board </a> </li>
          </ul>
          <div class="clear"></div>
        </div>
        	<!-- featured article box --> 
    	</div>

  </div>
	<div class="inner_template_container">

    	  			  <?php the_content(); ?>
</div>
</div>
<?php get_footer(); ?>