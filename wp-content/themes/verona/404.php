<?php get_header(); ?>
	<div class="row">
		<?php if(ot_get_option('error_text') != '') { ?>
		<?php echo ot_get_option('error_text'); ?>
	</div>
	<?php } else { ?>
	<div class="row">
		<h1><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'Verona' ); ?></h1>
	</div>
	<div class="row">
		<div class="threefifth">
			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'Verona' ); ?></p>
		</div><!-- End of threefifth -->
		<?php } ?>
		<div class="twofifth">
			<?php get_template_part('searchform'); ?>
		</div>
	</div><!-- End of row -->
</div>
<?php get_footer(); ?>