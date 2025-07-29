<?php
/**
* Getting started options
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function maxwp_getting_started($wp_customize) {

    $wp_customize->add_section( 'sc_maxwp_getting_started', array( 'title' => esc_html__( 'Getting Started', 'maxwp' ), 'description' => esc_html__( 'Thanks for your interest in MaxWP! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'maxwp' ), 'panel' => 'maxwp_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'maxwp_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new MaxWP_Customize_Button_Control( $wp_customize, 'maxwp_documentation_control', array( 'label' => esc_html__( 'Documentation', 'maxwp' ), 'section' => 'sc_maxwp_getting_started', 'settings' => 'maxwp_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/maxwp-wordpress-theme/', 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'maxwp_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new MaxWP_Customize_Button_Control( $wp_customize, 'maxwp_contact_control', array( 'label' => esc_html__( 'Contact Us', 'maxwp' ), 'section' => 'sc_maxwp_getting_started', 'settings' => 'maxwp_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/contact/', 'button_target' => '_blank', ) ) );

}