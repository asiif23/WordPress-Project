<?php

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function corposet_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('wp_head', 'corposet_pingback_header');

/**
 * Get the_content with limited characters
 */
if (!function_exists('corposet_getContent')) {

    function corposet_getContent() {
        $theContent = apply_filters('the_content', get_the_content());
        $theContentStripTags = wp_strip_all_tags($theContent);
        return wp_trim_words($theContentStripTags, get_theme_mod('corposet_characters_length', 35));
    }

}

/**
 * Get the_excerpt with limited characters
 */
if (!function_exists('corposet_getExcerpt')) {

    function corposet_getExcerpt() {
        $theExcerpt = apply_filters('the_excerpt', get_the_excerpt());
        $theExcerptStripTags = wp_strip_all_tags($theExcerpt);
        return wp_trim_words($theExcerptStripTags, get_theme_mod('corposet_characters_length', 35));
    }

}


if (!function_exists('corposet_ExcerptOrContent')) {

    function corposet_ExcerptOrContent() {
        if (get_theme_mod('corposet_excerpt_or_content', 'excerpt') == 'excerpt') {

            if (get_theme_mod('corposet_characters_option_length', 'custom') == 'custom') {
                if (has_excerpt()) {
                    echo esc_html(corposet_getExcerpt());
                } else {
                    echo esc_html(corposet_getContent());
                }
                ?>
                <div class="news-blog-excerpt"><a href="<?php the_permalink(); ?>" class="more btn btn-default"><span>
                            <?php echo esc_html(get_theme_mod('corposet_readmore_button_txt', __('Learn More', 'corposet'))); ?></span></a></div>
                <?php
            } elseif (get_theme_mod('corposet_characters_option_length', 'custom') == 'default') {
                the_excerpt();
            }
        } else {
            if (get_theme_mod('corposet_characters_option_length', 'custom') == 'custom') {
                echo esc_html(corposet_getContent());
                ?>
                <div class="news-blog-excerpt"><a href="<?php the_permalink(); ?>" class="more btn btn-default"><span>
                            <?php echo esc_html(get_theme_mod('corposet_readmore_button_txt', __('Learn More', 'corposet'))); ?></span></a></div>
                <?php
            } elseif (get_theme_mod('corposet_characters_option_length', 'custom') == 'default') {
                the_content(__('Learn More', 'corposet'));
            }
        }
    }

}
 if (! function_exists('corposet_curPageURL')) {
     function corposet_curPageURL()
     {
         $corposet_page_url = 'http';
         if (key_exists("HTTPS", $_SERVER) && ($_SERVER["HTTPS"] == "on")) {
             $corposet_page_url .= "s";
         }
         $corposet_page_url .= "://";
         if ($_SERVER["SERVER_PORT"] != "80") {
             $corposet_page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
         } else {
             $corposet_page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
         }
         return $corposet_page_url;
     }
 }

