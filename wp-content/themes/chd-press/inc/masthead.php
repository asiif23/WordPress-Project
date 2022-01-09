<?php

/**
 *	Search Form
 */
if ( !function_exists('chdp_get_search') ) {
	function chdp_get_search( $class ) {

		get_template_part('modules/header/search', '', $class);

	}
}
 add_action('chdp_search', 'chdp_get_search', 10, 1);


/**
 *	Function to add Mobile Navigation
 */
if ( !function_exists('chdp_navigation') ) {

	function chdp_navigation() {

		require get_template_directory() . '/modules/header/navigation.php';

	}
}
add_action('chdp_get_navigation', 'chdp_navigation');


 /**
  *	Function for adding Site Branding via action
  */
function chdp_branding() {

	require get_template_directory() . '/modules/header/branding.php';

 }
 add_action('chdp_get_branding', 'chdp_branding');

 /**
  *	Get Social Icons
  */
if ( !function_exists('chdp_get_social') ) {

	function chdp_get_social() {

		if ( !empty( get_theme_mod( 'chdp_social_enable', '' ) ) ) :
			get_template_part('modules/header/social');
		endif;

	}
}
add_action('chdp_top_bar_area', 'chdp_get_social', 5);

/**
 *	Get Quick Links Menu
 */
if ( !function_exists('chdp_quicklinks_menu') ) {
	function chdp_quicklinks_menu() {

			get_template_part( 'modules/header/quick-links' );

	 }
}
add_action('chdp_top_bar_area', 'chdp_quicklinks_menu', 10);


/**
 *	Control the Masthead of the theme
 */
if ( !function_exists('chdp_get_masthead') ) {

	function chdp_get_masthead() {

		switch ( get_theme_mod('chdp_header_style', 'style_1') ) {

		case 'style_1' : ?>

	    <header id="masthead" class="site-header style-1">

		    <?php if ( !empty( get_theme_mod( 'chdp_top_bar_enable', '') ) ) : ?>
		    <div id="chdp-top-bar">
			    <div class="container">
				    <div class="row align-items-center">
				    	<?php do_action('chdp_top_bar_area'); ?>
				    </div>
			    </div>
		    </div>
		    <?php endif; ?>

	        <div id="header-image">
		        <div class="site-branding">
					<?php do_action('chdp_get_branding'); ?>
	        	</div>
	        </div>

			<div class="nav-wrapper">
				 <div class="container">
					 <div class="d-flex align-items-center">

						<div id="site-navigation" class="main-navigation col-lg-11" role="navigation">
							<?php get_template_part('modules/header/navigation'); ?>
						</div>

						<button href="#menu" class="menu-link col-auto mobile-nav-btn"><i class="fa fa-bars" aria-hidden="true"></i></button>


						<div class="search-wrapper-main ml-auto col-auto">
							<button type="button" id="go-to-field" tabindex="-1"></button>
				    		<button class="search-btn-main"><i class="fa fa-search"></i></button>
					    	<?php do_action('chdp_search', 'main'); ?>
						</div>

					</div>
				</div>
			</div>

		</header><!-- #masthead -->
		<?php
		break;

		case 'style_2' : ?>

	    <header id="masthead" class="site-header style-2">

		    <?php if ( !empty( get_theme_mod( 'chdp_top_bar_enable', '') ) ) : ?>
		    <div id="chdp-top-bar">
			    <div class="container">
				    <div class="d-flex align-items-center">
				    	<?php do_action('chdp_top_bar_area'); ?>
				    </div>
			    </div>
		    </div>
		    <?php endif; ?>

		    <div class="header-area container">
			    <div id="logo-ad-area" class="row no-gutters">

				    <div class="site-branding col-md-4">
						<?php do_action('chdp_get_branding'); ?>
			    	</div>

			    	<div class="header-widget-area ml-auto col-md-8">
					    <?php
						    if ( is_active_sidebar( 'sidebar-header' ) ) { ?>

								<aside id="header-widget-wrapper" class="widget-area">
									<?php dynamic_sidebar( 'sidebar-header' ); ?>
								</aside><!-- #secondary -->

						<?php } ?>
			    	</div>
		    	</div>
	    	</div>

			<div class="nav-wrapper">
				 <div class="container">
					 <div class="d-flex align-items-center">
						 <div id="site-navigation" class="main-navigation col-auto" role="navigation">
						 	<?php get_template_part('modules/header/navigation'); ?>
						 </div>

						<button href="#menu" class="menu-link col-auto mobile-nav-btn"><i class="fa fa-bars" aria-hidden="true"></i></button>

						<div class="search-wrapper-main ml-auto col-auto">
							<button type="button" id="go-to-field" tabindex="-1"></button>
					    	<button class="search-btn-main"><i class="fa fa-search"></i></button>
					    	<?php do_action('chdp_search', 'main'); ?>
					 	</div>

					</div>
				</div>
			</div>

		</header><!-- #masthead -->
		<?php
		break;

		case 'style_3': ?>
			<header id="masthead" class="site-header style-3">


				<?php if ( !empty( get_theme_mod( 'chdp_top_bar_enable', '') ) ) : ?>
			    <div id="chdp-top-bar">
				    <div class="container">
					    <div class="d-flex align-items-center">
					    	<?php do_action('chdp_top_bar_area'); ?>
					    </div>
				    </div>
			    </div>
			    <?php endif; ?>

				<div class="header-area container">
				<div class="row align-items-center no-gutters">
				<div class="site-branding col-5 col-md-3">
					<?php do_action('chdp_get_branding'); ?>
				</div>
				<div class="col-auto col-md-8 ml-auto">
					<div id="site-navigation" class="main-navigation col-auto" role="navigation">
	   					<?php get_template_part('modules/header/navigation'); ?>
	   				 </div>

   					<button href="#menu" class="menu-link col-auto mobile-nav-btn"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>

				<div class="search-wrapper-main col-auto">
					<button type="button" id="go-to-field" tabindex="-1"></button>
					<button class="search-btn-main col-auto"><i class="fa fa-search"></i></button>
					<?php do_action('chdp_search', 'main'); ?>
				</div>
				</div>
				</div>

			</header>
		<?php
		break;

		default: ?>
		<header id="masthead" class="site-header style-def">

	        <div id="header-image">
		        <div class="site-branding">
					<?php do_action('chdp_get_branding'); ?>
		    	</div>
	        </div>

			<div class="nav-wrapper">
				 <div class="container">
					 <div class="row justify-content-end align-items-center no-gutters">
						<?php get_template_part('modules/header/navigation'); ?>

						<button id="mobile-nav-btn" class="menu-link mobile-nav-btn"><i class="fa fa-bars" aria-hidden="true"></i></button>

						<button type="button" id="go-to-field" tabindex="-1"></button>
				    	<button class="search-btn-main"><i class="fa fa-search"></i></button>
				    	 <?php do_action('chdp_search', 'main'); ?>

					</div>
				</div>
			</div>

		</header><!-- #masthead -->
	<?php
		}
	}
}
add_action('chdp_masthead', 'chdp_get_masthead', 10);
