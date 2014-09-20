<?php get_header(); ?>

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

	<div class="row">

		<div class="twothird <?php echo $mainrightclass; ?>" style="<?php echo $mainright; ?>">
			
			<?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
			
			<div <?php post_class('row blog-post-item'); ?> id="post-<?php the_ID(); ?>">

				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_title('<h3 class="title">', '</h3>'); ?>
				</a>

				<div class="row blog-post-featured-image">
					<?php echo the_post_thumbnail('blog', array('class' => 'scale-with-grid')); ?>
				</div><!-- End of blog post featured image -->

				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			
				<?php wp_reset_query(); ?>
				<?php comments_template(); ?>
		
			</div><!-- End of blog post item -->
		
			<?php endwhile; ?><!-- End of loop -->

		</div><!-- End of twothird -->

	</div><!-- End of row -->

		<aside class="third <?php echo $sidebarleftclass; ?>" style="<?php echo $sidebarleft; ?>">
	    	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Default Main SideBar')): endif; ?>
		</aside><!-- End of sidebar -->

</div><!-- End of sixteen -->

</div><!-- End of container -->

<?php get_footer(); ?>