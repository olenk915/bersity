<?php
/*
Template Name: Custom Home Page
*/
?>

<?php get_header(); ?>
<div id="content">
	<div class="padder">
	
		<div id="articleBox">
			<ul class="articles">
			<?php
				$categorias = array(3,4,5,6,7,8,9,10,11,12,13,14);
				foreach ($categorias as $cat) {
					$categoria = get_category($cat);
					$link = esc_url(get_category_link($cat));
					$img = z_taxonomy_image_url($cat);
					?>
					<li class="withthumb" style="display: list-item;">
						<div class="thumb">
							<a href="<?php echo $link; ?>">
								<img src="<?php if ($img) echo $img; else echo 'http://bandversity.com/wp-content/themes/network/_inc/images/placeholders/article.jpg'; ?>" width="227px" height="108px" alt="<?php echo $categoria->name; ?>">
							</a>
						</div>
						
						<h2><a href="<?php echo $link; ?>"><?php echo $categoria->name; ?></a></h2>
					</li>
			<?php
				}
			?>
			</ul>
			
			<div class="clear"></div>
			
		
		</div> <!-- featured article box -->

	</div>
</div>

<?php get_footer(); ?>