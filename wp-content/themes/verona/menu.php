<!-- Centered Logo -->

<?php if(ot_get_option('logo_positions') == 'logo-center') { ?>
<div class="logo centered">
	<?php if(ot_get_option('logo') != '') { ?>
		<a href="<?php echo home_url(); ?>"><img src="<?php echo ot_get_option('logo'); ?>" alt="<?php echo bloginfo('blog_name'); ?>" /></a>
	<?php } else { ?>
		<a class="logo-text" href="<?php echo home_url(); ?>" title="<?php echo bloginfo('blog_name'); ?>"><?php echo bloginfo('name'); ?></a> 
	<?php } ?>
</div>

<div class="container menu centered">
	
	<div class="row">

		<nav class="twofifth main-menu left">
			<?php wp_nav_menu( array( 'theme_location' => 'left_header_menu', 'container' =>  'div', 'menu_class' => 'left-menu', 'walker' => new description_walker() ) ); ?>
		</nav><!-- End of menu navigation -->
		<div class="fifth"></div>
		<nav class="twofifth main-menu right">
			<?php wp_nav_menu( array( 'theme_location' => 'right_header_menu', 'container' =>  'div', 'menu_class' => 'right-menu', 'walker' => new description_walker() ) ); ?>
		</nav><!-- End of menu navigation -->

	</div><!-- End of row -->

</div><!-- End of container menu -->

<!-- End of centered logo -->

<!-- Start of left logo -->
<?php } elseif(ot_get_option('logo_positions') == 'logo-left') { ?>

<div class="container menu left">
	
	<div class="row">

		<div class="logo centered left">
		<?php if(ot_get_option('logo') != '') { ?>
			<a href="<?php echo home_url(); ?>"><img src="<?php echo ot_get_option('logo'); ?>" alt="<?php echo bloginfo('blog_name'); ?>" /></a>
		<?php } else { ?>
			<a class="logo-text" href="<?php echo home_url(); ?>" title="<?php echo bloginfo('blog_name'); ?>"><?php echo bloginfo('name'); ?></a> 
		<?php } ?>
		</div>

		<div class="logo-left">
			<nav class="main-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'left_header_menu', 'menu_class' => 'left-menu', 'walker' => new description_walker() ) ); ?>
			</nav><!-- End of menu navigation -->
			<nav class="main-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'right_header_menu', 'menu_class' => 'right-menu', 'walker' => new description_walker() ) ); ?>
			</nav><!-- End of menu navigation -->
		</div>

	</div><!-- End of row -->

</div><!-- End of container menu -->

<!-- End of left logo -->

<!-- Start of right logo -->
<?php } elseif(ot_get_option('logo_positions') == 'logo-right') { ?>

<div class="container menu right">
	
	<div class="row">

		<div class="logo centered right">
		<?php if(ot_get_option('logo') != '') { ?>
			<a href="<?php echo home_url(); ?>"><img src="<?php echo ot_get_option('logo'); ?>" alt="<?php echo bloginfo('blog_name'); ?>" /></a>
		<?php } else { ?>
			<a class="logo-text" href="<?php echo home_url(); ?>" title="<?php echo bloginfo('blog_name'); ?>"><?php echo bloginfo('name'); ?></a> 
		<?php } ?>
		</div>

		<div class="logo-right">
			<nav class="main-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'left_header_menu', 'menu_class' => 'left-menu', 'walker' => new description_walker() ) ); ?>
			</nav><!-- End of menu navigation -->
			<nav class="main-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'right_header_menu', 'menu_class' => 'right-menu', 'walker' => new description_walker() ) ); ?>
			</nav><!-- End of menu navigation -->
		</div>

	</div><!-- End of row -->

</div><!-- End of container menu -->

<?php } ?>
<!-- End of right logo -->