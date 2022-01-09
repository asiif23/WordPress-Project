<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Corposet
 */

get_header();
get_template_part('template-parts/site','breadcrumb');
?>

	<main id="content" class="content">
      <div class="container">
        <div class="row">
		  <!--content-->
          <div class="col-md-8">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'corposet' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'corposet' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
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