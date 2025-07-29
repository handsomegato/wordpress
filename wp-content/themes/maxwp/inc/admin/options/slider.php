<?php
/**
* Slider options
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function maxwp_slider_options($wp_customize) {

    $wp_customize->add_section( 'sc_slider', array( 'title' => esc_html__( 'Slider', 'maxwp' ), 'panel' => 'maxwp_main_options_panel', 'priority' => 250 ) );

    $wp_customize->add_setting( 'maxwp_options[enable_slider]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_enable_slider_control', array( 'label' => esc_html__( 'Enable Slider', 'maxwp' ), 'section' => 'sc_slider', 'settings' => 'maxwp_options[enable_slider]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[slider_length]', array( 'default' => 5, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_positive_integer' ) );

    $wp_customize->add_control( 'maxwp_slider_length_control', array( 'label' => esc_html__( 'Number of Slider Posts', 'maxwp' ), 'description' => esc_html__('Enter the number of posts you need to display in the slider area. Default is 5 posts.', 'maxwp'), 'section' => 'sc_slider', 'settings' => 'maxwp_options[slider_length]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[slider_post_type]', array( 'default' => 'recent-posts', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_slider_type' ) );

    $wp_customize->add_control( 'maxwp_slider_post_type_control', array( 'label' => esc_html__( 'Slider Posts Type', 'maxwp' ), 'description' => esc_html__('Select a post type to display in slider.', 'maxwp'), 'section' => 'sc_slider', 'settings' => 'maxwp_options[slider_post_type]', 'type' => 'select', 'choices' => array( 'recent-posts' => esc_html__('Recent Posts', 'maxwp'), 'category-posts' => esc_html__('Category Posts', 'maxwp') ) ) );

    $wp_customize->add_setting( 'maxwp_options[slider_cat]', array( 'default' => 0, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ) );

    $wp_customize->add_control( new MaxWP_Customize_Category_Control( $wp_customize, 'maxwp_slider_cat_control', array( 'label' => esc_html__( 'Slider Posts Category', 'maxwp' ), 'section' => 'sc_slider', 'settings' => 'maxwp_options[slider_cat]', 'description' => esc_html__( 'Select a category if Posts Type option is Category Posts', 'maxwp' ) ) ) );

}