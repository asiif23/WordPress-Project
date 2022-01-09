<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package
 */
get_header();
get_template_part('template-parts/site', 'breadcrumb');
?>

<main id="content" class="content">
    <div class="container">
        <div class="row">
            <!--content-->
            <div class="col-md-8">
                <?php
                if (have_posts()) :



                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_type());

                    endwhile;

                else :

                    get_template_part('template-parts/content', 'none');

                endif;

                //Previous / next page navigation
                the_posts_pagination( array(
                    'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
                    'next_text'          => '<i class="fa fa-angle-double-right"></i>',
                ) ); ?>
            </div>
            <!--/content-->
            <!--sidebar-->
            <?php get_sidebar(); ?>
            <!--/sidebar-->
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();