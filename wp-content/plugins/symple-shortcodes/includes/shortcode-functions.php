<?php
/**
 * This file has all the main shortcode functions
 * @package Symple Shortcodes Plugin
 * @since 1.0
 * @author AJ Clarke : http://sympleplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://sympleplorer.com
 * @License: GNU General Public License version 2.0
 * @License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');

/*
 * Fix Shortcodes
 * @since v1.0
 */
if( !function_exists('symple_fix_shortcodes') ) {
	function symple_fix_shortcodes($content){
		$array = array (
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'symple_fix_shortcodes');
}

/*
 * Clear Floats
 * @since v1.0
 */
if( !function_exists('symple_clear_floats_shortcode') ) {
	function symple_clear_floats_shortcode() {
	   return '<div class="symple-clear-floats"></div>';
	}
	add_shortcode( 'clear_floats', 'symple_clear_floats_shortcode' );
}

/*
 * Callout
 * @since v1.4
 */
if( !function_exists('symple_callout_shortcode') ) {
	function symple_callout_shortcode( $atts, $content = NULL  ) {
		extract( shortcode_atts( array(
			'caption' => '',
			'background_color' => '',
			'text_color' => '',
			'button_text' => '',
			'button_color' => 'white',
			'button_text_color' => 'black',
			'button_url' => 'http://www.suitstheme.com',
			'button_rel' => 'nofollow',
			'button_target' => 'blank',
			'button_border_radius' => '',
			'class' => '',
			'icon_left' => '',
			'icon_right' => ''
		), $atts ) );

		$border_radius_style = ( $button_border_radius ) ? 'style="border-radius:'. $button_border_radius .'"' : NULL;
		$output = '<div class="symple-callout symple-clearfix '. $class .'" style="background: '. $background_color .';color: '.$text_color.';">';
		$output .= '<div class="symple-callout-caption" style="color: '.$text_color.';">';
			if ( $icon_left ) $output .= '<span class="symple-callout-icon-left icon-'. $icon_left .'"></span>';
			$output .= do_shortcode ( $content );
			if ( $icon_right ) $output .= '<span class="symple-callout-icon-right icon-'. $icon_right .'"></span>';
		$output .= '</div>';
		if ( $button_text !== '' ) {
			$output .= '<div class="symple-callout-button">';
				$output .='<a href="'. $button_url .'" title="'. $button_text .'" style="background: '. $button_color .';" target="_'. $button_target .'" class="symple-button" '. $border_radius_style .'><span class="symple-button-inner" style="color: '.$button_text_color.';">'. $button_text .'</span></a>';
			$output .='</div>';
		}
		$output .= '</div>';

		return $output;
	}
	add_shortcode( 'callout', 'symple_callout_shortcode' );
}

/*
 * Skillbars
 * @since v1.3
 */
if( !function_exists('symple_skillbar_shortcode') ) {
	function symple_skillbar_shortcode( $atts  ) {
		extract( shortcode_atts( array(
			'title' => '',
			'percentage' => '100',
			'color' => '#6adcfa',
			'class' => '',
			'show_percent' => 'true'
		), $atts ) );

		// Enque scripts
		wp_enqueue_script('symple_skillbar');

		// Display the accordion	';
		$output = '<div class="symple-skillbar symple-clearfix '. $class .'" data-percent="'. $percentage .'%">';
			if ( $title !== '' ) $output .= '<div class="symple-skillbar-title" style="background: '. $color .';"><span>'. $title .'</span></div>';
			$output .= '<div class="symple-skillbar-bar" style="background: '. $color .';"></div>';
			if ( $show_percent == 'true' ) {
				$output .= '<div class="symple-skill-bar-percent">'.$percentage.'%</div>';
			}
		$output .= '</div>';

		return $output;
	}
	add_shortcode( 'skillbar', 'symple_skillbar_shortcode' );
}

/*
 * Spacing
 * @since v1.0
 */
if( !function_exists('symple_spacing_shortcode') ) {
	function symple_spacing_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'size' => '20px',
			'class' => '',
		  ),
		  $atts ) );
	 return '<hr class="symple-spacing '. $class .'" style="height: '. $size .'" />';
	}
	add_shortcode( 'spacing', 'symple_spacing_shortcode' );
}

