<?php
/**
 * Template Name: Contact Us
 */
get_header();
get_template_part( 'template-parts/site', 'breadcrumb' );
?>
<!--==================== ti-CONTACT SECTION ====================-->
<main class="content">
	<div class="container">
		<?php
		do_action('corposet_contact_us');
		?>
</main>
<?php
get_footer();
