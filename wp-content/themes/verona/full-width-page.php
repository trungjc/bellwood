<?php
/**
 * Template Name: Full-width, no sidebar
 * Description: A full-width template with no sidebar
 *
 * @package WordPress
 * @subpackage Verona WordPress
 */

get_header(); 

		while ( have_posts() ) : the_post(); 
			the_content();
		endwhile;
                
get_footer(); ?>