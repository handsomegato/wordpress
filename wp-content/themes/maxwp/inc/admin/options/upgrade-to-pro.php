<?php
/**
* Upgrade to pro options
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license licennse URI, for example : http://www.gnu.org/licenses/gpl-2.0.html
* @author ThemesDNA <themesdna@gmail.com>
*/

function maxwp_upgrade_to_pro($wp_customize) {

    $wp_customize->add_section( 'sc_maxwp_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro Version', 'maxwp' ), 'priority' => 400 ) );
    
    $wp_customize->add_setting( 'maxwp_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );
    
    $wp_customize->add_control( new MaxWP_Customize_Static_Text_Control( $wp_customize, 'maxwp_upgrade_text_control', array(
        'label'       => esc_html__( 'MaxWP Pro', 'maxwp' ),
        'section'     => 'sc_maxwp_upgrade',
        'settings' => 'maxwp_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy MaxWP? Upgrade to MaxWP Pro now and get:', 'maxwp' ).
            '<ul class="maxwp-customizer-pro-features">' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Color Options', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Font Options', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Layout Options (separate options for singular and non-singular pages)', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '10+ Custom Page/Post Templates', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '10 Different Posts Styles', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '17 Different Featured Posts Widgets(each widget displays recent/popular/random posts or posts from a given category or tag.)', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Slider with More Options(this widget displays recent/popular/random posts or posts from a given category or tag.)', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'News Ticker', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Tabbed Widget', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Social Profiles Widget and About Me Widget', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '2 Header Layouts (full-width header or header+728x90 ad)', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Post Share Buttons', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Related Posts with Thumbnails', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Author Bio Box with Social Buttons', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Sticky Menu/Sticky Sidebars with enable/disable capability', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Built-in Contact Form', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'WooCommerce Support', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Search Engine Optimized', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Customizer options', 'maxwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Features...', 'maxwp' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.MAXWP_PROURL.'" class="button button-primary" target="_blank"><i class="fa fa-shopping-cart"></i> ' . esc_html__( 'Upgrade To MaxWP PRO', 'maxwp' ) . '</a></strong>'
    ) ) ); 

}