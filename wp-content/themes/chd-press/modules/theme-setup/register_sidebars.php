<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chdp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'chd-press' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'chd-press' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Post Sidebar', 'chd-press' ),
			'id'            => 'sidebar-single',
			'description'   => esc_html__( 'This is the sidebar for Post Page. Add widgets here.', 'chd-press' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar', 'chd-press' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( 'This is the sidebar for the Pages. Add widgets here.', 'chd-press' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Before Content', 'chd-press' ),
			'id'            => 'before-content',
			'description'   => esc_html__( 'This is the sidebar before Content in the Front Page. Add widgets here.', 'chd-press' ),
			'before_widget' => '<section id="%1$s" class="widget container %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'After Content', 'chd-press' ),
			'id'            => 'after-content',
			'description'   => esc_html__( 'This is the sidebar after Content in the Front Page. Add widgets here.', 'chd-press' ),
			'before_widget' => '<section id="%1$s" class="widget container %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 1', 'chd-press' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Footer Sidebar Column 1', 'chd-press' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 2', 'chd-press' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Footer Sidebar Column 2', 'chd-press' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 3', 'chd-press' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Footer Sidebar Column 3', 'chd-press' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar 4', 'chd-press' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Footer Sidebar Column 4', 'chd-press' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Widget Area', 'chd-press' ),
			'id'            => 'sidebar-header',
			'description'   => esc_html__( 'Header Sidebar for placing ad ad in the header area.', 'chd-press' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		)
	);
}
add_action( 'widgets_init', 'chdp_widgets_init' );