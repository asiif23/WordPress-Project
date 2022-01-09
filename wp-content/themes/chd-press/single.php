<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CHD Press
 */

get_header();
?>

	<main id="primary" class="site-main container <?php echo esc_attr(chdp_sidebar_align('single')[0]); ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part('template-parts/content', 'single');

			if ( get_theme_mod('chdp_single_navigation_enable') !== "" ) :

				the_post_navigation(
					apply_filters( 'chdp_single_post_navigation_args', array(
						'prev_text' => __('%title', 'chd-press'),
						'next_text' => __('%title', 'chd-press'),
					) ) );
			endif;

			if ( get_theme_mod('chdp_single_related_enable', 1) !== "" ) :
				do_action('chdp_related_posts');
			endif;

			if (get_theme_mod('chdp_single_author_enable', 1) !== "") :
				chdp_about_author( $post );
			endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
do_action('chdp_sidebar', 'single');
get_footer();
