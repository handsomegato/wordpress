<?php
/**
* Post options
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function maxwp_post_options($wp_customize) {

    $wp_customize->add_section( 'sc_maxwp_posts', array( 'title' => esc_html__( 'Post Options', 'maxwp' ), 'panel' => 'maxwp_main_options_panel', 'priority' => 260 ) );

    $wp_customize->add_setting( 'maxwp_options[hide_posts_heading]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_posts_heading_control', array( 'label' => esc_html__( 'Hide HomePage Posts Heading', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_posts_heading]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[posts_heading]', array( 'default' => esc_html__( 'Recent Posts', 'maxwp' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'maxwp_posts_heading_control', array( 'label' => esc_html__( 'HomePage Posts Heading', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[posts_heading]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'maxwp_options[thumbnail_link]', array( 'default' => 'yes', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_thumbnail_link' ) );

    $wp_customize->add_control( 'maxwp_thumbnail_link_control', array( 'label' => esc_html__( 'Thumbnail Link', 'maxwp' ), 'description' => esc_html__('Do you want single post thumbnail to be linked to their post?', 'maxwp'), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[thumbnail_link]', 'type' => 'select', 'choices' => array( 'yes' => esc_html__('Yes', 'maxwp'), 'no' => esc_html__('No', 'maxwp') ) ) );

    $wp_customize->add_setting( 'maxwp_options[post_style]', array( 'default' => 'style-5', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_post_style' ) );

    $wp_customize->add_control( 'maxwp_post_style_control', array( 'label' => esc_html__( 'Non-Singular Posts Style', 'maxwp' ), 'description' => esc_html__('Select the post style you want for home/categories/tags/archive/search-results pages.', 'maxwp'), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[post_style]', 'type' => 'select', 'choices' => array( 'style-4' => esc_html__('Style 4', 'maxwp'), 'style-5' => esc_html__('Style 5', 'maxwp'), 'style-9' => esc_html__('Style 9', 'maxwp') ) ) );

    $wp_customize->add_setting( 'maxwp_options[read_more_length]', array( 'default' => 25, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_read_more_length' ) );

    $wp_customize->add_control( 'maxwp_read_more_length_control', array( 'label' => esc_html__( 'Auto Post Summary Length', 'maxwp' ), 'description' => esc_html__('Enter the number of words need to display in the post summary. Default is 25 words.', 'maxwp'), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[read_more_length]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[read_more_text]', array( 'default' => esc_html__( 'Continue Reading', 'maxwp' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'maxwp_read_more_text_control', array( 'label' => esc_html__( 'Read More Text', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[read_more_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_posted_date_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_posted_date_home_control', array( 'label' => esc_html__( 'Hide Posted Date from Posts Summaries', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_posted_date_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_posted_date]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_posted_date_control', array( 'label' => esc_html__( 'Hide Posted Date from Single Posts', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_posted_date]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_post_author_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_post_author_home_control', array( 'label' => esc_html__( 'Hide Post Author from Posts Summaries', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_post_author_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_post_author]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_post_author_control', array( 'label' => esc_html__( 'Hide Post Author from Single Posts', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_post_author]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_post_categories_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_post_categories_home_control', array( 'label' => esc_html__( 'Hide Post Categories from Posts Summaries', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_post_categories_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_post_categories]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_post_categories_control', array( 'label' => esc_html__( 'Hide Post Categories from Single Posts', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_post_categories]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_post_tags_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_post_tags_home_control', array( 'label' => esc_html__( 'Hide Post Tags from Posts Summaries', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_post_tags_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_post_tags]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_post_tags_control', array( 'label' => esc_html__( 'Hide Post Tags from Single Posts', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_post_tags]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_comments_link_home]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_comments_link_home_control', array( 'label' => esc_html__( 'Hide Comment Link from Posts Summaries', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_comments_link_home]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_comments_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_comments_link_control', array( 'label' => esc_html__( 'Hide Comment Link from Single Posts', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_comments_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_post_edit]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_post_edit_control', array( 'label' => esc_html__( 'Hide Post Edit Link', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_post_edit]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_thumbnail]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_thumbnail_control', array( 'label' => esc_html__( 'Hide Thumbnails from Every Page', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_thumbnail]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_thumbnail_single]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_thumbnail_single_control', array( 'label' => esc_html__( 'Hide Thumbnails from Posts/Pages', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_thumbnail_single]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_post_snippet]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_post_snippet_control', array( 'label' => esc_html__( 'Hide Post Snippet', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_post_snippet]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_read_more_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_read_more_button_control', array( 'label' => esc_html__( 'Hide Read More Button', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_read_more_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[hide_author_bio_box]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_author_bio_box_control', array( 'label' => esc_html__( 'Hide Author Bio Box', 'maxwp' ), 'section' => 'sc_maxwp_posts', 'settings' => 'maxwp_options[hide_author_bio_box]', 'type' => 'checkbox', ) );

}