if (!function_exists('corposet_breadcrumbs')) {

    function corposet_breadcrumbs() {

        global $post;
		$corposet_home = home_url('/');
    

        $allowed_html = array(
            'br'     => array(),
            'em'     => array(),
            'strong' => array(),
            'i'      => array(
                'class' => array(),
            ),
            'span'   => array(),
        );
        echo '<ul class="d-flex justify-content-center">';
         if (class_exists('WooCommerce')){
         if (is_home() || is_front_page()) :
            echo '<li class="breadcrumb-item"><a href="'.esc_url($corposet_home).'">'.esc_html__('Home','corposet').'</a></li>';
            echo '<li class="breadcrumb-item active"><a href="'.esc_url($corposet_home).'">'.esc_html(get_bloginfo( 'name' )).'</a></li>';
        elseif(class_exists('is_woocommerce')):
        woocommerce_breadcrumb();
         else:
            echo '<li class="breadcrumb-item"><a href="'.esc_url($corposet_home).'">'.esc_html__('Home','corposet').'</a></li>';
            // Blog Category
            if ( is_category() ) {
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(corposet_curPageURL()) .'">' . esc_html__('Archive by category','corposet').' "' . single_cat_title('', false) . '"</a></li>';

            // Blog Day
            } elseif ( is_day() ) {
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(get_year_link(get_the_time( __( 'Y', 'corposet' ) ))) . '">'. esc_html(get_the_time( __( 'Y', 'corposet' ) )) .'</a>';
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(get_month_link( get_the_time( __( 'Y', 'corposet' ) ), get_the_time( __( 'm', 'corposet' ) )) ) .'">'. esc_html(get_the_time( __( 'F', 'corposet' ) ) ) .'</a>';
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(corposet_curPageURL()) .'">'. esc_html(get_the_time( __( 'd', 'corposet' ) )) .'</a></li>';

            // Blog Month
            } elseif ( is_month() ) {
                echo '<li class="breadcrumb-item active"><a href="' . esc_url(get_year_link(get_the_time( __( 'Y', 'corposet' ) ))) . '">' . esc_html(get_the_time( __( 'Y', 'corposet' ) )) . '</a>';
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(corposet_curPageURL()) .'">'. esc_html(get_the_time( __( 'F', 'corposet' ) )) .'</a></li>';

            // Blog Year
            } elseif ( is_year() ) {
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(corposet_curPageURL()) .'">'. esc_html(get_the_time( __( 'Y', 'corposet' ) )) .'</a></li>';

            // Single Post
            } elseif ( is_single() && !is_attachment() && is_page('single-product') ) {
                // Custom post type
                if ( get_post_type() != 'post' ) {
                    $corposet_cat = get_the_category();
                    $corposet_cat = $corposet_cat[0];
                    echo '<li class="breadcrumb-item">';
                        echo get_category_parents($corposet_cat, TRUE, '');
                    echo '</li>';
                    echo '<li class="breadcrumb-item active"><a href="' .esc_url(corposet_curPageURL()) . '">'. esc_html(get_the_title()) .'</a></li>';
                } }
                elseif ( is_page() && $post->post_parent ) {
                $post_array = get_post_ancestors($post);

                    /**
                     * Sorts in descending order
                     */
                    krsort($post_array);

                    /**
                     * Iterate for each post Id
                     */
                    foreach($post_array as $key=>$postid){
                        /**
                         * @return object
                         */
                        $post_ids = get_post($postid);
                        /**
                         * @return string title
                         */
                        $title = $post_ids->post_title;
                        
                        echo '<li class="breadcrumb-item active"><a href="' . esc_url(get_permalink($post_ids)) . '">' . esc_html($title) . '</a></li>';
                    }
                    echo '<li class="breadcrumb-item active"><a href="'.esc_url(get_permalink()).'" >'.esc_html(get_the_title()).'</a></li>';


            }
            elseif( is_search() )
            {
                echo '<li class="breadcrumb-item active"><a href="' . esc_url(corposet_curPageURL()) . '">'. get_search_query() .'</a></li>';
            }
            elseif( is_404() )
            {
                echo '<li class="breadcrumb-item active"><a href="' . esc_url(corposet_curPageURL()) . '">'.esc_html__('Error 404','corposet').'</a></li>';
            }
            else {
                // Default
                echo '<li class="breadcrumb-item active"><a href="' . esc_url(corposet_curPageURL()) . '">'. esc_html(get_the_title(), $allowed_html ) .'</a></li>';
            }
        endif;
    }
    else{

        if (is_home() || is_front_page()) :
            echo '<li class="breadcrumb-item"><a href="'.esc_url($corposet_home).'">'.esc_html__('Home','corposet').'</a></li>';
            echo '<li class="breadcrumb-item active"><a href="'.esc_url($corposet_home).'">'.esc_html(get_bloginfo( 'name' )).'</a></li>';
         else:
            echo '<li class="breadcrumb-item"><a href="'.esc_url($corposet_home).'">'.esc_html__('Home','corposet').'</a></li>';
            // Blog Category
            if ( is_category() ) {
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(corposet_curPageURL()) .'">' . esc_html__('Archive by category','corposet').' "' . single_cat_title('', false) . '"</a></li>';

            // Blog Day
            } elseif ( is_day() ) {
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(get_year_link(get_the_time( __( 'Y', 'corposet' ) ))) . '">'. esc_html(get_the_time( __( 'Y', 'corposet' ) )) .'</a>';
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(get_month_link( get_the_time( __( 'Y', 'corposet' ) ), get_the_time( __( 'm', 'corposet' ) )) ) .'">'. esc_html(get_the_time( __( 'F', 'corposet' ) ) ) .'</a>';
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(corposet_curPageURL()) .'">'. esc_html(get_the_time( __( 'd', 'corposet' ) )) .'</a></li>';

            // Blog Month
            } elseif ( is_month() ) {
                echo '<li class="breadcrumb-item active"><a href="' . esc_url(get_year_link(get_the_time( __( 'Y', 'corposet' ) ))) . '">' . esc_html(get_the_time( __( 'Y', 'corposet' ) )) . '</a>';
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(corposet_curPageURL()) .'">'. esc_html(get_the_time( __( 'F', 'corposet' ) )) .'</a></li>';

            // Blog Year
            } elseif ( is_year() ) {
                echo '<li class="breadcrumb-item active"><a href="'. esc_url(corposet_curPageURL()) .'">'. esc_html(get_the_time( __( 'Y', 'corposet' ) )) .'</a></li>';

            // Single Post
            } elseif ( is_single() && !is_attachment() && is_page('single-product') ) {
                // Custom post type
                if ( get_post_type() != 'post' ) {
                    $corposet_cat = get_the_category();
                    $corposet_cat = $corposet_cat[0];
                    echo '<li class="breadcrumb-item">';
                        echo get_category_parents($corposet_cat, TRUE, '');
                    echo '</li class="breadcrumb-item">';
                    echo '<li class="breadcrumb-item active"><a href="' .esc_url(corposet_curPageURL()) . '">'. esc_html(get_the_title()) .'</a></li>';
                } }
                elseif ( is_page() && $post->post_parent ) {
                $post_array = get_post_ancestors($post);

                    /**
                     * Sorts in descending order
                     */
                    krsort($post_array);

                    /**
                     * Iterate for each post Id
                     */
                    foreach($post_array as $key=>$postid){
                        /**
                         * @return object
                         */
                        $post_ids = get_post($postid);
                        /**
                         * @return string title
                         */
                        $title = $post_ids->post_title;
                        /* permalink */
                        echo '<li class="breadcrumb-item active"><a href="' . esc_url(get_permalink($post_ids)) . '">' . esc_html($title) . '</a></li>';
                    }
                    echo '<li class="breadcrumb-item active"><a href="'.esc_url(get_permalink()).'" >'.esc_html(get_the_title()).'</a></li>';


            }
            elseif( is_search() )
            {
                echo '<li class="breadcrumb-item active"><a href="' . esc_url(corposet_curPageURL()) . '">'. get_search_query() .'</a></li>';
            }
            elseif( is_404() )
            {
                echo '<li class="breadcrumb-item active"><a href="' . esc_url(corposet_curPageURL()) . '">'.esc_html__('Error 404','corposet').'</a></li>';
            }
            else {
                // Default
                echo '<li class="breadcrumb-item active"><a href="' . esc_url(corposet_curPageURL()) . '">'. esc_html(get_the_title(), $allowed_html ) .'</a></li>';
            }
        endif;
    }
    echo '</ul>';


    }
    

}

