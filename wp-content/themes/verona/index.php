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

			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_title('<h3 class="title">', '</h3>'); ?>
			</a>

			<div class="row blog-post-meta">
				<div class="posted-by"><i class="icon-user"></i><?php _e('Published By: ', 'Verona'); ?><?php the_author_posts_link(); ?></div>
				<div class="posted-on"><i class="icon-time"></i><?php echo get_the_date(); ?></div>
				<div class="comment-count"><i class="icon-comments"></i><?php comments_popup_link('No Comments', '1', '%'); ?></div>
			</div><!-- End of blog post meta -->

			<?php if (has_post_thumbnail()) { ?>
				<div class="row blog-post-featured-image">
					<a href="<?php the_permalink(); ?>">
						<?php echo the_post_thumbnail('blog', array('class' => 'scale-with-grid')); ?>
					</a>
				</div><!-- End of blog post featured image -->
			<?php } else { ?>
				<div class="row blog-post-featured-videos">
					<?php $postvideo = rwmb_meta('verona_postvideo'); ?>
					<?php verona_post_featured_videos($postvideo); ?>
				</div><!-- End of blog post featured video -->
			<?php } ?>

			<?php $excerptlength = ot_get_option('blog_excerpt', '60', '', '', ''); ?>
			<div class="row blog-post-excerpt">
				<?php echo limit_excerpt_length(get_the_excerpt(), $excerptlength); ?> <!-- The excerpt from content -->
			</div><!-- End of blog post excerpt -->

			<a href="<?php the_permalink(); ?>" class="row read-more"><?php _e('Read More', 'Verona'); ?></a>

			</div><!-- End of blog post item -->

			<?php endwhile; ?> <!-- End the loop -->
		<?php wp_reset_query(); ?>
			<?php 
			if (  $wp_query->max_num_pages > 1 ) {
				if (function_exists("pagination")) {
					pagination($wp_query->max_num_pages);
				} 
			} 
			?>
		
		</div><!-- End of twothird -->

		<aside class="third <?php echo $sidebarleftclass; ?>" style="<?php echo $sidebarleft; ?>">
	    	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Default Main SideBar')): endif; ?>
		</aside><!-- End of sidebar -->

	</div><!-- End of row-->

</div><!-- End of container -->
<?php get_footer(); ?>                       
           
