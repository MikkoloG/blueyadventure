<?php
/*
 * Template Name: Blog Page
 */
get_header();

// add option to classes to avoid the need of resetting the query in after query
$sidebar_postition = asalah_cross_option('asalah_sidebar_position');
$sidebar_class = asalah_sidebar_class();
global $asalah_blogpage_id;
global $banner_grid_first_post_id;
$asalah_blogpage_id = get_the_ID();
?>
    <h4 class="page-title screen-reader-text"><?php _e( 'Blog Posts', 'asalah' ); ?></h4>
    <main class="main_content <?php echo asalah_content_class(); ?>">

        <?php
        $args = array('post_type' => 'post');
        if ( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $args['paged'] = $paged;

        if (asalah_post_option('asalah_blog_page_cat') != '') {

          $cat = asalah_post_option('asalah_blog_page_cat');
            $args['cat'] = $cat;
        }
        
        if (asalah_post_option('asalah_blog_page_posts_number') != '') {
            $posts_per_page = asalah_post_option('asalah_blog_page_posts_number');
          } else {
            $posts_per_page = get_option('posts_per_page');
          }
          if (asalah_cross_option('asalah_blog_style') == 'banner_grid') {
            if ($paged == 1) {
              $posts_per_page = $posts_per_page + 1;
            } else {
      				$paged_offset = (1) + ( ($paged - 1) * $posts_per_page );
      				$args['offset'] = $paged_offset;
      			}
          }
          $args['posts_per_page'] = $posts_per_page;
        

        $wp_query = new WP_Query($args);
        if ( have_posts() ) :
            $current_page_id = $post->ID;
            ?>

            <div class="blog_posts_wrapper blog_posts_list clearfix <?php echo asalah_blog_class(); ?>">

                <?php

                get_template_part( 'content', get_post_format() );
                ?>
                <div class="ajax_content_container"></div>
            </div> <!-- .blog_posts_wrapper -->

            <?php
            $totalpages = '';
            if (asalah_cross_option('asalah_pagination_style', $id) == 'ajax') {
              $totalpages = $wp_query->max_num_pages;
            }
            asalah_pagination($current_page_id, $totalpages);

        else :
            get_template_part( 'content', 'none' );

        endif;
        ?>

    </main><!-- .main_content -->
    <?php if ($sidebar_postition != 'none' ): ?>
        <aside class="side_content widget_area <?php echo esc_attr($sidebar_class); ?>">
            <?php get_sidebar(); ?>
        </aside>
    <?php endif; ?>

<?php get_footer(); ?>