if (!function_exists('corposet_page_title')) {

    function corposet_page_title() {
        if (is_archive()) {
            $corposet_archive = get_theme_mod('corposet_archive_prefix', esc_html__('Archive:', 'corposet'));

            if (is_day()) :

                printf(esc_html__('%1$s %2$s', 'corposet'), esc_html($corposet_archive), esc_html(get_the_date()));

            elseif (is_month()) :

                printf(esc_html__('%1$s %2$s', 'corposet'), esc_html($corposet_archive), esc_html(get_the_date()));

            elseif (is_year()) :

                printf(esc_html__('%1$s %2$s', 'corposet'), esc_html($corposet_archive), esc_html(get_the_date()));

            elseif (is_category()):

                $corposet_category = get_theme_mod('corposet_category_prefix', esc_html__('Category:', 'corposet'));

                printf(esc_html__('%1$s %2$s', 'corposet'), esc_html($corposet_category), single_cat_title('', false));

            elseif (is_tag()):

                $corposet_tag_text = get_theme_mod('corposet_tag_prefix', esc_html__('Tag:', 'corposet'));

                printf(esc_html__('%1$s %2$s', 'corposet'), esc_html($corposet_tag_text), single_tag_title('', false));

            elseif (is_author()):

                $corposet_author = get_theme_mod('corposet_author_prefix', esc_html__('All posts by:', 'corposet'));

                printf(esc_html__('%1$s %2$s', 'corposet'), esc_html($corposet_author), esc_html(get_the_author()));

            elseif (class_exists('WooCommerce') && class_exists('is_shop')):

                $corposet_shop = get_theme_mod('corposet_shop_prefix', esc_html__('Shop', 'corposet'));

                printf(esc_html__('%1$s %2$s', 'corposet'), esc_html($corposet_shop), single_tag_title('', false));

            elseif (is_archive()):
                the_archive_title('<h1>', '</h1>');

            endif;
        } elseif (is_search()) {
            $corposet_search = get_theme_mod('search_prefix', __('Search results for:', 'corposet'));

            printf(esc_html__('%1$s %2$s', 'corposet'), esc_html($corposet_search), get_search_query());
        } elseif (is_404()) {
            $corposet_404 = get_theme_mod('404_prefix', __('404: Page not found', 'corposet'));
            printf(esc_html__('%1$s %2$s', 'corposet'), esc_html($corposet_404), '');
        } else {
            the_title();
        }
    }

}


