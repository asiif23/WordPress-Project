<?php /**
 * Handles front end setup.
 *
 * @package Corposet
 */

/**
 * Class Corposet_Public
 */
class Corposet_Public {
    function set_tag_cloud_sizes($args) {
        $links = explode('</a>', $args);
    
        // add classes
        foreach($links as $key => $link) {
          if(strpos($link, 'style="font-size: 8pt;"')) $link = preg_replace('/(class\w?=\w?".*?)"/', '$1 small"', $link);
          if(strpos($link, 'style="font-size: 22pt;"')) $link = preg_replace('/(class\w?=\w?".*?)"/', '$1 large"', $link);
          $links[$key] = $link;
        }
        $result = implode('</a>', $links);
    
        // remove inline styling
        $patterns = '/style=".*?"/';
        $replacements = '';
        $result = preg_replace($patterns, $replacements, $result);
    
        return $result;
    }

    function extend_tag_cloud($tag_data) {
        return array_map (
            function ( $item )
            {
                $item['class'] .= ' corposet-widget-tags';
                return $item;
            },
            (array) $tag_data
        );
      }



    /**
     * Setup the theme.
     *
     * @since Corposet 1.0
     */
    public function setup_theme() {
        // Maximum allowed width for any content in the theme, like oEmbeds and images added to posts.  https://codex.wordpress.org/Content_Width

        $GLOBALS['content_width'] = apply_filters('corposet_content_width', 640);

        $logo_settings = [
            'height' => 55,
            'width' => 150,
            'flex-height' => true,
            'flex-width' => true,
        ];

        $custom_background_settings = [
            'default-color' => apply_filters('corposet_default_background_color', 'E5E5E5'),
        ];

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('custom-logo', $logo_settings);
        add_theme_support('html5', ['search-form']);
        add_theme_support('custom-background', $custom_background_settings);
        add_theme_support('header-footer-elementor');

        // woocommerce support

        add_theme_support('woocommerce');

        // Woocommerce Gallery Support
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('align-wide');
        add_theme_support('responsive-embeds');

        load_theme_textdomain('corposet', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus([
            'primary' => __('Primary Menu', 'corposet'),
        ]);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
                'html5',
                [
                    'search-form',
                    'comment-form',
                    'comment-list',
                    'gallery',
                    'caption',
                    'style',
                    'script',
                ]
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
                'custom-background',
                apply_filters(
                        'corposet_custom_background_args',
                        [
                            'default-color' => 'ffffff',
                            'default-image' => '',
                        ]
                )
        );

        add_editor_style();
    }
}

if( !function_exists('corposet_scripts_function'))
{
	function corposet_scripts_function(){
		
		// css
        wp_enqueue_style('corposet-skin', CORPOSET_ASSETS . 'css/skin/default.css');
		wp_enqueue_style('bootstrap', CORPOSET_ASSETS . '/css/bootstrap.css');
		wp_enqueue_style('corposet-style', get_stylesheet_uri() );
        wp_enqueue_style('font-awesome', CORPOSET_ASSETS . 'css/font-awesome.css');
        wp_enqueue_style('corposet-menus', CORPOSET_ASSETS . 'css/menu.css');
        wp_enqueue_style('smartmenus', CORPOSET_ASSETS . 'css/bootstrap-smartmenus.css');
        wp_enqueue_style('corposet-style-base', CORPOSET_ASSETS . 'css/style-base.css');
        wp_enqueue_style('corposet-owl-carousel', CORPOSET_ASSETS . 'css/owl.carousel.css');

        //Script
        wp_enqueue_script( 'jquery' );
		wp_enqueue_script('bootstrap', CORPOSET_ASSETS . '/js/bootstrap.min.js');
        wp_enqueue_script('smartmenus-js', CORPOSET_ASSETS . 'js/jquery.smartmenus.js');
        wp_enqueue_script('smartmenus-bootstrap', CORPOSET_ASSETS . '/js/jquery.smartmenus.bootstrap.js');
        wp_enqueue_script('corposet-owl-carousel', CORPOSET_ASSETS . '/js/owl.carousel.min.js');
        wp_enqueue_script('corposet-main', CORPOSET_ASSETS . 'js/main.js');
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action('wp_enqueue_scripts','corposet_scripts_function');

//Enqueue For Admin css and js
function corposet_admin_enqueue_scripts() {
    wp_enqueue_style('corposet-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
    wp_enqueue_script('corposet-admin-script', get_template_directory_uri() . '/assets/js/corposet-admin-script.js', ['jquery'], '', true);
    wp_localize_script('corposet-admin-script', 'corposet_ajax_object',
            ['ajax_url' => admin_url('admin-ajax.php')]
    );
}

add_action('admin_enqueue_scripts', 'corposet_admin_enqueue_scripts');

function corposet_menu() {
    ?>
    <script>
        jQuery('a,input').bind('focus', function () {
            if (!jQuery(this).closest(".menu-item").length && (jQuery(window).width() <= 992)) {
                jQuery('.navbar-collapse').removeClass('show');
            }
        })
    </script>
    <?php

}

add_action('wp_footer', 'corposet_menu');