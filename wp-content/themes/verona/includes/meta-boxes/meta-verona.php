<?php
$prefix = 'verona_';

global $meta_boxes;
$post_id = get_the_ID();
$meta_boxes = array();

$layersliders = array();
// $layersliders[0] = 'None';

global $wpdb;
// Table name
$table_name = $wpdb->prefix . "layerslider";
// First check if exists
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
// Get sliders
	$sliders = $wpdb->get_results( "SELECT * FROM $table_name WHERE flag_hidden = '0' AND flag_deleted = '0' ORDER BY date_c ASC LIMIT 100" );
	// Iterate over the sliders
	if($sliders) {
	  foreach($sliders as $key => $item) {
	  	$layersliders[$item->id] = $item->name;
	  }
	}
}
$lightwhite = 'theme=light&color=white';
// Global meta boxes for posts
$meta_boxes[] = array(
	'id' => 'fullposts',
	'title' => 'Post Options',
	'pages' => array( 'post'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array (
		array(
			'name'		=> __( 'Add Featured Video', 'Verona' ),
			'id'		=> $prefix . 'postvideo',
			'desc'		=> __( 'Add the video url, for example:<br/> Vimeo: http://vimeo.com/58987388 or <br/>YouTube: http://www.youtube.com/watch?v=4Wkr0eXiUNw', 'Verona' ),
			'type'		=> 'text',
			'size'		=> 65
		),
		array(
			'name'		=> __( 'Choose skin for the YouTube player', 'Verona' ),
			'id'		=> $prefix . 'youtubeskin',
			'type'		=> 'select',
			'options' => array(
				'1' => 'Light white skin',
				'2' => 'Light red skin',
				'3' => 'Dark white skin',
				'4' => 'Dark red skin (default)'
			),
			'multiple' => false,
			'std' => '4'
		),
		array(
			'name'		=> __( 'Choose color for the Vimeo player', 'Verona' ),
			'id'		=> $prefix . 'vimeoskin',
			'type'		=> 'color',
			'std'		=> '#FF7409'
		),
	)
);

// Page global meta boxes
// General Page Options
$meta_boxes[] = array(
	'id' => 'fullpages',
	'title' => __( 'General Page Options', 'Verona' ),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array (
		array(
			'name'		=> __( 'Hide the whole Page Tagline', 'Verona' ),
			'id'		=> $prefix . 'hidetagline',
			'desc'		=> __( 'Select "Yes" if you do NOT want to display the tagline', 'Verona' ),
			'type'		=> 'select',
			'options' => array(
				'hide' => 'Yes',
				'show' => 'No',
			),
			'multiple' => false,
		),
		array(
			'name'		=> __( 'Hide only the Page Name Title', 'Verona' ),
			'id'		=> $prefix . 'hidetitletagline',
			'desc'		=> __( 'Select "Yes" if you do NOT want to display the tagline title or the page name', 'Verona' ),
			'type'		=> 'select',
			'options' => array(
				'hide' => 'Yes',
				'show' => 'No',
			),
			'multiple' => false,
		),
		array(
			'name' => __( 'Add Page Tagline', 'Verona' ),
			'id'   => "{$prefix}tagline",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => true,
			'desc'		=> __( 'Add custom content to populate the tagline partto the top of this page', 'Verona'),
			'std'  => __( '<center>Write your page tagline here, add content with or without shortcodes</center>', 'Verona' ),
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => false,
				'media_buttons' => false,
			),
		),
		array(
			'type' => 'heading',
			'name' => __( 'Food Menu Page Options', 'Verona' ),
			'id'   => 'fake_id3',
		),
		array(
			'name'    => 'Food Menu Categories',
			'id'      => $prefix . 'food_categories',
			'type'    => 'taxonomy',
			'desc'		=> 'If this is a food menu page, select which items from what categories to be displayed on this page.',
			'multiple' => true,
			'options' => array(
				'taxonomy' => 'food_menu_categories',
				'type' => 'select_advanced'
			),
			'placeholder'	=> 'All Food Categories',
			'std' => 'All categories'
		),
		array(
			'type' => 'heading',
			'name' => __( 'Coffee Page Options', 'Verona' ),
			'id'   => 'fake_id2',
		),
		array(
			'name'    => 'Coffee Menu Categories',
			'id'      => $prefix . 'coffee_categories',
			'type'    => 'taxonomy',
			'desc'		=> 'If this is a coffee menu page, select which items from what categories to be displayed on this page.',
			'multiple' => true,
			'options' => array(
				'taxonomy' => 'coffee_menu_categories',
				'type' => 'select_advanced'
			),
			'placeholder'	=> 'Select Coffee Categories',
			'std' => 'All categories'
		),
		array(
			'name'		=> __( 'Grid Layout for this coffee menu page', 'Verona' ),
			'id'		=> $prefix . 'coffee_page_grid',
			'desc'		=> __( 'Select the grid layout for this page. Will overwrite the global coffee grid layout that is under theme options panel. For more of how will look like check the coffee menu options at the themes option panel.', 'Verona' ),
			'type'		=> 'select',
			'options' => array(
				'none' => 'None',
				'3133' => '3133',
				'1333' => '1333',
				'3133' => '3133',
				'3313' => '3313',
				'3331' => '3331',
				'1323' => '1323',
				'2323' => '2323',
				'2332' => '2332',
				'3232' => '3232',
				'1432' => '1432',
				'1234' => '1234',
				'3421' => '3421'
			),
			'multiple' => false,
			'std'	   => 'none'
		),
		array(
			'type' => 'heading',
			'name' => __( 'LayerSlider Options', 'Verona' ),
			'id'   => 'fake_id', // Not used but needed for plugin
		),
		array(
			'name' => 'Enable Slider:',
			'id'   => "{$prefix}sliderenable",
			'type' => 'select',
			'std'  => 'disable',
			'options' => array(
				'enable' => 'Enabled',
				'disable' => 'Disabled',
			),
			'desc'	=> 'Enable or disable the slider on this page',
			'multiple' => false,
		),
		array(
			'name' => __( 'Add Slider:', 'Verona' ),
			'id'          => "{$prefix}layerslider",
			'desc'        => 'Choose which already created slider to show on this particular page',
			'type'        => 'select',
			'options'     => $layersliders,
			'std'		  => 'None',
			'multiple'	=> false,
      	),
	)
);

