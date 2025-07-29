<?php
/**
* Header options
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function maxwp_header_options($wp_customize) {

    // Header
    $wp_customize->add_section( 'sc_maxwp_header', array( 'title' => esc_html__( 'Header Options', 'maxwp' ), 'panel' => 'maxwp_main_options_panel', 'priority' => 240 ) );

    $wp_customize->add_setting( 'maxwp_options[hide_header_content]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_header_content_control', array( 'label' => esc_html__( 'Hide Header Content', 'maxwp' ), 'section' => 'sc_maxwp_header', 'settings' => 'maxwp_options[hide_header_content]', 'type' => 'checkbox', ) );

}