/**
* Highlights
* @since 1.0
*/
if ( !function_exists( 'symple_highlight_shortcode' ) ) {
	function symple_highlight_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' => 'yellow',
			'class' => '',
		  ),
		  $atts ) );
		  return '<span class="highlight highlight-'. $color .' '. $class .'">' . do_shortcode( $content ) . '</span>';

	}
	add_shortcode('highlight', 'symple_highlight_shortcode');
}

/*
 * Buttons
 * @since v1.0
 */
if( !function_exists('verona_button_shortcode') ) {
	function verona_button_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' => 'orange',
			'url' => 'http://www.suitstheme.com',
			'title' => 'Visit Site',
			'target' => 'self',
			'rel' => '',
			'border_radius' => '',
			'class' => '',
			'arrow' => '',
			'icon_left' => '',
			'icon_right' => ''
		), $atts ) );


		$border_radius_style = ( $border_radius ) ? 'style="border-radius:'. $border_radius .'"' : NULL;
		$rel = ( $rel ) ? 'rel="'.$rel.'"' : NULL;

		$button = NULL;
		$button .= '<a style="background:'.$color.';" href="' . $url . '" class="verona-button" target="_'.$target.'" title="'. $title .'" '. $border_radius_style .' '. $rel .'>';
			$button .= '<span class="verona-button-inner" '.$border_radius_style.'>';
					if($arrow == 'yes') {
			$button .= '<i class="icon-arrow"></i>';
		}
				$button .= $content;
			$button .= '</span>';
		$button .= '</a>';
		return $button;
	}
	add_shortcode('button', 'verona_button_shortcode');
}

/*
 * Testimonial
 * @since v1.0
 *
 */
if( !function_exists('symple_testimonial_shortcode') ) {
	function symple_testimonial_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'by' => '',
			'class' => '',
		  ), $atts ) );
		$testimonial_content = '';
		$testimonial_content .= '<div class="symple-testimonial '. $class .'"><div class="symple-testimonial-content">';
		$testimonial_content .= $content;
		$testimonial_content .= '</div><div class="symple-testimonial-author">';
		$testimonial_content .= $by .'</div></div>';
		return $testimonial_content;
	}
	add_shortcode( 'testimonial', 'symple_testimonial_shortcode' );
}

/************************
 *
 * Version 1.1 Additions
 *
*************************/

/*
 * Divider
 * @since v1.1
 */
if( !function_exists('symple_divider_shortcode') ) {
	function symple_divider_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'style' => 'fadeout',
			'margin_top' => '20px',
			'margin_bottom' => '20px',
			'class' => '',
		  ),
		  $atts ) );
		$style_attr = '';
		if ( $margin_top && $margin_bottom ) {
			$style_attr = 'style="margin-top: '. $margin_top .';margin-bottom: '. $margin_bottom .';"';
		} elseif( $margin_bottom ) {
			$style_attr = 'style="margin-bottom: '. $margin_bottom .';"';
		} elseif ( $margin_top ) {
			$style_attr = 'style="margin-top: '. $margin_top .';"';
		} else {
			$style_attr = NULL;
		}
	 return '<hr class="symple-divider '. $style .' '. $class .'" '.$style_attr.' />';
	}
	add_shortcode( 'divider', 'symple_divider_shortcode' );
}

/****************************
 *
 * Custom VERONA additions
 *
*****************************/

/*
 * Latest Posts from Blog
 * @since Verona theme v1.0
 */
if (!function_exists('verona_latest_blog_posts')) {

	function verona_latest_blog_posts($atts) {
		extract(shortcode_atts(array(
			'fromcategory' => '',
			'icon' => '',
			'title' => '',
			'linkurl' => '',
			'linkname' => '',
			'description' => ''
			),
		$atts));

		$lbp = new WP_Query('&category_name='.$fromcategory.'&posts_per_page=3');

		$latest_posts = '';
		$latest_posts .= '<div class="row">';
			$latest_posts .= '<div class="fifth">';
				$latest_posts .= '<div class="latest-content">';
				if($icon != '') {
				$latest_posts .= '<img src="'.$icon.'" />';
			}
				$latest_posts .= '<div class="latest-title">'.$title.'</div>'.$description.'</div>';
				$latest_posts .= '<a class="latest-more" href="'.$linkurl.'">'.$linkname.'</a>';
			$latest_posts .= '</div>'; // End of fifth
			$latest_posts .= '<div class="fourfifth">';
				$latest_posts .= '<ul class="block-three">';
				while($lbp->have_posts()): $lbp->the_post(); // Start the loop
				$post_id = get_the_ID();
				$postvideo = rwmb_meta('verona_postvideo');
					$latest_posts .= '<li class="latest-blog-post">';
					if ('' != has_post_thumbnail()) {
						$latest_posts .= '<a href="'.get_permalink().'">'.get_the_post_thumbnail($post_id, 'blog_latest').'</a>';
					} elseif ($postvideo != '') {
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

						$latest_posts .= '<div class="video-shortcode">';
					    if ( strpos($postvideo,'youtube') ) {
							preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $postvideo, $matches);
							$latest_posts.= '<iframe width="243" height="154" src="http://www.youtube.com/embed/'. $matches[1] .'?' . $youtubeskin . '&version=3&rel=1&fs=1&showsearch=0&showinfo=0&iv_load_policy=1&wmode=transparent" style="border: none"></iframe>';
						} else {
							preg_match('/http:\/\/vimeo.com\/(\d+)$/', $postvideo, $matches);
							$latest_posts.= '<iframe width="243" height="154" src="http://player.vimeo.com/video/'. $matches[1] .'?title=0&amp;byline=0&amp;color='.$vimeoskin.'&amp;autoplay=0" style="border: none"></iframe>';
						}
					    $latest_posts .= '</div>';
					} else { }
						$latest_posts .= '<a class="latest-blog-title" href="'.get_permalink().'">'.get_the_title().'</a>';
						$latest_posts .= '<p>'.limit_excerpt_length(get_the_excerpt(), '25').'</p>';
						$latest_posts .= '<div class="blog-post-meta">';
						$latest_posts .= '<div class="posted-by"><i class="icon-user"></i>'.__('Published By: ', 'Verona').' <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'. get_the_author_meta( 'display_name' ).'</a></div>';
						$latest_posts .= '<div class="posted-on"><i class="icon-time"></i>'.get_the_time('n M').'.</div>';
						$latest_posts .= '<div class="comment-count"><i class="icon-comments"></i><a href="'.get_comments_link().'">'.get_comments_number('No Comments', '1', '%').'</a></div>';
						$latest_posts .= '</div>';
					$latest_posts .= '</li>';
				endwhile; // End the loop
				$latest_posts .= '</ul>';
			$latest_posts .= '</div>'; // End of fourfifth
		$latest_posts .= '</div>'; // End of row
		return $latest_posts;

	}
	add_shortcode('latest_posts', 'verona_latest_blog_posts');
}

/*
 * Most Popular from Menu
 * @since Verona theme v1.0 - updated with attribute price tag show or hide in 1.4
 */
if (!function_exists('verona_popular_menu')) {

	function verona_popular_menu($atts) {
		extract(shortcode_atts(array(
			'fromcategory' => '',
			'icon' => '',
			'title' => '',
			'prices' => '',
			'linkurl' => '',
			'linkname' => '',
			'description' => ''
			),
		$atts));

		$args = array(
			'post_type' => 'food_menu',
			'food_menu_categories' => $fromcategory,
			'posts_per_page' => '6'
		);

		$fpm = new WP_Query( $args );

		$popular_menu = '';
		$popular_menu .= '<div class="row">';
			$popular_menu .= '<div class="fifth">';
				$popular_menu .= '<div class="latest-content">';
				$popular_menu .= '<img src="'.$icon.'" />';
				$popular_menu .= '<div class="latest-title">'.$title.'</div>';
				$popular_menu .= $description;
				$popular_menu .= '</div>';
				$popular_menu .= '<a class="latest-more" href="'.$linkurl.'">'.$linkname.'</a>';
			$popular_menu .= '</div>'; // End of fifth
			$popular_menu .= '<div class="fourfifth">';
				$popular_menu .= '<ul class="food-menu block-three">';
				while($fpm->have_posts()): $fpm->the_post(); // Start the loop
				$post_id = get_the_ID();
				// Full image for lightbox
			    $fullsize = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
		        $lightbox_img = $fullsize[0];
				$pricetag = rwmb_meta('verona_price');
				$currency = rwmb_meta('verona_currency', $post_id);
					if(!has_post_thumbnail()) {
					$popular_menu .= '<li class="food-menu-item nothumb">';
					} else {
					$popular_menu .= '<li class="food-menu-item">';
					$popular_menu .= '<div class="image-wrapper">';
					if(ot_get_option('food_menus_lightbox') != 'disabled') {
						$popular_menu .= '<a href="'.$lightbox_img.'">';
							$popular_menu .= get_the_post_thumbnail($post_id, 'food_menu_item');
						$popular_menu .= '</a>';
					} else {
						$popular_menu .= get_the_post_thumbnail($post_id, 'food_menu_item');
					}
					$popular_menu .= '</div>';
					}
					$popular_menu .= '<div class="menu-title">';
					$popular_menu .=  get_the_title();
					$popular_menu .= '</div>';
					$popular_menu .= '<p>';
					$popular_menu .= get_the_content();
					$popular_menu .= '</p>';
					if($prices == 'show' && $currency == '') {
                        if (is_array($pricetag)):
                            foreach($pricetag as $pt) {
                                $popular_menu .= '<div class="price-tag">'.$pt[0].': '.'$'.$pt[1].'</div>';
                            }
                        else:
    						$popular_menu .= '<div class="price-tag">$'.$pricetag.'</div>';
                        endif;
					}
					elseif($prices == '' || $prices == 'hide') {
						// $popular_menu .= '<div class="price-tag">Price: '.$currency.''.$pricetag.'</div>';
					}
					else {
                        if (is_array($pricetag)):
                            foreach($pricetag as $pt) {
                                $popular_menu .= '<div class="price-tag">'.$pt[0].': '.$currency.$pt[1].'</div>';
                            }
                        else:
                            $popular_menu .= '<div class="price-tag">'.$currency.$pricetag.'</div>';
                        endif;
					}
					$popular_menu .= '</li>'; //End of food menu item
				endwhile; // End the loop
				$popular_menu .= '</ul>';
			$popular_menu .= '</div>'; // End of fourfifth
		$popular_menu .= '</div>'; // End of row
		return $popular_menu;

	}
	add_shortcode('popular_menu', 'verona_popular_menu');
}

/*
 * Columns
 * @since Verona theme v1.0
 *
 */
/* One Half */
if( !function_exists('symple_one_half_shortcode') ) {
	function symple_one_half_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' =>''
		  ), $atts ) );
		  return '<div class="half">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('half', 'symple_one_half_shortcode');
}

/* One Third */
if( !function_exists('symple_one_third_shortcode') ) {
	function symple_one_third_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' => ''
		  ), $atts ) );
		  return '<div class="third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('third', 'symple_one_third_shortcode');
}

/* One Fourth */
if( !function_exists('symple_one_fourth_shortcode') ) {
	function symple_one_fourth_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' => ''
		  ), $atts ) );
		  return '<div class="quarter">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fourth', 'symple_one_fourth_shortcode');
}

/* One Fifth */
if( !function_exists('symple_one_fifth_shortcode') ) {
	function symple_one_fifth_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' => ''
		  ), $atts ) );
		  return '<div class="fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fifth', 'symple_one_fifth_shortcode');
}

/* One Sixth */
if( !function_exists('symple_one_sixth_shortcode') ) {
	function symple_one_sixth_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' => ''
		  ), $atts ) );
		  return '<div class="sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('sixth', 'symple_one_sixth_shortcode');
}

/* Two Thirds */
if( !function_exists('symple_two_third_shortcode') ) {
	function symple_two_third_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' =>''
		  ), $atts ) );
		  return '<div class="twothird">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('two_third', 'symple_two_third_shortcode');
}

/* Two Fifth */
if( !function_exists('symple_two_fifth_shortcode') ) {
	function symple_two_fifth_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' =>''
		  ), $atts ) );
		  return '<div class="twofifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('two_fifth', 'symple_two_fifth_shortcode');
}

/* Three Quarter */
if( !function_exists('symple_three_quarter_shortcode') ) {
	function symple_three_quarter_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' =>''
		  ), $atts ) );
		  return '<div class="threequarter">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('three_quarter', 'symple_three_quarter_shortcode');
}

/* Three Fifth */
if( !function_exists('symple_three_fifth_shortcode') ) {
	function symple_three_fifth_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' =>''
		  ), $atts ) );
		  return '<div class="threefifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('three_fifth', 'symple_three_fifth_shortcode');
}

/* Four Fifth */
if( !function_exists('symple_four_fifth_shortcode') ) {
	function symple_four_fifth_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' =>''
		  ), $atts ) );
		  return '<div class="fourfifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('four_fifth', 'symple_four_fifth_shortcode');
}

/* Five Sixth */
if( !function_exists('symple_five_sixth_shortcode') ) {
	function symple_five_sixth_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'position' =>''
		  ), $atts ) );
		  return '<div class="fivesixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fifth_sixth', 'symple_five_sixth_shortcode');
}

/*
 * Content box
 */
if( !function_exists('symple_box_shortcode') ) {
  function symple_box_shortcode($atts, $content = null) {
    $html = '';
    $html .= '<section class="row">';
    $html .= do_shortcode($content);
    $html .= '</section>';

    return $html;
  }
add_shortcode('box', 'symple_box_shortcode');
}

/*
 * Content boxes
 */
if( !function_exists('symple_boxes_shortcode') ) {
  function symple_boxes_shortcode($atts, $content = null) {
  	$html = '';
    $html .= '<article class="quarter service-box">';
    if($atts['image'] || $atts['title']):
    if($atts['image']):
    $html .= '<figure class="service-box-icon">';
    $html .= '<a><img src="'.$atts['image'].'" alt=""></a>';
    $html .= '</figure>';
    endif;
    if($atts['title']):
    $html .= '<h5>'.$atts['title'].'</h5>';
    endif;
    endif;
    $html .= '<p>'.do_shortcode($content).'</p>';

    $html .= '</article>';

    return $html;
  }
add_shortcode('boxes', 'symple_boxes_shortcode');
}

/*
 * Google Maps
 * @since v1.1
 */
if (! function_exists( 'symple_shortcode_googlemaps' ) ) :
	function symple_shortcode_googlemaps($atts, $content = null) {

		extract(shortcode_atts(array(
				'title' => '',
				'location' => '',
				'width' => '', //leave width blank for responsive designs
				'height' => '300',
				'zoom' => 8,
				'align' => '',
				'class' => '',
		), $atts));

		// load scripts
		wp_enqueue_script('symple_googlemap');
		wp_enqueue_script('symple_googlemap_api');


		$output = '<div id="map_canvas_'.rand(1, 100).'" class="googlemap '. $class .'" style="height:'.$height.'px;width:100%">';
			$output .= (!empty($title)) ? '<input class="title" type="hidden" value="'.$title.'" />' : '';
			$output .= '<input class="location" type="hidden" value="'.$location.'" />';
			$output .= '<input class="zoom" type="hidden" value="'.$zoom.'" />';
			$output .= '<div class="map_canvas"></div>';
		$output .= '</div>';

		return $output;

	}
	add_shortcode("googlemap", "symple_shortcode_googlemaps");
endif;

/*
* Escape band
* @since Verona theme v1.0
*
*/

if(!function_exists('escape_band')) {
	function escape_band($atts, $content = null) {
		extract(shortcode_atts(array(
			'background_color' => 'white',
			'background_image' => '',
			'type' => 'promo',
			'height' => ''
		), $atts));
		$band = '';
		$band .= '</div>';
		$band .= '</div>'; // Escaping the current container
		if($type == 'promo') {
			$band .= '<div class="band" style="margin-top:-40px;margin-bottom:40px;height:'.$height.'; background-image: url('.$background_image.'); background-color:'.$background_color.'">'; // Enter the band
		} else {
			$band .= '<div class="band" style="height:'.$height.'; background-image: url('.$background_image.'); background-color:'.$background_color.'">'; // Enter the band
		}
				$band .= '<div class="container">';
				$band .= do_shortcode($content);
				$band .= '</div>';
			$band .= '</div>'; // End of band
		$band .= '<div class="container">'; // Continue the container
		return $band;
	}
	add_shortcode('band', 'escape_band');
}

