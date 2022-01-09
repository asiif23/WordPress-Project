<?php
/**
 E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package
 */
get_header();
get_template_part('template-parts/site','breadcrumb');
?>
   <main id="content" class="content">
      <div class="container">
        <div class="row">
		  <!--content-->
          <div class="col-md-8">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'corposet' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', '' );

			endwhile;

			// Post Pagination links.
					the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>'
					) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
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