<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'corposet' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'corposet' ); ?></p>	
					<?php
					get_search_form();
					?>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
		</div>
	</div>

</main><!-- #main -->
<?php
get_footer();