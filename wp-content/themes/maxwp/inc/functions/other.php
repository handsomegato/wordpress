<?php
/**
* More Custom Functions
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get custom-logo URL
function maxwp_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $maxwp_custom_logo_id = get_theme_mod( 'custom_logo' );
    $maxwp_logo = wp_get_attachment_image_src( $maxwp_custom_logo_id , 'full' );
    return $maxwp_logo[0];
}

function maxwp_read_more_text() {
       $readmoretext = esc_html__( 'Continue Reading', 'maxwp' );
        if ( maxwp_get_option('read_more_text') ) {
                $readmoretext = maxwp_get_option('read_more_text');
        }
       return $readmoretext;
}

// Category ids in post class
function maxwp_category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            $classes [] = 'wpcat-' . $category->cat_ID . '-id';
        }
        return $classes;
}
add_filter('post_class', 'maxwp_category_id_class');

// Change excerpt length
function maxwp_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    $read_more_length = 25;
    if ( maxwp_get_option('read_more_length') ) {
        $read_more_length = maxwp_get_option('read_more_length');
    }
    return $read_more_length;
}
add_filter('excerpt_length', 'maxwp_excerpt_length');

// Change excerpt more word
function maxwp_excerpt_more($more) {
       if ( is_admin() ) {
         return $more;
       }
       return '...';
}
add_filter('excerpt_more', 'maxwp_excerpt_more');

// Adds custom classes to the array of body classes.
function maxwp_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'maxwp-group-blog';
    }

    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $classes[] = 'maxwp-layout-full-width';
    }

    if ( is_404() ) {
        $classes[] = 'maxwp-layout-full-width';
    }

    return $classes;
}
add_filter( 'body_class', 'maxwp_body_classes' );


function maxwp_post_style() {
       $post_style = 'style-5';
        if ( maxwp_get_option('post_style') ) {
                $post_style = maxwp_get_option('post_style');
        }
       return $post_style;
}

if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     */
    function wp_body_open() { // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
    }
endif;