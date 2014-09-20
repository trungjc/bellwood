<?php
/**
 * @package Verona WordPress
 * The Header for Verona Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
    
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
        
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if gte IE 9 ]><html class="no-js ie9" lang="en"> <![endif]-->
    
    <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
        
    <?php if (ot_get_option('site_description') != '') { ?>
	<meta name="description" content="<?php echo ot_get_option('site_description'); ?>" />
	<?php } else { ?>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<?php } ?>

	<meta name="keywords" content="<?php echo ot_get_option('site_keywords'); ?>">
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<?php if (ot_get_option('favicon') != '') { ?><link rel="shortcut icon" href="<?php echo ot_get_option('favicon'); ?>"><?php }?>
	<?php if (ot_get_option('apple_favicon') != '') { ?><link rel="apple-touch-icon" href="<?php echo ot_get_option('apple_favicon'); ?>"><?php }?>
	<?php if (ot_get_option('apple_favicon_72') != '') { ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo ot_get_option('apple_icon_72'); ?>"><?php }?>
	<?php if (ot_get_option('apple_favicon_114') != '') { ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo ot_get_option('apple_icon_114'); ?>"><?php }?>

<?php wp_head(); ?>        
</head>

<body <?php body_class(); ?>><!-- the Body  -->

<?php // Pulling the meta boxes 
$slidername = rwmb_meta( 'verona_layerslider');
$sliderenabled = rwmb_meta('verona_sliderenable');
$tagline = rwmb_meta('verona_tagline');
$hidetagline = rwmb_meta('verona_hidetagline');
$showtaglinetitle = rwmb_meta('verona_hidetitletagline');
?>

<header><!-- Start header -->
	
	<div class="header-opacity"></div>
	
	<?php get_template_part('menu', 'index'); ?>

</header><!-- End header -->

<?php if(is_front_page() || is_page() && !is_home()) { ?>

<?php if($sliderenabled != 'disable' && $slidername != '0') { ?>
<div class="slider">
	<?php echo do_shortcode('[layerslider id="'.$slidername.'"]'); ?>
</div>
<?php } else { } ?><!-- End of slider -->

<?php if($hidetagline != 'hide') { ?>
<div class="tagline">
	<div class="container row">
		<?php if($showtaglinetitle != 'hide') { ?>
			<div class="text-centered">
				<h3><?php the_title(); ?></h3>
			</div>
		<?php } ?>
		<?php echo do_shortcode($tagline); ?>
	</div><!-- End of container -->
</div><!-- End of tagline -->
<?php  } ?>

<?php } ?>

<div class="container wrap">