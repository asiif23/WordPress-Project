<?php 
/**
 * Template Name: About Us
 */
get_header();
get_template_part( 'template-parts/site', 'breadcrumb' );
?>
<!--==================== ti-CONTACT SECTION ====================-->
<main class="content">
	<div class="container">
		<?php
		// the_post();
		the_content();
		
		if( class_exists('PL_Theme_Corposet_Layout')){
			$about_testimonial=new PL_Theme_Corposet_Layout;
			$about_testimonial->Testimonial();
		}
		?>

	   
</main>
<?php
get_footer();