<?php get_header();

	// Pulling the meta boxes 
	$subtitle = rwmb_meta('verona_subtitle');
	$hidetagline = rwmb_meta('verona_hidetagline');
	?>

	<?php while ( have_posts() ) : the_post(); ?> <!--  Start the loop -->
	<?php $realsize = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'single_main_coffee'); 
		$lightbox_img = $realsize[0];?>
	<?php $args = array(
			'order'          => 'ASC',
			'post_type'      => 'attachment',
			'post_parent'    => $post->ID,
			'post_mime_type' => 'image',
			'post_status'    => null,
			'numberposts'    => -1,
			'exclude' => get_post_thumbnail_id(),
		);
	$attachments = get_posts($args); ?>

		<div class="row blog">
			
			<div class="coffee-title">
				<?php the_title('<h1>', '</h1>'); ?>
			</div><!-- End of coffee title -->
			
			<div class="coffee-subtitle">
				<?php echo $subtitle; ?>
			</div><!-- End of coffee subtitle -->

			<?php paginate_links(); ?>

		</div><!-- End of row -->

		<div class="row">

			<div class="threefifth flexslider">
			
				<ul class="slides">
					<li><img src="<?php echo $lightbox_img; ?>" alt="<?php the_title(); ?>" /></li>
					<?php foreach($attachments as $attachment) { ?>
					<?php $attachmento = wp_get_attachment_image_src( $attachment->ID, 'single_main_coffee'); 
			  	    	  $attachmento_img = $attachmento[0];  ?>
					
					<li>
						<img src="<?php echo $attachmento_img; ?>" alt="<?php the_title(); ?>" />
					</li>

					<?php } ?>				

				</ul>
			
			</div>
		
			<div class="twofifth">
				<?php the_post_thumbnail('single_minor_coffee'); ?>
			</div>

		</div><!-- End of row -->

		<?php the_content(); ?><!-- The content -->

	<?php endwhile; ?><!-- End of loop -->

	<?php $relatedcoffees = get_related_coffees($post->ID); ?>       
	<?php if($relatedcoffees->have_posts()): ?>

	<?php if(ot_get_option('related_coffees') == 'show') { ?>
	
	<div class="row related-coffees">
		
		<h3><?php _e('Also we have', 'Verona'); ?></h3>
		
		<ul class="block-four">
		
			<?php while($relatedcoffees->have_posts()): $relatedcoffees->the_post(); ?>

			<li>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('blog_related'); ?>
				</a>
				<a href="<?php the_permalink(); ?>">
					<div class="box-title"><?php the_title(); ?></div>
				</a>
			</li>

			<?php endwhile; ?>

		</ul><!-- End of block-four -->
	
	</div><!-- End of related coffees -->
	
	<?php } ?>
	
	<?php endif; ?>

<?php get_footer(); ?>