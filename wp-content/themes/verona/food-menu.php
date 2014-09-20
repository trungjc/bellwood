<?php
/*
Template Name: Food Menu
*/
	get_header();

	$food_cats = rwmb_meta('verona_food_categories', 'type=taxonomy&taxonomy=food_menu_categories');
	$food_cats_array[0] = 'All Food Categories';
	if($food_cats) {
		foreach($food_cats as $food_cat) {
			$food_cats_array[$food_cat->term_id] = $food_cat->name;
		}
	}
	$args = array(
		'paged'=>$paged,
		'post_type' => 'food_menu',
		'posts_per_page' => ot_get_option('food_items_number', '18', '', '', ''),
	);
	if($food_cats){
		$args['tax_query'][] = array(
			'taxonomy' 	=> 'food_menu_categories',
			'field' 	=> 'slug',
			'terms' 	=> $food_cats_array,
		);
	}
	$food_menu_loop = new WP_Query($args);

	$count = 1;
?>

<div class="row">

	<?php if(ot_get_option('food_filter') == 'enabled') { ?>
	<div class="fifth">
		<ul class="food-menu-categories">
			<li><a class="selected" href="#" data-filter="*"><?php echo __('See All', 'Verona'); ?></a></li>

			<?php
 			if(ot_get_option('food_categories_order') != 'random') {
 				$args = array(
				    'orderby'       => 'name',
				    'order'         => ot_get_option('food_categories_order'),
			    	'hide_empty'    => 1
			    	);
			} else {
				$args = array(
				    'orderby'       => 'none',
			    	'hide_empty'    => 1
					);
			}

			if(empty($food_cats)) {
				$terms = get_terms('food_menu_categories', $args);
			} else {
				$terms = wp_get_post_terms( $post->ID, 'food_menu_categories', $args );
			}

			$menu_order = array();
			foreach ($terms as $key => $row)
			{
			    $menu_order[$key] = $row->menu_order;
			}
			array_multisort($menu_order, SORT_ASC, $terms);


 				$count = count($terms);
 				if ( $count > 0 ){

     				foreach ( $terms as $term ) {

						$meta = get_option('first_section');
						if (empty($meta)) $meta = array();
						if (!is_array($meta)) $meta = (array) $meta;
						$meta = isset($meta[$term->term_id]) ? $meta[$term->term_id] : array();

						if(isset($meta['icon'])) {
							$images = $meta['icon'];
							foreach ($images as $att) {
				    			// show image
								echo wp_get_attachment_image($att);
							}
						}

						echo '<li>';
						echo '<a href="#" data-filter=".'.$term->slug.'">';
						echo $term->name;
						echo '</a>';
						echo '</li>';

     				}
 				}
 			?>
		</ul>
	</div>
	<div class="fourfifth">
		<div class="food-block">
			<ul class="block-three food-menu">
				<?php } else { ?> <!-- End if filtering enabled -->
				<ul class="block-four">
				<?php } ?>
				<?php while ($food_menu_loop->have_posts()) : $food_menu_loop->the_post();
				$pricetag = rwmb_meta('verona_price');
				$currency = rwmb_meta('verona_currency');
				// Full image for lightbox
			    $fullsize = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		        $lightbox_img = $fullsize[0];
				// Isotope slugs
				$item_classes = '';
				$item_cats = get_the_terms($post->ID, 'food_menu_categories');
				if($item_cats) {
					foreach($item_cats as $item_cat) {
						$item_classes .= $item_cat->slug . ' ';
					}
				}
				?>
				<?php if(!has_post_thumbnail()) { ?>
				<li class="food-menu-item<?php echo ' '.$item_classes; ?> nothumb">
				<?php } else { ?>
				<li class="food-menu-item<?php echo ' '.$item_classes; ?>">
					<div class="image-wrapper">
						<?php if(ot_get_option('food_menus_lightbox') == 'enabled') { ?>
						<a href="<?php echo $lightbox_img;?>">
							<?php echo the_post_thumbnail('food_menu_item'); ?>
						</a>
						<?php } else { ?>
							<?php echo the_post_thumbnail('food_menu_item'); ?>
						<?php } ?>
					</div><!-- End of image wrapper -->
				<?php } ?><!-- End of if has thumbnail -->
					<div class="menu-title">
						<?php the_title(); ?>
					</div>
					<?php the_content(); ?><!-- The food item content -->

					<?php if(ot_get_option('food_item_prices') == 'enabled') { ?>
					<?php if (is_array($pricetag)): ?>
					<?php foreach($pricetag as $pt) { ?>
						<div class="price-tag"><?php echo $pt[0]; ?>: <?php if($currency == '') { echo "$";} else {echo $currency;}?><?php echo $pt[1]; ?></div>
					<?php } else: ?>
						<div class="price-tag">$<?php echo $pricetag ?></div>
					<?php endif; ?>
					<?php } ?>
				</li><!-- End of food menu item -->
				<?php $count++; endwhile; ?>
			</ul>
			<?php if(ot_get_option('food_filter') == 'enabled') { ?>
		</div><!-- End of food-block -->
	</div><!-- End of fourfifth -->
	<?php } ?>

</div><!-- End of row -->

<div class="row">
	<?php while ( have_posts() ) : the_post();
		the_content(); // The page content
	endwhile; ?>
</div>

<?php get_footer(); ?>