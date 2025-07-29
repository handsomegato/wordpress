<?php
/**
* Other options
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function maxwp_other_options($wp_customize) {

    $wp_customize->add_section( 'sc_other_options', array( 'title' => esc_html__( 'Other Options', 'maxwp' ), 'panel' => 'maxwp_main_options_panel', 'priority' => 560 ) );

    $wp_customize->add_setting( 'maxwp_options[enable_widgets_block_editor]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_enable_widgets_block_editor_control', array( 'label' => esc_html__( 'Enable Gutenberg Widget Block Editor', 'maxwp' ), 'section' => 'sc_other_options', 'settings' => 'maxwp_options[enable_widgets_block_editor]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[enable_sticky_mobile_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_enable_sticky_mobile_menu_control', array( 'label' => esc_html__( 'Enable Sticky Menu on Small Screen', 'maxwp' ), 'section' => 'sc_other_options', 'settings' => 'maxwp_options[enable_sticky_mobile_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[disable_primary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_disable_primary_menu_control', array( 'label' => esc_html__( 'Disable Primary Menu', 'maxwp' ), 'section' => 'sc_other_options', 'settings' => 'maxwp_options[disable_primary_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[disable_secondary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_disable_secondary_menu_control', array( 'label' => esc_html__( 'Disable Secondary Menu', 'maxwp' ), 'section' => 'sc_other_options', 'settings' => 'maxwp_options[disable_secondary_menu]', 'type' => 'checkbox', ) );

}