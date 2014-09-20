<?php
/**
 * @package WordPress
 * @subpackage Verona WordPress
 */
?>
</div>
<?php if(ot_get_option('footer_all') == 'enabled') { ?>
<div class="footer-full">
	<div class="container row">
		<footer>

			<?php if(ot_get_option('footer_columns') == 'onefour') { ?>
				<div class="quarter">
					<?php if ( is_active_sidebar( 'footer-column-one' ) ) : ?> <?php dynamic_sidebar( 'footer-column-one' ); ?>
					<?php else : ?><p><?php echo __('You need to drag a widget into your sidebar in the WordPress Admin', 'Verona'); ?></p>
					<?php endif; ?>
				</div><!-- End of First footer widget -->
				<div class="quarter">
					<?php if ( is_active_sidebar( 'footer-column-two' ) ) : ?> <?php dynamic_sidebar( 'footer-column-two' ); ?>
					<?php else : ?><p><?php echo __('You need to drag a widget into your sidebar in the WordPress Admin', 'Verona'); ?></p>
					<?php endif; ?>
				</div><!-- End of Second footer widget -->
				<div class="quarter">
					<?php if ( is_active_sidebar( 'footer-column-three' ) ) : ?> <?php dynamic_sidebar( 'footer-column-three' ); ?>
					<?php else : ?><p><?php echo __('You need to drag a widget into your sidebar in the WordPress Admin', 'Verona'); ?></p>
					<?php endif; ?>
				</div><!-- End of Third footer widget -->
				<div class="quarter">
					<?php if ( is_active_sidebar( 'footer-column-four' ) ) : ?> <?php dynamic_sidebar( 'footer-column-four' ); ?>
					<?php else : ?><p><?php echo __('You need to drag a widget into your sidebar in the WordPress Admin', 'Verona'); ?></p>
					<?php endif; ?>
				</div><!-- End of Fourth footer widget -->
			<?php } ?> <!-- End of OneFour -->

			<?php if(ot_get_option('footer_columns') == 'onethree') { ?>
				<div class="third">
					<?php if ( is_active_sidebar( 'footer-column-one' ) ) : ?> <?php dynamic_sidebar( 'footer-column-one' ); ?>
					<?php else : ?><p><?php echo __('You need to drag a widget into your sidebar in the WordPress Admin', 'Verona'); ?></p>
					<?php endif; ?>
				</div><!-- End of First footer widget -->
				<div class="third">
					<?php if ( is_active_sidebar( 'footer-column-two' ) ) : ?> <?php dynamic_sidebar( 'footer-column-two' ); ?>
					<?php else : ?><p><?php echo __('You need to drag a widget into your sidebar in the WordPress Admin', 'Verona'); ?></p>
					<?php endif; ?>
				</div><!-- End of Second footer widget -->
				<div class="third">
					<?php if ( is_active_sidebar( 'footer-column-three' ) ) : ?> <?php dynamic_sidebar( 'footer-column-three' ); ?>
					<?php else : ?><p><?php echo __('You need to drag a widget into your sidebar in the WordPress Admin', 'Verona'); ?></p>
					<?php endif; ?>
				</div><!-- End of Third footer widget -->
			<?php } ?> <!-- End of OneThree -->

			<?php if(ot_get_option('footer_columns') == 'onetwo') { ?>
				<div class="half">
					<?php if ( is_active_sidebar( 'footer-column-one' ) ) : ?> <?php dynamic_sidebar( 'footer-column-one' ); ?>
					<?php else : ?><p><?php echo __('You need to drag a widget into your sidebar in the WordPress Admin', 'Verona'); ?></p>
					<?php endif; ?>
				</div><!-- End of First footer widget -->
				<div class="half">
					<?php if ( is_active_sidebar( 'footer-column-two' ) ) : ?> <?php dynamic_sidebar( 'footer-column-two' ); ?>
					<?php else : ?><p><?php echo __('You need to drag a widget into your sidebar in the WordPress Admin', 'Verona'); ?></p>
					<?php endif; ?>
				</div><!-- End of Second footer widget -->
			<?php } ?> <!-- End of OneTwo -->
		</footer><!-- End of footer -->
	</div><!-- End of container row -->
</div> <!-- End of footer-full -->
<?php } else {}?>

<?php if(ot_get_option('copyright_all') == 'enabled') { ?>
<div class="copyright-full">
	<div class="container row">
		<?php if(ot_get_option('footer_menu') == 'enabled') { ?>
			<div class="twofifth">
				<?php echo ot_get_option('copyright_text'); ?>
			</div><!-- End of twofifth -->
			<div class="threefifth breadcrumbs breadcrumbs-path">
				<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container' =>  'div', 'menu_class' => 'footer-menu') ); ?>
			</div><!-- End of threefifth -->
		<?php } else { ?>
			<div class="copyright-center">
				<?php echo ot_get_option('copyright_text'); ?>
			</div><!-- End of centered -->
		<?php } ?>
	</div><!-- End of container row -->
</div><!-- End of copyright-full -->
<?php } ?>

<?php if (ot_get_option('google_analytics') != '') { ?>
	<?php echo ot_get_option('google_analytics') ?><!-- Google Analytics Code is inserted here -->
<?php } ?>

<?php wp_footer(); ?>
   
</body>
</html>