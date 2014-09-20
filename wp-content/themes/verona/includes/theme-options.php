<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General'
      ),
      array(
        'id'          => 'header',
        'title'       => 'Header'
      ),
      array(
        'id'          => 'food_menu',
        'title'       => 'Food Menu'
      ),
      array(
        'id'          => 'coffe_menu',
        'title'       => 'Coffee Menu'
      ),
      array(
        'id'          => 'blogoptions',
        'title'       => 'Blog Options'
      ),
      array(
        'id'          => 'styling',
        'title'       => 'Styling Options'
      ),
      array(
        'id'          => 'shortcodes',
        'title'       => 'Shortcodes Styling'
      ),
      array(
        'id'          => 'typography',
        'title'       => 'Typography'
      ),
      array(
        'id'          => 'footer',
        'title'       => 'Footer'
      ),
      array(
        'id'          => 'seo',
        'title'       => 'SEO'
      ),
      array(
        'id'          => '404page',
        'title'       => '404 Page'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'login_logo',
        'label'       => 'Custom Admin Login Logo',
        'desc'        => 'Upload a custom logo for your WordPress login screen, or specify the URL directly',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Browser Favicon',
        'desc'        => 'Upload your favicon which should be 16 pixels width by 16 pixels height.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple_favicon',
        'label'       => 'Apple Touch Icon',
        'desc'        => 'Upload the default apple touch icon, the icon should be 57 pixels width by 57 pixels height.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple_favicon_72',
        'label'       => 'Apple Touch Icon 72x72',
        'desc'        => 'The icon should be 72 pixels width by 72 pixels height.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple_favicon_114',
        'label'       => 'Apple Touch Icon 114x114',
        'desc'        => 'The icon should be 114 pixels width by 114 pixels height.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'responsivness',
        'label'       => 'Responsive',
        'desc'        => 'Enable or disable the responsivness.',
        'std'         => 'enabled',
        'type'        => 'select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enabled',
            'label'       => 'Enabled',
            'src'         => ''
          ),
          array(
            'value'       => 'disabled',
            'label'       => 'Disabled',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'logo',
        'label'       => 'Upload your Logo',
        'desc'        => 'Upload your own logo, or simply specify the URL directly. Delete or leave it empty to show text only.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'logo_positions',
        'label'       => 'Logo Positions',
        'desc'        => 'Choose the position of the logo in the header, to be left, centered or right positioned.',
        'std'         => 'logo-center',
        'type'        => 'select',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'logo-left',
            'label'       => 'Left',
            'src'         => ''
          ),
          array(
            'value'       => 'logo-center',
            'label'       => 'Centered',
            'src'         => ''
          ),
          array(
            'value'       => 'logo-right',
            'label'       => 'Right',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'headercolor',
        'label'       => 'Header Background Color',
        'desc'        => 'Choose a color that you would like to use for the header.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'headeropacity',
        'label'       => 'Header Opacity',
        'desc'        => 'Enable or disable the header opacity, also affected are the menu dropdowns.',
        'std'         => 'enabled',
        'type'        => 'select',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enabled',
            'label'       => 'Enabled',
            'src'         => ''
          ),
          array(
            'value'       => 'disabled',
            'label'       => 'Disabled',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'sliderposition',
        'label'       => 'Slider Position',
        'desc'        => 'Select "yes" if you want the slider to be underneath the header.',
        'std'         => 'yes',
        'type'        => 'select',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Yes',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'No',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'navactive',
        'label'       => 'Navigation background active Color',
        'desc'        => 'Choose the background color when menu link is active.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'navigation_font',
        'label'       => 'First level navigation link font',
        'desc'        => 'Change the font settings of the menu.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'second_navigation',
        'label'       => 'Second level navigation link font',
        'desc'        => 'Change the font settings of the dropdown menu.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'bodycolor',
        'label'       => 'Body Background',
        'desc'        => 'Choose a color that you would like to use for the body of the page.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'accent_color',
        'label'       => 'Main Accent Color',
        'desc'        => 'Change the color for borders, hovers, links etc.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'lightbox_background_color',
        'label'       => 'Lightbox Background Color',
        'desc'        => 'Change the background color of the lightbox on food menu items.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'links_color',
        'label'       => 'Links Color',
        'desc'        => 'Change the color for all links.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'links_hover',
        'label'       => 'Links hover color',
        'desc'        => 'Change the color for the hover of all links.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'title_background',
        'label'       => 'Page Tagline Background',
        'desc'        => 'Change the background color for the page tagline.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_color',
        'label'       => 'Footer Background',
        'desc'        => 'Choose color for your footer background.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'copyright_color',
        'label'       => 'Footer Copyright Background',
        'desc'        => 'Choose a background color for the part below the widgetized footer, where is the copyright message.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_css',
        'label'       => 'Custom CSS',
        'desc'        => 'Add your custom css code.',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'accordion_title',
        'label'       => 'ACCORDIONS',
        'desc'        => 'Change the accordion shortcode background colors when active and inactive.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'accordion_text_title_color',
        'label'       => 'Accordion title text color',
        'desc'        => '',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'accordion_active',
        'label'       => 'Accordion active color',
        'desc'        => '',
        'std'         => '#FF7400',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'accordion_inactive',
        'label'       => 'Accordion inactive color',
        'desc'        => '',
        'std'         => '#724230',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tabs_title',
        'label'       => 'TABS',
        'desc'        => 'Change the tabs shortcode background colors when active and inactive.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tabs_text_title_color',
        'label'       => 'Tab title text color',
        'desc'        => '',
        'std'         => '#FF7400',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tabs_active',
        'label'       => 'Tab active color',
        'desc'        => '',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tabs_inactive',
        'label'       => 'Tab inactive color',
        'desc'        => '',
        'std'         => '#724230',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'toggle_title',
        'label'       => 'TOGGLES',
        'desc'        => 'Change the toggle shortcode background colors when active and inactive.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'toggle_text_title_color',
        'label'       => 'Toggle title text color',
        'desc'        => '',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'toggle_active',
        'label'       => 'Toggle active color',
        'desc'        => '',
        'std'         => '#724230',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'toggle_inactive',
        'label'       => 'Toggle inactive color',
        'desc'        => '',
        'std'         => '#724230',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'titles_title',
        'label'       => 'TITLES',
        'desc'        => 'Change the titles color and border color.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'title_color',
        'label'       => 'Titles text color',
        'desc'        => '',
        'std'         => '#fff',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'title_border_color',
        'label'       => 'Titles border color',
        'desc'        => '',
        'std'         => '#FF7400',
        'type'        => 'colorpicker',
        'section'     => 'shortcodes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'page_title',
        'label'       => 'Page Tagline',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h1',
        'label'       => 'h1',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h2',
        'label'       => 'h2',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h3',
        'label'       => 'h3',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h4',
        'label'       => 'h4',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'h5',
        'label'       => 'h5',
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'food_menus_lightbox',
        'label'       => 'Lightbox popup',
        'desc'        => 'Enable or disable the lightbox for the listed food menu items',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'food_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enabled',
            'label'       => 'Enabled',
            'src'         => ''
          ),
          array(
            'value'       => 'disabled',
            'label'       => 'Disabled',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'food_filter',
        'label'       => 'Food menu filtering',
        'desc'        => 'Enable or disable the isotope filtering for the food menu items. If disabled you will have 4 menu items in a row instead of 3.',
        'std'         => 'enabled',
        'type'        => 'select',
        'section'     => 'food_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enabled',
            'label'       => 'Enabled',
            'src'         => ''
          ),
          array(
            'value'       => 'disabled',
            'label'       => 'Disabled',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'food_categories_order',
        'label'       => 'Food menu categories order',
        'desc'        => 'If the food menu filtering is enabled, choose the order of the categories. <br/>By default is random.',
        'std'         => 'ASC',
        'type'        => 'select',
        'section'     => 'food_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'ASC',
            'label'       => 'Ascending A-Z',
            'src'         => ''
          ),
          array(
            'value'       => 'DESC',
            'label'       => 'Descending Z-A',
            'src'         => ''
          ),
          array(
            'value'       => 'random',
            'label'       => 'By Date Created',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'isotope_effect',
        'label'       => 'Isotope animation',
        'desc'        => 'Change the animation type of the isotope filtering.',
        'std'         => 'easeOutBack',
        'type'        => 'select',
        'section'     => 'food_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'linear',
            'label'       => 'linear',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInSine',
            'label'       => 'easeInSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutSine',
            'label'       => 'easeOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutSine',
            'label'       => 'easeInOutSine',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuad',
            'label'       => 'easeInQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuad',
            'label'       => 'easeOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuad',
            'label'       => 'easeInOutQuad',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInCubic',
            'label'       => 'easeInCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCubic',
            'label'       => 'easeOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCubic',
            'label'       => 'easeInOutCubic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuart',
            'label'       => 'easeInQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuart',
            'label'       => 'easeOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuart',
            'label'       => 'easeInOutQuart',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInQuint',
            'label'       => 'easeInQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutQuint',
            'label'       => 'easeOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutQuint',
            'label'       => 'easeInOutQuint',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInExpo',
            'label'       => 'easeInExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutExpo',
            'label'       => 'easeOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutExpo',
            'label'       => 'easeInOutExpo',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInCirc',
            'label'       => 'easeInCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutCirc',
            'label'       => 'easeOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutCirc',
            'label'       => 'easeInOutCirc',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBack',
            'label'       => 'easeInBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBack',
            'label'       => 'easeOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBack',
            'label'       => 'easeInOutBack',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInElastic',
            'label'       => 'easeInElastic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutElastic',
            'label'       => 'easeOutElastic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutElastic',
            'label'       => 'easeInOutElastic',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInBounce',
            'label'       => 'easeInBounce',
            'src'         => ''
          ),
          array(
            'value'       => 'easeOutBounce',
            'label'       => 'easeOutBounce',
            'src'         => ''
          ),
          array(
            'value'       => 'easeInOutBounce',
            'label'       => 'easeInOutBounce',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'isotope_effect_speed',
        'label'       => 'Isotope animation duration',
        'desc'        => 'Add how much seconds should the isotope animation take. 1000 = 1 second.',
        'std'         => '1200',
        'type'        => 'text',
        'section'     => 'food_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'food_items_number',
        'label'       => 'Number of Food Menu Items',
        'desc'        => 'Set up how many items should be displayed on food menu page.<br/> By default is set to 18.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'food_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'food_item_prices',
        'label'       => 'Price tag',
        'desc'        => 'Show or hide the price tag on the food menu items.',
        'std'         => 'enabled',
        'type'        => 'select',
        'section'     => 'food_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enabled',
            'label'       => 'Enabled',
            'src'         => ''
          ),
          array(
            'value'       => 'disabled',
            'label'       => 'Disabled',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'coffee_hover',
        'label'       => 'Enable hover effect on coffee menu items',
        'desc'        => 'Enable or disable the hover effect for coffee menu images.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'coffe_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enabled',
            'label'       => 'Enabled',
            'src'         => ''
          ),
          array(
            'value'       => 'disabled',
            'label'       => 'Disabled',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'hover_color',
        'label'       => 'Change the color for the hover effect',
        'desc'        => 'Change the color for the hover effect on coffee menu items.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'coffe_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'grids',
        'label'       => 'Grid Layout for Coffee Menu',
        'desc'        => '',
        'std'         => '3313',
        'type'        => 'radio-image',
        'section'     => 'coffe_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_grid',
        'label'       => 'Custom Grid Layout',
        'desc'        => 'Or simply put your custom order, just make sure the total is 10. You can use 1, 2, 3, 4 items in a row.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'coffe_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'single_coffee_item_post',
        'label'       => 'Single Coffee Item Post Options',
        'desc'        => 'Below are options for the single coffee post.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'coffe_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'slider_animation',
        'label'       => 'Slider animation',
        'desc'        => 'Change the animation of the slider for the left image on single coffee item post. This will work only if you have attached more than one image to the post.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'coffe_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'fade',
            'label'       => 'Fade',
            'src'         => ''
          ),
          array(
            'value'       => 'slide',
            'label'       => 'Slide',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'slider_slideshow',
        'label'       => 'Slider slideshow',
        'desc'        => 'Enable if you want to animate the slider automatically as slideshow.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'coffe_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Enable',
            'src'         => ''
          ),
          array(
            'value'       => 'no',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'slideshow_duration',
        'label'       => 'Slideshow duration',
        'desc'        => 'Add how much seconds should one image stay before another comes. 1000 = 1 second.',
        'std'         => '4000',
        'type'        => 'text',
        'section'     => 'coffe_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'related_coffees',
        'label'       => 'Display Related Items below single coffee post',
        'desc'        => 'Choose if you want to show or hide the related coffees or items that are located under the single coffee post.',
        'std'         => 'show',
        'type'        => 'select',
        'section'     => 'coffe_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'show',
            'label'       => 'Show',
            'src'         => ''
          ),
          array(
            'value'       => 'hide',
            'label'       => 'Hide',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'coffee_post_type_slug',
        'label'       => 'Coffee Slug',
        'desc'        => 'Change the custom post type coffee_menu slug to your preferred one. Ex: Bewerages, Drinks etc. <br/>After changing this please<br/> go to Settings-->Permalinks and resave the permalinks.',
        'std'         => 'coffees',
        'type'        => 'text',
        'section'     => 'coffe_menu',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blogsidebar',
        'label'       => 'Blog &amp; Single Page Sidebar Position',
        'desc'        => 'Choose whether you want to display the sidebar on the left or the right side on the blog or single page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'blogoptions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right',
            'label'       => 'Right',
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => 'Left',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'blog_excerpt',
        'label'       => 'Blog Excerpt Length',
        'desc'        => 'Extended or shorten the excerpt on blog page. By default is set to 80.',
        'std'         => '80',
        'type'        => 'text',
        'section'     => 'blogoptions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'single_blog_post',
        'label'       => 'SINGLE BLOG POST OPTIONS',
        'desc'        => 'Below are the options for single blog post.',
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'blogoptions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'display_tags',
        'label'       => 'Display Tags on single blog post',
        'desc'        => 'If the post has tags, they automatically show under the post. Choose if you want to show or hide the tags.',
        'std'         => 'show',
        'type'        => 'select',
        'section'     => 'blogoptions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'show',
            'label'       => 'Show',
            'src'         => ''
          ),
          array(
            'value'       => 'hide',
            'label'       => 'Hide',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'display_meta',
        'label'       => 'Display Meta Info on single blog post',
        'desc'        => 'Choose if you want to show or hide the meta info that is located above the featured image of the blog post.',
        'std'         => 'show',
        'type'        => 'select',
        'section'     => 'blogoptions',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'show',
            'label'       => 'Show',
            'src'         => ''
          ),
          array(
            'value'       => 'hide',
            'label'       => 'Hide',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_all',
        'label'       => 'Show or Hide the whole footer',
        'desc'        => 'Choose if you want to display or hide the whole footer .',
        'std'         => 'enabled',
        'type'        => 'select',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enabled',
            'label'       => 'Show',
            'src'         => ''
          ),
          array(
            'value'       => 'disabled',
            'label'       => 'Hide',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_columns',
        'label'       => 'Footer Column Display',
        'desc'        => 'Choose how many columns and in what order widgets to be displayed, for example 1:2 will display only 2 columns, 1:3 will display 3 columns etc.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'onetwo',
            'label'       => '1:2',
            'src'         => ''
          ),
          array(
            'value'       => 'onethree',
            'label'       => '1:3',
            'src'         => ''
          ),
          array(
            'value'       => 'onefour',
            'label'       => '1:4',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_menu',
        'label'       => 'Enable footer menu',
        'desc'        => 'Show or hide the footer menu, if is disabled or hidden than the copyright text is positioned from left to center of the copyright area.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enabled',
            'label'       => 'Enable',
            'src'         => ''
          ),
          array(
            'value'       => 'disabled',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'copyright_all',
        'label'       => 'Show or Hide the whole copyright area',
        'desc'        => 'Choose if you want to display or hide the whole copyright row.',
        'std'         => 'enabled',
        'type'        => 'select',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enabled',
            'label'       => 'Show',
            'src'         => ''
          ),
          array(
            'value'       => 'disabled',
            'label'       => 'Hide',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'copyright_text',
        'label'       => 'Copyright Text',
        'desc'        => 'Enter your copyright message here',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'site_keywords',
        'label'       => 'Site Keywords',
        'desc'        => 'Write the list of keywords for you resume site page, separated by commas.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'site_description',
        'label'       => 'Site Description',
        'desc'        => 'Write a description for your site.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_analytics',
        'label'       => 'Google Analytics',
        'desc'        => 'Insert your google analytics tracking code',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'seo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'error_text',
        'label'       => '404 Error Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => '404page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}