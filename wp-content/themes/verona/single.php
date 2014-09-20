<?php
/**
 * @package WordPress
 * @subpackage Verona WordPress
 */
get_header(); ?>

<?php if(ot_get_option('blogsidebar') == 'right') {
	$mainright = 'float:left;';
	$mainrightclass = 'alpha';
	$sidebarleft = 'float:right;';
	$sidebarleftclass = 'omega';
} else {
	$mainright = 'float:right;';
	$mainrightclass = 'omega';
	$sidebarleft = 'float:left;';
	$sidebarleftclass = 'alpha';
}?>

	<div class="row blog">

		<div class="twothird <?php echo $mainrightclass; ?>" style="<?php echo $mainright; ?>">
			
			<?php while ( have_posts() ) : the_post(); ?> <!-- Start the loop -->

			<div <?php post_class('row blog-post-item'); ?> id="post-<?php the_ID(); ?>">
			
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
			<?php global $more; $more = 0; ?>

			<?php the_title('<h3>', '</h3>'); ?>

				<?php if(ot_get_option('display_meta') == "show") { ?>
				<div class="row blog-post-meta">
					<div class="posted-by"><i class="icon-user"></i><?php _e('Published By: ', 'Verona'); ?><?php the_author_posts_link(); ?></div>
					<div class="posted-on"><i class="icon-time"></i><?php echo get_the_date(); ?></div>
					<div class="comment-count"><i class="icon-comments"></i><?php comments_popup_link('No Comments', '1', '%'); ?></div>
				</div><!-- End of blog post meta -->
				<?php } ?>

				<?php if (has_post_thumbnail()) { ?>
				<div class="row blog-post-featured-single-image">
					<?php echo the_post_thumbnail('blog', array('class' => 'scale-with-grid')); ?>
				</div><!-- End of blog post featured image -->
				<?php } else { ?>
					<div class="row blog-post-featured-videos">
						<?php $postvideo = rwmb_meta('verona_postvideo'); ?>
						<?php verona_post_featured_videos($postvideo); ?>
					</div><!-- End of blog post featured video -->
				<?php } ?>

				<div class="blog-post-excerpt">
					
					<?php the_content(); ?> <!-- The content -->
					
					<div class="page-link">
						<?php wp_link_pages(); ?>
					</div>

					<?php if(ot_get_option('display_tags') == "show") { ?>
					<div class="blog tagcloud">
						<?php the_tags('', ' ', ''); ?>
					</div>
					<?php } ?>
				
				</div><!-- End of blog post excerpt -->

			</div><!-- End of blog post item -->

			<?php comments_template(); ?>

			<?php endwhile; ?> <!-- End the loop -->

		</div><!-- End of twothird -->
	
	</div><!-- End of row-->
		
	<aside class="third <?php echo $sidebarleftclass; ?>" style="<?php echo $sidebarleft; ?>">
    	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Default Main SideBar')): endif; ?>
	</aside><!-- End of sidebar -->

</div><!-- End of container -->

<?php get_footer(); ?>                     