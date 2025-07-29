<?php
/**
* Enqueue scripts and styles
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function maxwp_scripts() {
    wp_enqueue_style('maxwp-maincss', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
    wp_enqueue_style('maxwp-webfont', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i|Domine:400,700|Oswald:400,700|Patua+One&amp;display=swap', array(), NULL);
    wp_enqueue_script('fitvids', get_template_directory_uri() .'/assets/js/jquery.fitvids.min.js', array( 'jquery' ), NULL, true);

    $maxwp_primary_menu_active = FALSE;
    if ( !maxwp_get_option('disable_primary_menu') ) {
        $maxwp_primary_menu_active = TRUE;
    }
    $maxwp_secondary_menu_active = FALSE;
    if ( !maxwp_get_option('disable_secondary_menu') ) {
        $maxwp_secondary_menu_active = TRUE;
    }

    $maxwp_sticky_menu = TRUE;
    $maxwp_sticky_mobile_menu = TRUE;
    if ( !maxwp_get_option('enable_sticky_mobile_menu') ) {
        $maxwp_sticky_mobile_menu = FALSE;
    }

    $maxwp_sticky_sidebar = TRUE;
    if ( is_page_template() ) {
        if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
           $maxwp_sticky_sidebar = FALSE;
        }
    }
    if ( is_404() ) {
        $maxwp_sticky_sidebar = FALSE;
    }
    if ( $maxwp_sticky_sidebar ) {
        wp_enqueue_script('ResizeSensor', get_template_directory_uri() .'/assets/js/ResizeSensor.min.js', array( 'jquery' ), NULL, true);
        wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.min.js', array( 'jquery' ), NULL, true);
    }

    $maxwp_slider = FALSE;
    if ( maxwp_get_option('enable_slider') ) {
        $maxwp_slider = TRUE;
    }
    if ( $maxwp_slider ) {
    if(is_front_page() && !is_paged()) {
        wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), NULL );
        wp_enqueue_script('owl-carousel', get_template_directory_uri() .'/assets/js/owl.carousel.min.js', array( 'jquery', 'imagesloaded' ), NULL, true);
    }
    }

    wp_enqueue_script('maxwp-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), NULL, true );
    wp_enqueue_script('maxwp-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), NULL, true );
    wp_enqueue_script('maxwp-customjs', get_template_directory_uri() .'/assets/js/custom.js', array( 'jquery' ), NULL, true);
    wp_localize_script( 'maxwp-customjs', 'maxwp_ajax_object',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'primary_menu_active' => $maxwp_primary_menu_active,
            'secondary_menu_active' => $maxwp_secondary_menu_active,
            'sticky_menu' => $maxwp_sticky_menu,
            'sticky_menu_mobile' => $maxwp_sticky_mobile_menu,
            'sticky_sidebar' => $maxwp_sticky_sidebar,
            'slider' => $maxwp_slider,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'maxwp_scripts' );

/**
 * Enqueue customizer styles.
 */
function maxwp_enqueue_customizer_styles() {
    wp_enqueue_style( 'maxwp-customizer-styles', get_template_directory_uri() . '/inc/admin/css/customizer-style.css', array(), NULL );
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), NULL );
}
add_action( 'customize_controls_enqueue_scripts', 'maxwp_enqueue_customizer_styles' );