<?php
/*
Template Name: Coffee Menu
*/

	get_header();
	$coffee_meta_grid = rwmb_meta('verona_coffee_page_grid');
	$coffee_cats = rwmb_meta('verona_coffee_categories', 'type=taxonomy&taxonomy=coffee_menu_categories');
	$coffee_cats_array[0] = 'Select Coffee Categories';
	if($coffee_cats) {
		foreach($coffee_cats as $coffee_cat) {
			$coffee_cats_array[$coffee_cat->term_id] = $coffee_cat->name;
		}
	}
	$args = array(
		'paged'=>$paged,
		'post_type' => 'coffee_menu',
		'posts_per_page' => 10
	);
	if($coffee_cats){
		$args['tax_query'][] = array(
			'taxonomy' 	=> 'coffee_menu_categories',
			'field' 	=> 'slug',
			'terms' 	=> $coffee_cats_array
		);
	}
	$coffee_menu_loop = new WP_Query($args);

?>
<div class="row">
	<div class="checker photoset-grid-custom" data-layout="<?php if($coffee_meta_grid != 'none') { echo $coffee_meta_grid; } elseif($coffee_meta_grid == 'none' && ot_get_option('grids') != '' && ot_get_option('custom_grid') == '') { echo ot_get_option('grids', '3313', '', '', ''); } elseif(ot_get_option('custom_grid') != '' && $coffee_meta_grid == 'none' || ot_get_option('grids') != '') { echo ot_get_option('custom_grid', '3313', '', '', ''); }?>">

	<?php while ($coffee_menu_loop->have_posts()) : $coffee_menu_loop->the_post(); ?>

		<?php if(has_post_thumbnail()) { ?>

			<div class="boxe">
				<?php if(ot_get_option('coffee_hover') == 'enabled') { ?>
				<div class="hover-card">
					<a href="<?php the_permalink(); ?>"><span class="thumb-link"></span></a>
					<a href="<?php the_permalink(); ?>"><span class="details-link"><?php echo __('View Details', 'Verona'); ?></span></a>
				</div>
				<?php } ?>
				<?php the_post_thumbnail('coffee'); ?>
				<a href="<?php the_permalink(); ?>"><div class="box-title"><?php the_title(); ?></div></a>
			</div>

		<?php } ?>

	<?php endwhile; ?>

	<?php
	if ($coffee_menu_loop->max_num_pages > 1 ) {
		if (function_exists("pagination")) {
			pagination($coffee_menu_loop->max_num_pages);
		}
	}
	?>
	</div>
</div><!-- End of row -->

</div><!-- End of container -->
<?php get_footer(); ?>