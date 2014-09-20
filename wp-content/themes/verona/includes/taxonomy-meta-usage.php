<?php
/**
 * Registering meta sections for taxonomies
 *
 * All the definitions of meta sections are listed below with comments, please read them carefully.
 * Note that each validation method of the Validation Class MUST return value.
 *
 * You also should read the changelog to know what has been changed
 *
 */

/********************* BEGIN DEFINITION OF META SECTIONS ***********************/

global $meta_sections;
$meta_sections = array();

// first meta section
$meta_sections[] = array(
	'title' => 'Icons for categories',			// section title
	'taxonomies' => array('food_menu_categories'),			// list of taxonomies. Default is array('category', 'post_tag'). Optional
	'id' => 'first_section',					// ID of each section, will be the option name

	'fields' => array(							// list of meta fields

		array(
			'name' => 'Category Icon',
			'desc' => 'Upload icon to the food menu category',
			'id' => 'icon',
			'type' => 'image'						// image upload
		)
	)
);

/**
 * Register meta boxes
 *
 * @return void
 */
function verona_register_taxonomy_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Taxonomy_Meta' ) )
		return;

	global $meta_sections;
	foreach ( $meta_sections as $meta_section )
	{
		new RW_Taxonomy_Meta( $meta_section );
	}
}
// Hook to 'admin_init' to make sure the class is loaded before
// (in case using the class in another plugin)
add_action( 'admin_init', 'verona_register_taxonomy_meta_boxes' );


/********************* END DEFINITION OF META SECTIONS ***********************/

/********************* BEGIN VALIDATION ***********************/

/**
 * Validation class
 * Define ALL validation methods inside this class
 * Use the names of these methods in the definition of meta boxes (key 'validate_func' of each field)
 */
class RW_Taxonomy_Meta_Validate {
	function check_name($text) {
		if ($text == 'Anh Tran') {
			return 'He is Rilwis';
		}
		return $text;
	}
}

/********************* END VALIDATION ***********************/
?>
