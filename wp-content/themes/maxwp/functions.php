<?php
/**
* MaxWP functions and definitions.
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

define( 'MAXWP_PROURL', 'https://themesdna.com/maxwp-pro-wordpress-theme/' );
define( 'MAXWP_CONTACTURL', 'https://themesdna.com/contact/' );
define( 'MAXWP_THEMEOPTIONSDIR', get_template_directory() . '/inc/admin' );

// Add new constant that returns true if WooCommerce is active
define( 'MAXWP_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );

require_once( MAXWP_THEMEOPTIONSDIR . '/customizer.php' );

function maxwp_get_option($option) {
    $maxwp_options = get_option('maxwp_options');
    if ((is_array($maxwp_options)) && (array_key_exists($option, $maxwp_options))) {
        return $maxwp_options[$option];
    }
    else {
        return '';
    }
}

if ( ! function_exists( 'maxwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function maxwp_setup() {
    
    global $wp_version;

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on MaxWP, use a find and replace
     * to change 'maxwp' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'maxwp', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );

    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'maxwp-large-image',  1118, 9999, false );
        add_image_size( 'maxwp-featured-image',  760, 334, true );
        add_image_size( 'maxwp-medium-image',  480, 360, true );
        add_image_size( 'maxwp-mini-image',  100, 100, true );
    }

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
    'primary' => esc_html__('Primary Menu', 'maxwp'),
    'secondary' => esc_html__('Secondary Menu', 'maxwp')
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    $markup = array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'navigation-widgets' );
    add_theme_support( 'html5', $markup );

    add_theme_support( 'custom-logo', array(
        'height'      => 90,
        'width'       => 380,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Support for Custom Header
    add_theme_support( 'custom-header', apply_filters( 'maxwp_custom_header_args', array(
    'default-image'          => '',
    'default-text-color'     => 'ffffff',
    'width'                  => 1150,
    'height'                 => 200,
    'flex-height'            => true,
        'wp-head-callback'       => 'maxwp_header_style',
        'uploads'                => true,
    ) ) );

    // Set up the WordPress core custom background feature.
    $background_args = array(
            'default-color'          => 'e6e6e6',
            'default-image'          => get_template_directory_uri() .'/assets/images/background.png',
            'default-repeat'         => 'repeat',
            'default-position-x'     => 'left',
            'default-position-y'     => 'top',
            'default-size'     => 'auto',
            'default-attachment'     => 'fixed',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => 'admin_head_callback_func',
            'admin-preview-callback' => 'admin_preview_callback_func',
    );
    add_theme_support( 'custom-background', apply_filters( 'maxwp_custom_background_args', $background_args) );
    
    // Support for Custom Editor Style
    add_editor_style( 'assets/css/editor-style.css' );

    if ( !(maxwp_get_option('enable_widgets_block_editor')) ) {
        remove_theme_support( 'widgets-block-editor' );
    }

}
endif;
add_action( 'after_setup_theme', 'maxwp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function maxwp_content_width() {
    $maxwp_content_width = 760;

    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $maxwp_content_width = 1118;
    }

    if ( is_404() ) {
        $maxwp_content_width = 1118;
    }

    $GLOBALS['content_width'] = apply_filters( 'maxwp_content_width', $maxwp_content_width ); /* phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound */
}
add_action( 'template_redirect', 'maxwp_content_width', 0 );

require_once get_template_directory() . '/inc/functions/enqueue-scripts.php';
require_once get_template_directory() . '/inc/functions/widgets-init.php';
require_once get_template_directory() . '/inc/functions/social-buttons.php';
require_once get_template_directory() . '/inc/functions/post-author-bio-box.php';
require_once get_template_directory() . '/inc/functions/postmeta.php';
require_once get_template_directory() . '/inc/functions/posts-navigation.php';
require_once get_template_directory() . '/inc/functions/menu.php';
require_once get_template_directory() . '/inc/functions/slider.php';
require_once get_template_directory() . '/inc/functions/other.php';
require_once get_template_directory() . '/inc/admin/custom.php';