// Food Menu meta boxes
$meta_boxes[] = array(
	'id' => 'food_menu',
	'title' => __('Food Menu Options', 'Verona' ),
	'pages' => array( 'food_menu' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		// meta fields
        array(
            'name'      => __( 'Currency', 'Verona' ),
            'id'        => "{$prefix}currency",
            'desc'      => __( 'Choose the currency sign for this food menu item', 'Verona' ),
            'type'      => 'select',
            'options' => array(
                '$' => __( 'US Dollar', 'Verona' ),
                '€' => __( 'Euro', 'Verona' ),
                '¥' => __( 'Yen', 'Verona' ),
                '£' => __( 'UK Pound', 'Verona' ),
            ),
            'multiple' => false,
            'placeholder' => 'Choose currency',
            'std' => '$',
        ),
		array(
			'name' => __( 'Price', 'Verona' ),
			'id'   => "{$prefix}price",
			'type' => 'text_list',
			'desc' => __('Add price tag for this food menu item', 'Verona'),
            'options' => array('text' => 'Name','number' => 'Price'),
			'min'  => 0,
			'step' => 0.01,
            'clone' => true
		),
	)
);

// Coffee Menu meta boxes
$meta_boxes[] = array(
	'id' => 'coffee_menu',
	'title' => __('Coffee Menu Item Options', 'Verona' ),
	'pages' => array( 'coffee_menu' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		// meta fields
		array(
			'name' => __( 'Subtitle', 'Verona' ),
			'id'   => "{$prefix}subtitle",
			'type' => 'textarea',
			'cols' => '20',
			'rows' => '3',
			'desc' => __('Add subtitle (under the title) for this coffee item', 'Verona'),
		),
	)
);

function verona_register_meta_boxes() {

	global $meta_boxes;

	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			new RW_Meta_Box( $meta_box );
		}
	}
}

add_action( 'admin_init', 'verona_register_meta_boxes' );

?>