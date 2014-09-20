<?php
/**
 * @package WordPress
 * @subpackage Verona WordPress
 */

get_header(); ?>

              <?php if ( have_posts() ) : ?>
                   <h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'Verona' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                   
                      <?php
                      /* Run the loop for the search to output the results.
                       * If you want to overload this in a child theme then include a file
                       * called loop-search.php and that will be used instead.
                       */
                       get_template_part( 'index', 'search' );
                      ?>
                   
              <?php else : ?>
                      <div class="row">
                        <div class="twothird">
                          <div id="post-0" class="post no-results not-found">
                          <h2 class="entry-title"><?php _e( 'Nothing Found', 'Verona' ); ?></h2>
                          <div class="entry-content">
                              <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'Verona' ); ?></p>
                          </div><!-- .entry-content -->
                      </div><!-- #post-0 -->
                      <?php get_template_part('searchform'); ?>
                        </div>
                        <aside class="third">
                          <?php
                            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Default Main SideBar')): 
                            endif;
                          ?>
                        </aside><!-- End of sidebar -->
                      </div><!-- End of row -->
              <?php endif; ?>

<?php get_footer(); ?>