/*
* Youtube Video
* @since Verona theme v1.0
*
*/
if(!function_exists('youtube_video')) {
	function youtube_video($atts) {
		extract( shortcode_atts( array(
				'id' => '',
				'width' => 600,
				'height' => 360,
				'responsive' => 'yes'
			), $atts));
		if($responsive == 'yes') {
			return '<div class="video-shortcode"><iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allowfullscreen></iframe></div>';
		} else {
			return '<iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allowfullscreen></iframe>';
		}
	}
	add_shortcode('youtube', 'youtube_video');
}
/*
* Vimeo Video
* @since Verona theme v1.0
*
*/
if(!function_exists('vimeo_video')) {
	function vimeo_video($atts) {
		extract( shortcode_atts( array(
				'id' => '',
				'width' => 600,
				'color' => 'orange',
				'height' => 360,
				'responsive' => 'yes'
			), $atts));
		if($responsive == 'yes') {
			return '<div class="video-shortcode"><iframe src="http://player.vimeo.com/video/' . $id . '?title=0&amp;byline=0&amp;portrait=0&amp;color='.$color.'" width="' . $width . '" height="' . $height . '" frameborder="0"></iframe></div>';
		} else {
			return '<iframe src="http://player.vimeo.com/video/' . $id . '?title=0&amp;byline=0&amp;portrait=0&amp;color='.$color.'" width="' . $width . '" height="' . $height . '" frameborder="0"></iframe>';
		}
	}
	add_shortcode('vimeo', 'vimeo_video');
}

/*
* Social Icons
* @since Verona theme v1.0
*
*/
if( !function_exists('social_shortcode') ) {
	function social_shortcode( $atts ){
		extract( shortcode_atts( array(
			'icon' => 'twitter',
			'url' => 'http://www.twitter.com',
			'title' => 'Follow Us',
			'target' => 'self',
			'rel' => '',
			'version' => '',
			'class' => ''
		), $atts ) );
		if($version == 'big') {
		return '<a href="' . $url . '" class="'.$icon.' social big" target="_'.$target.'" title="'. $title .'" rel="'. $rel .'"><span></span></a>';
		} elseif($version == 'small') {
		return '<a href="' . $url . '" class="'.$icon.' social small" target="_'.$target.'" title="'. $title .'" rel="'. $rel .'"><span></span></a>';
		}
	}
	add_shortcode('social', 'social_shortcode');
}

/*
 * Title
 * @since Verona theme v1.2
 */
if( !function_exists('symple_title_shortcode') ) {
	function symple_title_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'title' => 'Sample Title',
			'type' => 'h2',
			'margin_top' => '',
			'margin_bottom' => '',
			'text_align' => '',
			'font_size' => '',
			'color' => '',
			'class' => '',
			'icon_left' => '',
			'icon_right' => ''
		  ),
		  $atts ) );

		$style_attr = '';
		if ( $font_size ) {
			$style_attr .= 'font-size: '. $font_size .';';
		}
		if ( $color ) {
			$style_attr .= 'color: '. $color .';';
		}
		if( $margin_bottom ) {
			$style_attr .= 'margin-bottom: '. $margin_bottom .';';
		}
		if ( $margin_top ) {
			$style_attr .= 'margin-top: '. $margin_top .';';
		}

		if ( $text_align ) {
			$text_align = 'text-align-'. $text_align;
		} else {
			$text_align = 'text-align-left';
		}

	 	$output = '<'.$type.' class="titles '. $text_align .' '. $class .'" style="'.$style_attr.'"><span>';
		if ( $icon_left ) $output .= '<i class="symple-button-icon-left icon-'. $icon_left .'"></i>';
			$output .= $title;
		if ( $icon_right ) $output .= '<i class="symple-button-icon-right icon-'. $icon_right .'"></i>';
		$output .= '</'.$type.'></span>';

		return $output;
	}
	add_shortcode( 'title', 'symple_title_shortcode' );
}

/*
 * Pricing Table
 * @since Verona theme 1.2
 *
 */

/*main*/
if( !function_exists('symple_pricing_table_shortcode') ) {
	function symple_pricing_table_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'class' => ''
		), $atts ) );
		return '<div class="pricing-table '. $class .'">' . do_shortcode($content) . '</div><div class="symple-clear-floats"></div>';
	}
	add_shortcode( 'pricing_table', 'symple_pricing_table_shortcode' );
}

