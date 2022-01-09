<?php
/**
 * The header file of the theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corposet
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<div id="page" class="wrapper">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'corposet' ); ?></a>
			<!--header-->
			<header class="trasparent">

				<!--topbar-->
				<?php do_action( 'corposet_header_layouts' ); ?>

				<!--/topbar-->

				<!-- nav-->
				<div class="nav-wapper">

		 <nav class="navbar navbar-expand-lg">
			 <div class="container">
				 <?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					}
					
                                    /*
                                     * @todo: header text
                                     */
                                    if (display_header_text() == true) :
                                        ?>
                                        <div class="site-branding-text">
                                            <h1 class="site-title"> <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                            <p class="site-description"><?php bloginfo('description'); ?></p>
                                </div>
                                    <?php endif; 
					?>
				 <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					 <span class="navbar-toggler-icon"></span>
				 </button>

				 <?php
							wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'container'       => 'div',
									'container_class' => 'collapse navbar-collapse',
									'container_id'    => 'navbarCollapse',
									'menu_class'      => 'navbar-nav nav m-auto',
									'fallback_cb'     => 'corposet_nav_walker::fallback',
									'walker'          => new corposet_nav_walker(),
								)
							);
							


					$hire_us_btn_enable_disable = get_theme_mod('hire_us_btn_enable_disable', 1);
					$hire_btn_text = get_theme_mod('hire_btn_text'); 
					$hire_btn_link = get_theme_mod('hire_btn_link');
					if($hire_btn_text) {
					?>
					<div class="right-aria d-none d-lg-block">
						 
						 <?php if($hire_us_btn_enable_disable == 1){
						?>
						<a target=_blank href="<?php echo esc_url($hire_btn_link); ?>" class="btn btn-default quote_btn">
							<?php echo esc_html($hire_btn_text); ?>
						</a>
						<?php } ?>
					 </div>
					<?php } ?>
	  </div> 
			 </div>
		 </nav>
	 </div>
			</header>
