<?php
/**
 * @package WordPress
 * @subpackage Verona WordPress
 * Main function file for Verona WordPress Theme
 */

/**************************
 * Option Tree Settings
**************************/
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( 'option-tree/ot-loader.php' );
include_once( 'includes/theme-options.php' );

/*****************************************
 * Register, drag and drop menu support
*****************************************/
register_nav_menus(
	array(
		'left_header_menu' => 'Left Main Menu',
		'right_header_menu' => 'Right Main Menu',
		'footer_menu' => 'Footer Menu'
	)
);

/************************************
 * Menus descriptions walker class
************************************/
class description_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$prepend = '';
		$append = '';
		$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

		if($depth != 0)
		{
			$description = $append = $prepend = "";
		}
		$args = (object) $args;
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/*******************************************
 * Enque scripts and styles for frontend
*******************************************/
function verona_wp_scripts() {
	// Enque Stylesheets
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'droidsans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800");

	wp_enqueue_style('verona_style', get_stylesheet_directory_uri().'/style.css');
	wp_enqueue_style('verona_grid', get_template_directory_uri().'/includes/stylesheets/grid.css');
	if(ot_get_option('responsivness') != 'disabled') {
	wp_enqueue_style('verona_medias', get_template_directory_uri().'/includes/stylesheets/medias.css'); }
	// Also make sure to load it only if it is enabled
	if(ot_get_option('food_menus_lightbox') != 'disabled') {
	wp_enqueue_style('verona_lightbox', get_template_directory_uri().'/includes/stylesheets/magnific-popup.css'); }
	// Let's load the custom css from theme option panel if not empty
	if(ot_get_option('custom_css') != '') {
	wp_enqueue_style('verona_custom_css', get_template_directory_uri().'/dynamic.css'); }

	// Enque Javascripts
	wp_enqueue_script('verona_allplugins', get_template_directory_uri().'/includes/javascripts/plugins.js', array( 'jquery' ), '', true);
	wp_enqueue_script('verona_custom', get_template_directory_uri().'/includes/javascripts/custom.js', array( 'jquery' ), '', true);

	wp_localize_script( 'verona_custom', 'flex_vars', array (
  		'slider_animation' => ot_get_option('slider_animation'),
  		'slideshow' => (ot_get_option('slider_slideshow') == 'yes') ? 'true' : false,
  		'slideshow_duration' => ot_get_option('slideshow_duration')
	) );
	wp_localize_script( 'verona_custom', 'isotope_vars', array (
 		'isotope_easing' => ot_get_option('isotope_effect'),
 		'isotope_easing_speed' => ot_get_option('isotope_effect_speed')
	) );
}

add_action('wp_enqueue_scripts', 'verona_wp_scripts');

/********************************************
 * Styling for the custom post type icons
********************************************/
add_action( 'admin_head', 'cpt_icons' );

function cpt_icons() {
	?>
	<style type="text/css" media="screen">

		<?php global $wp_version; if( version_compare( $wp_version, '3.8', '>=') ) {
		wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/includes/stylesheets/fontello.css');?>

		#adminmenu #menu-posts-food_menu .wp-menu-image:before {
  			content:  "\e800";
  			font-size: 16px !important;
  			font-family: 'FontAwesome' !important;
		}
		#adminmenu #menu-posts-coffee_menu .wp-menu-image:before {
  			content: "\e801";
  			font-size: 16px !important;
  			font-family: 'FontAwesome' !important;
		}

		<?php } else { ?> /* If is below 3.8 let's use the old images for menu icons */

		#menu-posts-food_menu .wp-menu-image {
			background: url(<?php echo get_template_directory_uri(); ?>/images/admin/cutlery.png) no-repeat 7px -17px !important;
		}
		#adminmenu #menu-posts-food_menu .wp-menu-image:before {
  			content: "";
		}
		#menu-posts-coffee_menu .wp-menu-image {
			background: url(<?php echo get_template_directory_uri(); ?>/images/admin/cup.png) no-repeat 7px -17px !important;
		}
		#adminmenu #menu-posts-coffee_menu .wp-menu-image:before {
  			content: "";
		}
		#menu-posts-food_menu:hover .wp-menu-image, #menu-posts-coffee_menu:hover .wp-menu-image, #menu-posts-food_menu.wp-has-current-submenu .wp-menu-image, #menu-posts-coffee_menu.wp-has-current-submenu .wp-menu-image {
			background-position: 7px 7px !important;
		}

		<?php } ?>

	</style>

