<?php
/*
Template Name: Band Versity Board
*/

get_header();
?>

	<div id="board">
		<ul class="links">
		<?php
			$categorias = array(5,17,9,16,7,11,4);
			foreach ($categorias as $cat) {
				$categoria = get_category($cat);
				$link = esc_url(get_category_link($cat));
				$img = z_taxonomy_image_url($cat);
				?>
				<li>
					<a href="<?php echo $link; ?>">
						<?php echo $categoria->name; ?>
					</a>
				</li>
		<?php
			}
		?>
		</ul>
		
		<ul class="boxes">
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
			<li><a href="#"></a></li>
		</ul>
		
	</div>
	
<?php
get_footer();
?>