/*section*/
if( !function_exists('symple_pricing_shortcode') ) {
	function symple_pricing_shortcode( $atts, $content = null  ) {

		extract( shortcode_atts( array(
			'size' => 'half',
			'position' => '',
			'featured' => 'no',
			'plan' => 'Basic',
			'cost' => '20',
			'currency' => '',
			'per' => 'month',
			'button_url' => '',
			'button_text' => 'Purchase',
			'button_color' => 'blue',
			'button_target' => 'self',
			'button_rel' => 'nofollow',
			'button_border_radius' => '',
			'class' => '',
		), $atts ) );

		//set variables
		$featured_pricing = ( $featured == 'yes' ) ? 'featured' : NULL;
		$border_radius_style = ( $button_border_radius ) ? 'style="border-radius:'. $button_border_radius .'"' : NULL;

		//start content
		$pricing_content ='';
		$pricing_content .= '<div class="pricing symple-'. $size .' '. $featured_pricing .' symple-column-'. $position. ' '. $class .'">';
			$pricing_content .= '<div class="pricing-header">';
				$pricing_content .= '<h5>'. $plan. '</h5>';
				$pricing_content .= '<div class="pricing-cost">'. $cost .'<span>'.$currency.'</span></div><div class="pricing-per">'. $per .'</div>';
			$pricing_content .= '</div>';
			$pricing_content .= '<div class="pricing-content">';
				$pricing_content .= ''. $content. '';
			$pricing_content .= '</div>';
			if( $button_url ) {
				$pricing_content .= '<div class="pricing-button"><a href="'. $button_url .'" class="verona-button"  target="_'. $button_target .'" style="background:'.$button_color.';" rel="'. $button_rel .'" '. $border_radius_style .'><span class="verona-button-inner" '. $border_radius_style .'>'. $button_text .'</span></a></div>';
			}
		$pricing_content .= '</div>';
		return $pricing_content;
	}

	add_shortcode( 'pricing', 'symple_pricing_shortcode' );
}

/*
 * Toggle
 * @since Verona theme 1.2
 */
if( !function_exists('symple_toggle_shortcode') ) {
	function symple_toggle_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title' => 'Toggle Title',
			'class' => '',
		), $atts ) );

		// Enque scripts
		wp_enqueue_script('symple_toggle');

		// Display the Toggle
		return '<div class="toggle '. $class .'"><h3 class="toggle-trigger">'. $title .'</h3><div class="toggle-container">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('toggle', 'symple_toggle_shortcode');
}

/*
 * Accordion
 * @since Verona theme 1.2
 *
 */

// Main
if( !function_exists('symple_accordion_main_shortcode') ) {
	function symple_accordion_main_shortcode( $atts, $content = null  ) {

		extract( shortcode_atts( array(
			'class' => ''
		), $atts ) );

		// Enque scripts
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('symple_accordion');

		// Display the accordion
		return '<div class="accordion '. $class .'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode( 'accordion', 'symple_accordion_main_shortcode' );
}


// Section
if( !function_exists('symple_accordion_section_shortcode') ) {
	function symple_accordion_section_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'title' => 'Title',
			'class' => '',
		), $atts ) );

	   return '<h3 class="accordion-trigger '. $class .'"><a href="#">'. $title .'</a></h3><div>' . do_shortcode($content) . '</div>';
	}

	add_shortcode( 'accordion_section', 'symple_accordion_section_shortcode' );
}

/*
 * Tabs
 * @since Verona theme 1.2
 *
 */
if (!function_exists('symple_tabgroup_shortcode')) {
	function symple_tabgroup_shortcode( $atts, $content = null ) {

		//Enque scripts
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('symple_tabs');

		// Display Tabs
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		$output = '';
		if( count($tab_titles) ){
		    $output .= '<div id="tab-'. rand(1, 100) .'" class="tabs">';
			$output .= '<ul class="ui-tabs-nav symple-clearfix">';
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}
		return $output;
	}
	add_shortcode( 'tabgroup', 'symple_tabgroup_shortcode' );
}
if (!function_exists('symple_tab_shortcode')) {
	function symple_tab_shortcode( $atts, $content = null ) {
		$defaults = array(
			'title' => 'Tab',
			'class' => ''
		);
		extract( shortcode_atts( $defaults, $atts ) );
		return '<div id="tab-'. sanitize_title( $title ) .'" class="tab-content '. $class .'">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'tab', 'symple_tab_shortcode' );
}

/*
 * Alerts
 * @since Verona theme 1.2
 *
 */
if(!function_exists('symple_alert_shortcode')) {
	function symple_alert_shortcode($atts, $content = null) {
		extract( shortcode_atts( array(
			'type' => ''
		  ), $atts ) );
		$html = '';
		$html .= '<div class="alert '.$type.'">';
		$html .= '<span>'.do_shortcode($content).'</span>';
		$html .= '<div class="close"><a href="#">x</a></div>';
		$html .= '</div>'; // End of Alert

		return $html;
	}
	add_shortcode('alert', 'symple_alert_shortcode');
}
