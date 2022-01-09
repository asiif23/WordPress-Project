<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corposet
 */
get_header();
get_template_part('template-parts/site', 'breadcrumb');
?>

<main id="content" class="content">
    <div class="container">
        <div class="row">
            <!--content-->
            <?php
            if (class_exists('WooCommerce')) {
                if (is_account_page() || is_cart() || is_checkout()) {
                    echo '<div class="col-md-' . (!is_active_sidebar("woocommerce") ? "12" : "8" ) . ' col-sm-' . (!is_active_sidebar("woocommerce") ? "12" : "7" ) . ' col-xs-12">';
                } else {
                    echo '<div class="col-md-' . (!is_active_sidebar("sidebar-1") ? "12" : "8" ) . ' col-sm-' . (!is_active_sidebar("sidebar-1") ? "12" : "7" ) . ' col-xs-12">';
                }
            } else {
                echo '<div class="col-md-' . (!is_active_sidebar("sidebar-1") ? "12" : "8" ) . ' col-sm-' . (!is_active_sidebar("sidebar-1") ? "12" : "7" ) . 'col-xs-12">';
            }

            if (class_exists('WooCommerce')) {
                if (is_account_page() || is_cart() || is_checkout()) {
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'page');
                        comments_template('', true); // todo
                    endwhile;
                } else {
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'page');
                        comments_template('', true);

                    endwhile;
                }
            } else {
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'page');
                    comments_template('', true);
                endwhile;
            }
            echo '</div>';

            #========sidebar=======#
            if (class_exists('WooCommerce')) {

                if (is_account_page() || is_cart() || is_checkout()) {
                    get_sidebar('woocommerce');
                } else {

                    get_sidebar();
                }
            } else {

                get_sidebar();
            }
            ?>
        </div>
    </div>
</main>
<!-- #main -->

<?php
get_footer();