<?php //ob_start(); if ( !is_user_logged_in() ) { wp_redirect( home_url() ); exit; }?>
<?php get_header() ?>
<div id="container-background">
	<div id="content"><!-- start #content -->
		<div class="padder">
        <div class="inner_template_container">
        <?php $post_id_value = $post->ID;?>
			<?php if($bp_existed == 'true') : ?>
                <?php do_action( 'bp_before_blog_page' ) ?>
            <?php endif; ?>
            <div class="page" id="blog-page"><!-- start #blog-page -->
            <?php //echo $post->ID;?>
                        <?php if (have_posts()) :  ?>
                                    <?php if( $bp_existed == 'true' ) { ?>		
                                        <?php //bp_wpmu_pageloop(); ?>
                                        
                                        <?php while (have_posts()) : the_post(); ?>                                       
                                        <?php //echo $post_id_value;?>
                                        
                                            <h2 class="big_title"><?php the_title(); ?></h2>
      <?php if( $post_id_value == '181'){ ?><div class="caption_inner"><p>Join the conversation. Add your voice and views.<br/> Members can join a forum or create one by<br/> signing in. </p></div><?php } ?>
      <?php if( $post_id_value == '124'){ ?><div class="caption_inner"><p>Tell the world what you think.<br/>Learn how to create a uBlog <a href="<?php bloginfo('url');?>/ublog-process/">here</a>.<br/><br/>Members can start blogging by clicking <a href="<?php bloginfo('url');?>/wp-admin/profile.php?page=bau">here</a> </p></div><?php } ?>
                                            <div class="post" id="post-<?php the_ID(); ?>">
                                                <div class="entry">
                                                    <?php the_content(); ?>
                                                    <?php wp_link_pages( array( 'before' => __( '<p><strong>Pages:</strong> ', 'network' ), 'after' => '</p>', 'next_or_number' => 'number')); ?>
                                                    <?php edit_post_link( __( 'Edit this entry.', 'network' ), '<p>', '</p>'); ?>
                                                </div>
                                            </div>                                            
                                            <?php comments_template('', true); ?>
                                        <?php endwhile;?>                                        
                                    <?php } else { ?>
                                            <?php wpmu_pageloop(); ?>
                                    <?php } ?>
                        <?php endif; ?>
            </div><!-- end #blog-page -->
            <?php if($bp_existed == 'true') : ?>
                <?php do_action( 'bp_after_blog_page' ) ?>
            <?php endif; ?>
        	</div>
		</div>
	</div><!-- end #content -->	
	<div class="clear">
	</div>
<?php get_footer(); ?>