<?php }

/***********************
 * Custom post types
***********************/
// Food menu custom type
add_action('init', 'create_food_menu');

function create_food_menu() {
	$args = array(
		'label'             => __('Food Menu', 'Verona'),
		'singular_label'    => __('Food Menu', 'Verona'),
		'menu_position'     => 20,
		'public'            => true,
		'show_ui'           => true,
		'capability_type'   => 'post',
		'show_in_admin_bar' => true,
		'hierarchical'      => false,
		'rewrite'           => true,
		'supports'          => array('title', 'editor', 'thumbnail'),
		'labels'            => array('add_new_item' => 'Add new Food Menu Item', 'view_item' => 'View Food Menu Item')
	);
	register_post_type('food_menu', $args);
}

// Taxonomies for food menu
add_action('init', 'food_menu_taxonomies', 0);

function food_menu_taxonomies() {

//Food Menu Categories
	$labels = array(
	'name' => _x( 'Food Categories', 'taxonomy general name', 'Verona' ),
	'singular_name' => _x( 'Food Category', 'taxonomy singular name', 'Verona' ),
	'search_items' =>  __( 'Search Food Categories', 'Verona' ),
	'all_items' => __( 'All Food Categories', 'Verona' ),
	'parent_item' => __( 'Parent Category', 'Verona' ),
	'parent_item_colon' => __( 'Parent Category:', 'Verona' ),
	'edit_item' => __( 'Edit Food Category', 'Verona' ),
	'update_item' => __( 'Update Food Category', 'Verona' ),
	'add_new_item' => __( 'Add New Food Category', 'Verona' ),
	'new_item_name' => __( 'New Food Category Name', 'Verona' ),
	'menu_name' => __( 'Food Menu Categories', 'Verona' ),
	);
	register_taxonomy('food_menu_categories', 'food_menu', array( 'labels' => $labels,'hierarchical' => true ));
}

// Coffee menu custom type
add_action('init', 'create_coffee_menu');

function create_coffee_menu() {
	$coffeeslug = ot_get_option('coffee_post_type_slug', '', '');
	$args = array(
		'label'             => __('Coffee Menu', 'Verona'),
		'singular_label'    => __('Coffee Menu', 'Verona'),
		'menu_position'     => 20,
		'public'            => true,
		'show_ui'           => true,
		'capability_type'   => 'post',
		'show_in_admin_bar' => true,
		'hierarchical'      => false,
		'rewrite' 			=> array('slug' => $coffeeslug, 'with_front' => false),
		'supports'          => array('title', 'editor', 'thumbnail'),
		'labels'            => array('add_new_item' => 'Add new Coffee Menu Item', 'view_item' => 'View Coffee Menu Item')
	);
	register_post_type('coffee_menu', $args);
}

// Taxonomies for coffee menu
add_action('init', 'coffee_menu_taxonomies', 0);

function coffee_menu_taxonomies() {
//Coffee Menu Categories
	$labels = array(
	'name' => _x( 'Coffee Categories', 'taxonomy general name', 'Verona' ),
	'singular_name' => _x( 'Coffee Category', 'taxonomy singular name', 'Verona' ),
	'search_items' =>  __( 'Search Coffee Categories', 'Verona' ),
	'all_items' => __( 'All Coffee Categories', 'Verona' ),
	'parent_item' => __( 'Parent Category', 'Verona' ),
	'parent_item_colon' => __( 'Parent Category:', 'Verona' ),
	'edit_item' => __( 'Edit Coffee Category', 'Verona' ),
	'update_item' => __( 'Update Coffee Category', 'Verona' ),
	'add_new_item' => __( 'Add New Coffee Category', 'Verona' ),
	'new_item_name' => __( 'New Coffee Category Name', 'Verona' ),
	'menu_name' => __( 'Coffee Menu Categories', 'Verona' ),
	);
	register_taxonomy('coffee_menu_categories', 'coffee_menu', array( 'labels' => $labels,'hierarchical' => true ));
}

/*******************************************
 * Displaying image on CPT for food menu
*******************************************/
add_filter( 'manage_edit-food_menu_columns', 'my_food_menu_columns' ) ;

