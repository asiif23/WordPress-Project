<?php 
/**
 * Template Name: Portfolio
 */
get_header();
get_template_part( 'template-parts/site', 'breadcrumb' );
?>
<!--==================== ti-CONTACT SECTION ====================-->
<main class="content">
	<div class="container">
		<?php
		the_post();
		the_content();
		do_action( 'corposet_portfolio_template', false );
		?>

	   
</main>
<?php
get_footer();