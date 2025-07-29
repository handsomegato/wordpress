<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function maxwp_widgets_init() {

register_sidebar(array(
    'id' => 'maxwp-header-banner',
    'name' => esc_html__( 'Header Banner', 'maxwp' ),
    'description' => esc_html__( 'This sidebar is located on the header of the web page.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-header-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title">',
    'after_title' => '</h2>'));

register_sidebar(array(
    'id' => 'maxwp-sidebar-one',
    'name' => esc_html__( 'Sidebar 1', 'maxwp' ),
    'description' => esc_html__( 'This sidebar is normally located on the left-hand side of web page.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-side-widget widget maxwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'maxwp-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Home Page Only)', 'maxwp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of homepage.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-main-widget widget maxwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'maxwp-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Every Page)', 'maxwp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of every page.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-main-widget widget maxwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'maxwp-home-top-widgets',
    'name' => esc_html__( 'Top Widgets (Home Page Only)', 'maxwp' ),
    'description' => esc_html__( 'This widget area is located at the top of homepage.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-main-widget widget maxwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'maxwp-top-widgets',
    'name' => esc_html__( 'Top Widgets (Every Page)', 'maxwp' ),
    'description' => esc_html__( 'This widget area is located at the top of every page.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-main-widget widget maxwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'maxwp-home-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Home Page Only)', 'maxwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of homepage.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-main-widget widget maxwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'maxwp-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Every Page)', 'maxwp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of every page.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-main-widget widget maxwp-box %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'maxwp-footer-1',
    'name' => esc_html__( 'Footer 1', 'maxwp' ),
    'description' => esc_html__( 'This sidebar is located on the left bottom of web page.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'maxwp-footer-2',
    'name' => esc_html__( 'Footer 2', 'maxwp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'maxwp-footer-3',
    'name' => esc_html__( 'Footer 3', 'maxwp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'maxwp-footer-4',
    'name' => esc_html__( 'Footer 4', 'maxwp' ),
    'description' => esc_html__( 'This sidebar is located on the right bottom of web page.', 'maxwp' ),
    'before_widget' => '<div id="%1$s" class="maxwp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="maxwp-widget-title"><span>',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'maxwp_widgets_init' );


function maxwp_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'maxwp-home-fullwidth-widgets' ) || is_active_sidebar( 'maxwp-fullwidth-widgets' ) ) : ?>
<div class="maxwp-top-wrapper-outer clearfix">
<div class="maxwp-featured-posts-area maxwp-top-wrapper clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'maxwp-home-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'maxwp-fullwidth-widgets' ); ?>
</div>
</div>
<?php endif; ?>

<?php }


function maxwp_top_widgets() { ?>

<?php if ( is_active_sidebar( 'maxwp-home-top-widgets' ) || is_active_sidebar( 'maxwp-top-widgets' ) ) : ?>
<div class="maxwp-featured-posts-area maxwp-featured-posts-area-top clearfix">
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'maxwp-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'maxwp-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function maxwp_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'maxwp-home-bottom-widgets' ) || is_active_sidebar( 'maxwp-bottom-widgets' ) ) : ?>
<div class='maxwp-featured-posts-area maxwp-featured-posts-area-bottom clearfix'>
<?php if(is_front_page() && !is_paged()) { ?>
<?php dynamic_sidebar( 'maxwp-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'maxwp-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }