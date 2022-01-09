<?php
// $corposet_background_image = get_theme_support('custom-header', 'default-image');//todo

if ( has_header_image() ) {
	$corposet_background_image = get_header_image();
}else{
	$corposet_background_image='';
}
?>
    <!-- style='background-image: url(<?php //echo esc_url($corposet_bg_image); ?>);' -->
    <div class="breadcrumb" style='background: url("<?php echo esc_url( $corposet_background_image ); ?>" ) repeat scroll center 0 #4d6c91;-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;'>
  <?php
	$remove_header_image_overlay = (bool) get_theme_mod( 'remove_header_image_overlay', 0 );
	$overlay_color               = ( ! $remove_header_image_overlay ) ? get_theme_mod( 'back_header_overlay_color', 'rgba(2, 45, 98, 0.2)' ) : 'transparent';
	?>
    <div class="inner" style="background-color:<?php  echo esc_attr($overlay_color); ?>;">
                    <div class="dot-1"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/breadcrumb-2/1.png') ?>"></div>
					<div class="dot-3"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/breadcrumb-2/2.png') ?>"></div>
					<div class="dot-2"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/breadcrumb-2/3.png') ?>"></div>
					<div class="dot-4"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/breadcrumb-2/4.png') ?>"></div>
					<div class="dot-5"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/breadcrumb-2/5.png') ?>"></div>
        <div class="container">
            <div class="row align-items-end">
            <div class="col-md-12 text-center">
		<h1>
		<?php
		if ( is_home() && is_front_page() ) {
			echo esc_html__( 'Home', 'corposet' );
		} elseif ( is_home() || is_front_page() ) {
			echo esc_html( single_post_title() );
		} else {
			corposet_page_title();
		}
		?>
						</h1>
			   <?php corposet_breadcrumbs(); ?>
			</div>
            </div>
        </div>
    </div>
</div>