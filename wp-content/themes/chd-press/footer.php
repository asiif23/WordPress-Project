<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CHD Press
 */

?>
</div><!-- #content-wrapper -->

<?php do_action('chdp_after_content'); ?>

<?php do_action('chdp_footer'); ?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-info">
				<?php printf(esc_html__('Theme Designed by %s', 'chd-press'), '<a href="https://chandigarhtimes.net">ChandigarhTimes.net</a>'); ?>
				<span class="sep"> | </span>
					<?php echo ( esc_html( get_theme_mod('chdp_footer_text') ) == '' ) ? ('Copyright &copy; '.date_i18n( esc_html__( 'Y', 'chd-press' ) ).' ' . esc_html( get_bloginfo('name') ) . esc_html__('. All Rights Reserved.','chd-press')) : esc_html(get_theme_mod('chdp_footer_text')); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<nav id="menu" class="panel" role="navigation">
	<div class="menu-overlay"></div>
	<div id="panel-top-bar">
		<button class="go-to-bottom"></button>
		<button id="close-menu" class="menu-link"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
	</div>

	<?php wp_nav_menu( apply_filters( 'mobile_nav_args', array( 'menu_id'        => 'menu-main',
							  'container'		=> 'ul',
	                          'theme_location' => 'menu-1',
	                          'walker'         => has_nav_menu('menu-1') ? new chdp_Mobile_Menu : '',
	                     ) ) ); ?>

	<button class="go-to-top"></button>
</nav>

<div id="sticky-navigation">
	<div class="nav-wrapper">
		 <div class="container">

			 <div class="row align-items-center no-gutters">

				<div class="site-branding col-5 col-md-3">
 					<?php do_action('chdp_get_branding'); ?>
 				</div>

				<div class="main-navigation col-lg-8" role="navigation">
					<?php get_template_part('modules/header/navigation'); ?>
				</div>

				<button href="#menu" class="menu-link mobile-nav-btn ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></button>

				<div class="search-wrapper-sticky">
					<button type="button" id="go-to-field" tabindex="-1"></button>
					<button class="search-btn-sticky col-auto"><i class="fa fa-search"></i></button>
					<?php do_action('chdp_search', 'sticky'); ?>
				</div>

			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