function my_food_menu_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Item Name', 'Verona' ),
		'image' => __( 'Image', 'Verona' ),
		'date' => __( 'Date', 'Verona' )
	);
	return $columns;
}

function my_manage_food_menu_columns($columns) {
    if (!@isset($columns['image'])) return;

	$columns['image'] = the_post_thumbnail( 'food_menu_item' );
	echo $columns['image'];
}

add_action( 'manage_food_menu_posts_custom_column', 'my_manage_food_menu_columns', 10, 2 );

/**********************
 * Widget registers
**********************/
//widget support for a right sidebar
register_sidebar(array(
	'name' => 'Default Main SideBar',
	'id' => 'right-sidebar',
	'description' => 'Widgets in this area will be shown on the right-hand side.',
	'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>'
));

//widget support for the footer column one
register_sidebar(array(
	'name' => 'Footer Column One',
	'id' => 'footer-column-one',
	'description' => 'Widgets in this area will be shown in the footer.',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

//widget support for the footer column two
register_sidebar(array(
	'name' => 'Footer Column Two',
	'id' => 'footer-column-two',
	'description' => 'Widgets in this area will be shown in the footer.',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

//widget support for the footer column three
register_sidebar(array(
	'name' => 'Footer Column Three',
	'id' => 'footer-column-three',
	'description' => 'Widgets in this area will be shown in the footer.',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

//widget support for the footer column four
register_sidebar(array(
	'name' => 'Footer Column Four',
	'id' => 'footer-column-four',
	'description' => 'Widgets in this area will be shown in the footer.',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

/****************
 * Meta Boxes
****************/
if(is_child_theme()) {
	define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/includes/meta-boxes' ) );
} else {
	define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/includes/meta-boxes' ) );
}
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/includes/meta-boxes' ) );
// Include the meta box script and custom Verona definition
require_once RWMB_DIR . 'meta-box.php';
include 'includes/meta-boxes/meta-verona.php';

/*******************
 * Taxonomy Meta
*******************/
include 'includes/taxonomy-meta.php';
include 'includes/taxonomy-meta-usage.php';

/*************************
 * Pagination enhanced
*************************/
function pagination($pages = '', $range = 2) {
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {
		echo "<div class='pagination'>";
		if($paged > 1 && $showitems < $pages) echo "<a class='pagination-arrow-prev' href='".get_pagenum_link($paged - 1)."'></a>";
		if ($paged < $pages && $showitems < $pages) echo "<a class='pagination-arrow-next' href='".get_pagenum_link($paged + 1)."'></a>";

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			}
		}
		echo "</div>\n";
	}
}

/****************************
 * Displaying of comments
****************************/
function verona_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	if(get_comment_type() == 'comment') { ?>
	<li class="commment">
	<div id="comment-<?php comment_ID() ?>" >
		<div class="comment-avatar">
			<?php echo get_avatar($comment, 70); ?>
		</div><!-- End of gravatar -->
		<div class="comment-body">
			<div class="comment-author-wrap vcard">
				<div class="comment-author">
					<?php echo get_comment_author_link() ?>
				</div>
				<div class="comment-time">
					<?php printf(__('%1$s at %2$s', 'Verona'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__(' - Edit', 'Verona'),'  ','') ?><?php comment_reply_link(array_merge( $args, array('reply_text' => ' Reply','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div><!-- End of comment author vcard -->
			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.', 'Verona') ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-content">
				<?php comment_text() ?>
			</div>
		</div>
	</div>
	</li>
	<?php } }

// Custom comment form
function verona_custom_comment_form($defaults) {
	$defaults['comment_notes_before'] = '';
	$defaults['comment_notes_after'] = '';
	$defaults['title_reply'] = '<div class="title"><h4>' . __('Leave A Comment', 'Verona' ) . '</h4></div> ';
	$defaults['id_form'] = 'comment-form';
	$defaults['comment_field'] = '<fieldset><label>Your comment (required)</label><textarea id="comment" name="comment" cols=10 rows=2></textarea></fieldset>';

	return $defaults;
}

add_filter('comment_form_defaults', 'verona_custom_comment_form');

function verona_custom_comment_fields() {
	$author = wp_get_current_commenter();
	$required = get_option('require_name_email');
	$aria_required = ($required ? " aria_required='true'" :  '');

	$fields = array(
		'author' => '<fieldset class="small-input"><label>' . __('Name', 'Verona') . ' ' . ($required ? '*' : '') . '</label><input type="text" name="author" id="author" value= "' . esc_attr($author['comment_author']) . '" ' . $aria_required . '/></fieldset>',
		'email' => '<fieldset class="small-input"><label>' . __('Email', 'Verona') . ' ' . ($required ? '*' : '') . '</label><input type="text" name="email" id="email" value= "' . esc_attr($author['comment_author_email']) . '" ' . $aria_required . ' /></fieldset>',
		'url' => '<fieldset class="small-input omega"><label>' . __('Website', 'Verona') . '</label><input type="text" name="url" id="url" value= "' . esc_attr($author['comment_author_url']) . '"/></fieldset>'
	);

	return $fields;
}

add_filter('comment_form_default_fields', 'verona_custom_comment_fields');

/* Comment-reply support */
function verona_reply_queue_js() {
	if (!is_admin()) {
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
	}
}
add_action('wp_print_scripts', 'verona_reply_queue_js');

/*******************************
 * Thumbnail usage and sizes
*******************************/
//This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

// Content Width
if (!isset( $content_width )) $content_width = 960;

//Different thumb sizes
add_image_size('blog', 600, 250, true);
add_image_size('blog_latest', 253, 154, true);
add_image_size('blog_related', 255, 255, true);
add_image_size('food_menu_item', 66, 66, true);
add_image_size('coffee', 600, 350, true);
add_image_size('single_main_coffee', 570, 340, true);
add_image_size('single_minor_coffee', 370, 340, true);

/*******************
 * Limit excerpt
*******************/
function custom_excerpt_length( $length ) {
	return 220;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function limit_excerpt_length($string, $word_limit) {
	$words = explode(' ', $string);
	return implode( ' ', array_slice($words, 0, $word_limit) );
}

// Remove the [...]
function trim_excerpt($text) {
	return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'trim_excerpt');

/***********************************************
 * Related coffees on single-coffee_menu.php
***********************************************/
// Related coffee posts/items
function get_related_coffees($post_id) {
	$query = new WP_Query();

	$args = '';

	$args = wp_parse_args($args, array(
		'showposts' => 4,
		'post__not_in' => array($post_id),
		'ignore_sticky_posts' => 0,
		'category__in' => wp_get_post_categories($post_id),
		'post_type' => 'coffee_menu'
	));

	$query = new WP_Query($args);

	return $query;
}

/***********************
 * Custom login logo
***********************/
function verona_custom_login_logo() {
	$custom_login = '';
	$custom_login .= '<style type="text/css">';
	$custom_login .= '.login h1 a {';
	$custom_login .= 'background-image:url('. ot_get_option("login_logo") .'); margin-bottom: 5px;width: auto; background-size:auto auto;padding: 16%;height: auto;';
	$custom_login .= '}</style>';
	echo $custom_login;
}

add_action('login_head', 'verona_custom_login_logo');

/******************
 * Localization
******************/
function verona_localization() {
	$lang_dir = get_template_directory() . '/includes/languages';
	load_theme_textdomain('Verona', $lang_dir);
}
add_action('after_setup_theme', 'verona_localization');

/*******************************************
 * Shortcodes can be executed in widgets
*******************************************/
add_filter('widget_text', 'do_shortcode');

/*******************************************
 * Time ago for posts, comments, widgets
*******************************************/
function time_ago( $type = 'post' ) {
	$d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';

	return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago', 'Verona');
}

// All tags
add_filter( 'widget_tag_cloud_args', 'verona_tag_cloud_args' );
function verona_tag_cloud_args( $args ) {
	$args['largest'] = 12;
	$args['smallest'] = 12;
	$args['unit'] = 'px';
	return $args;
}

/******************
 * Feed feature
******************/
add_theme_support('automatic-feed-links');

/************************************
 * Other Includes
************************************/
// Include custom widgets
require_once (get_template_directory() . '/includes/widgets.php');

// Include custom optiontree filters
include_once('includes/filters.php');

// Include into head the dynamic.php
function verona_dynamic() {
	include_once( 'includes/dynamics.php' );
}
add_action( 'wp_head', 'verona_dynamic' );

/********************************
 * Making Verona Retina ready
 * - since vers.1.6
********************************/
/**
 * Retina images
 *
 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
 */
add_filter( 'wp_generate_attachment_metadata', 'verona_retina_support_attachment_meta', 10, 2 );
function verona_retina_support_attachment_meta( $metadata, $attachment_id ) {
    foreach ( $metadata as $key => $value ) {
        if ( is_array( $value ) ) {
            foreach ( $value as $image => $attr ) {
                if ( is_array( $attr ) )
                    verona_retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
            }
        }
    }

    return $metadata;
}

/**
 * Create retina-ready images
 *
 * Referenced via verona_retina_support_attachment_meta().
 */
function verona_retina_support_create_images( $file, $width, $height, $crop = false ) {
    if ( $width || $height ) {
        $resized_file = wp_get_image_editor( $file );
        if ( ! is_wp_error( $resized_file ) ) {
            $filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );

            $resized_file->resize( $width * 2, $height * 2, $crop );
            $resized_file->save( $filename );

            $info = $resized_file->get_size();

            return array(
                'file' => wp_basename( $filename ),
                'width' => $info['width'],
                'height' => $info['height'],
            );
        }
    }
    return false;
}

/**
 * Delete retina-ready images
 *
 * This function is attached to the 'delete_attachment' filter hook.
 */
add_filter( 'delete_attachment', 'verona_delete_retina_support_images' );
function verona_delete_retina_support_images( $attachment_id ) {
    $meta = wp_get_attachment_metadata( $attachment_id );
    $upload_dir = wp_upload_dir();

    if (!@isset($meta['file'])) return;

    $path = pathinfo( $meta['file'] );
    foreach ( $meta as $key => $value ) {
        if ( 'sizes' === $key ) {
            foreach ( $value as $sizes => $size ) {
                $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
                $retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
                if ( file_exists( $retina_filename ) )
                    unlink( $retina_filename );
            }
        }
    }
}

/******************************
 * Videos embeding function
 * - since vers.1.6
******************************/
function verona_post_featured_videos($video = '')
{
	if ( empty($video) ) return;
	$youtubeskin = rwmb_meta('verona_youtubeskin');
	if($youtubeskin == '1') {
		$youtubeskin = 'theme=light&color=white';
	} elseif ($youtubeskin == '2') {
		$youtubeskin = 'theme=light&color=red';
	} elseif ($youtubeskin == '3') {
		$youtubeskin = 'theme=dark&color=white';
	} else {
		$youtubeskin = 'theme=dark&color=red';
	}

	$vimeoskin = rwmb_meta('verona_vimeoskin');
	$vimeoskin = str_replace('#', '', $vimeoskin);

	$videohtml = '<div class="videos">';
	if ( strpos($video,'youtube') ) {
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video, $matches);
		$videohtml.= '<iframe width="640" height="360" src="http://www.youtube.com/embed/'. $matches[1] .'?'. $youtubeskin .'&version=3&rel=1&fs=1&showsearch=0&showinfo=1&iv_load_policy=1&wmode=transparent" style="border: none"></iframe>';
	} else {
		preg_match('/http:\/\/vimeo.com\/(\d+)$/', $video, $matches);
		$videohtml.= '<iframe width="640" height="360" src="http://player.vimeo.com/video/'. $matches[1] .'?title=0&amp;byline=0&amp;color='.$vimeoskin.'&amp;" style="border: none"></iframe>';
	}
	$videohtml.= '</div>';

	echo $videohtml;
}

/***********************
 * Plugin activation
***********************/
require_once dirname( __FILE__ ) . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'verona_register_required_plugins' );
function verona_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'            => 'LayerSlider',
			'slug'            => 'LayerSlider',
			'source'          => get_template_directory_uri() . '/includes/plugins/layerslider.zip',
			'required'        => true,
			'version'         => '5.0.2',
			'force_activation'    => false,
			'force_deactivation'  => true,
			'external_url'      => '',
		),
		array(
			'name'            => 'Symple Shortcodes',
			'slug'            => 'symple-shortcodes',
			'source'          => get_template_directory_uri() . '/includes/plugins/symple-shortcodes.zip',
			'required'        => true,
			'version'         => '1.4.6',
			'force_activation'    => false,
			'force_deactivation'  => true,
			'external_url'      => '',
		),
	);

	$theme_text_domain = 'Verona';

	$config = array(
		'domain'          => $theme_text_domain,
		'default_path'    => '',
		'parent_menu_slug'  => 'themes.php',
		'parent_url_slug'   => 'themes.php',
		'menu'            => 'install-required-plugins',
		'has_notices'       => true,
		'is_automatic'      => true,
		'message'       => 'This plugins are required for your Verona theme to work properly as presented in the demo site.',
		'strings'         => array(
			'page_title'                            => __( 'Install Required Plugins', 'Verona' ),
			'menu_title'                            => __( 'Install Plugins', 'Verona' ),
			'installing'                            => __( 'Installing Plugin: %s', 'Verona' ),
			'oops'                                  => __( 'Something went wrong with the plugin API.', 'Verona' ),
			'notice_can_install_required'           => _n_noop( 'Verona requires the following plugin: %1$s.', 'Verona requires the following plugins: %1$s.' ),
			'notice_can_install_recommended'      => _n_noop( 'Verona recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
			'notice_can_activate_required'          => _n_noop( 'The following required plugin for Verona WordPress theme is currently inactive: %1$s.', 'The following required plugins for Verona WordPress theme are currently inactive: %1$s.' ),
			'notice_can_activate_recommended'     => _n_noop( 'The following recommended plugin for Verona WordPress theme is currently inactive: %1$s.', 'The following recommended plugins for Verona WordPress theme are currently inactive: %1$s.' ),
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
			'notice_ask_to_update'            => _n_noop( 'The following plugin: %1$s needs to be updated to its latest version to ensure maximum compatibility with the Verona theme - please first delete the plugin %1$s and install the new version.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with the Verona theme: %1$s - please delete/remove the current ones and install the new versions.' ),
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
			'install_link'                  => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'                 => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                                => __( 'Return to Required Plugins Installer', 'Verona' ),
			'plugin_activated'                      => __( 'Plugin activated successfully.', 'Verona' ),
			'complete'                  => __( 'All plugins installed and activated successfully. %s', 'Verona' ),
			'nag_type'                  => 'updated'
		)
	);

	tgmpa( $plugins, $config );

}

/*************************
Setup post custom ordering
**************************/

/* Thanks to "Term Menu Order" plugin by James Lafferty (https://github.com/kalchas) */


add_action( 'admin_init', 'verona_setup_post_attrs' );
function verona_setup_post_attrs()
{
    add_post_type_support( 'coffee_menu', 'page-attributes' );
    add_post_type_support( 'food_menu', 'page-attributes' );
}

add_filter('posts_orderby', 'verona_change_post_orderby');
function verona_change_post_orderby($orderby_statement) {
    if (is_admin())
        return $orderby_statement;

    return "menu_order";
}

add_action('after_switch_theme', 'verona_taxonomy_ordering_setup');
function verona_taxonomy_ordering_setup() {
    global $wpdb;

    $sql = "ALTER TABLE `{$wpdb->terms}` ADD `menu_order` INT (11) NOT NULL DEFAULT 0;";
    $wpdb->query($sql);
}

add_action('init', 'verona_taxonomy_ordering_init', 99);
function verona_taxonomy_ordering_init() {
    $value = 'food_menu_categories';
    add_filter("manage_edit-{$value}_columns", 'verona_taxonomy_ordering_add_column_header');
    add_filter("manage_{$value}_custom_column", 'verona_taxonomy_ordering_add_column_value', 10, 3);

    add_filter("manage_edit-{$value}_sortable_columns", 'verona_taxonomy_ordering_sortable_columns');

    add_action("{$value}_add_form_fields", 'verona_taxonomy_ordering_add_form_field');
    add_action("{$value}_edit_form_fields", 'verona_taxonomy_ordering_edit_form_field');

    add_filter('get_terms_args', 'verona_taxonomy_find_menu_orderby');

    add_filter("manage_edit-tags_columns", 'verona_taxonomy_ordering_add_column_header');
    add_action('create_term', 'verona_taxonomy_ordering_add_edit_menu_order');
    add_action('edit_term', 'verona_taxonomy_ordering_add_edit_menu_order');
    add_action('quick_edit_custom_box', 'verona_taxonomy_ordering_quick_edit_menu_order', 10, 3);

    add_filter("manage_edit-food_menu_columns", 'verona_taxonomy_ordering_add_column_header');
    add_action("manage_food_menu_posts_custom_column", 'verona_post_ordering_add_column_value', 10, 2);
    add_filter("manage_edit-food_menu_sortable_columns", 'verona_taxonomy_ordering_sortable_columns');

    add_filter("manage_edit-coffee_menu_columns", 'verona_taxonomy_ordering_add_column_header');
    add_action("manage_coffee_menu_posts_custom_column", 'verona_post_ordering_add_column_value', 10, 2);
    add_filter("manage_edit-coffee_menu_sortable_columns", 'verona_taxonomy_ordering_sortable_columns');
}

add_action('admin_head', 'verona_ordering_column_style');
function verona_ordering_column_style() {
    echo '<style>';
    echo '.column-menu_order { width: 10%; }';
    echo '</style>';
}

function verona_taxonomy_edit_menu_orderby () {
    remove_filter('get_terms_orderby', 'verona_taxonomy_edit_menu_orderby');
    return "menu_order";
}

function verona_taxonomy_find_menu_orderby ($args) {
    if ('menu_order' === $args['orderby']) {
        add_filter('get_terms_orderby', 'verona_taxonomy_edit_menu_orderby');
    }

    return $args;
}

function verona_post_ordering_add_column_value($column, $post_id) {
    global $wpdb;

    if ($column == 'menu_order')
        echo $wpdb->get_var("SELECT menu_order FROM $wpdb->posts WHERE ID=" . $post_id);
}

function verona_taxonomy_ordering_add_column_header($columns) {
    $columns = array('cb' => $columns['cb'], 'menu_order' => __('Order', 'Verona')) + array_splice($columns, 1);
    return $columns;
}

function verona_taxonomy_ordering_sortable_columns($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}

function verona_taxonomy_ordering_add_column_value ($empty = '', $custom_column, $term_id) {
    $taxonomy = (isset($_POST['taxonomy'])) ? $_POST['taxonomy'] : $_GET['taxonomy'];

    $term = get_term($term_id, $taxonomy);

    if( isset( $term->$custom_column ) )
        return $term->$custom_column;
}

function verona_taxonomy_ordering_add_form_field () {
    $form_field_name = 'verona_menu_order';

    $form_field = '<div class="form-field"><label for="' . $form_field_name . '">' . __('Order', 'Verona') . '</label><input name="' . $form_field_name . '" id="' . $form_field_name . '" type="text" value="0" size="10" /><p>' . __('This works like the &#8220;Order&#8220; field for pages.', 'Verona') . '</p></div>';

    echo $form_field;
}

function verona_taxonomy_ordering_edit_form_field ($term) {
    $form_field_name = 'verona_menu_order';

    $form_field = '<tr class="form-field"><th scope="row" valign="top"><label for="' . $form_field_name . '">' . __('Order', 'Verona')  . '</label></th><td><input name="' . $form_field_name . '" id="' . $form_field_name . '" type="text" value="' . $term->menu_order . '" size="10" /><p class="description">' . __('This works like the &#8220;Order&#8220; field for pages.', 'Verona') .'</p></td></tr>';

    echo $form_field;
}

function verona_taxonomy_ordering_add_edit_menu_order($term_id) {
    global $wpdb;
    $form_field_name = 'verona_menu_order';

    if (isset($_POST[$form_field_name])) {
        $wpdb->update($wpdb->terms, array('menu_order' => $_POST[$form_field_name]), array('term_id' => $term_id));
    }
}

function verona_taxonomy_ordering_quick_edit_menu_order($column_name, $post_type) {
    if ($column_name != 'menu_order' || $post_type != 'edit-tags') return;

    $form_field_name = 'verona_menu_order';

    $menu_order_field = '<fieldset><div class="inline-edit-col"><label><span class="title">' . __( 'Order' , 'term-menu-order') . '</span><span class="input-text-wrap"><input class="ptitle" name="'. $form_field_name . '" type="text" value="" /></span></label></div></fieldset>';

    $menu_order_field .= '<script type="text/javascript">

    </script>';

    echo $menu_order_field;
}

?>