<?php
/**
* Social profiles options
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function maxwp_social_profiles($wp_customize) {

    $wp_customize->add_section( 'sc_maxwp_sociallinks', array( 'title' => esc_html__( 'Social Links', 'maxwp' ), 'panel' => 'maxwp_main_options_panel', 'priority' => 400, ));

    $wp_customize->add_setting( 'maxwp_options[hide_header_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'maxwp_hide_header_social_buttons_control', array( 'label' => esc_html__( 'Hide Header Social Buttons', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[hide_header_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'maxwp_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'maxwp_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'maxwp_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_vklink_control', array( 'label' => esc_html__( 'VK Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_githublink_control', array( 'label' => esc_html__( 'Github URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_redditlink_control', array( 'label' => esc_html__( 'Reddit Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_behancelink_control', array( 'label' => esc_html__( 'Behance Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_codepenlink_control', array( 'label' => esc_html__( 'Codepen Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_bsalink_control', array( 'label' => esc_html__( 'BuySellAds Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare Link', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'maxwp_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'maxwp_sanitize_email' ) );

    $wp_customize->add_control( 'maxwp_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'maxwp_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'maxwp_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'maxwp' ), 'section' => 'sc_maxwp_sociallinks', 'settings' => 'maxwp_options[rsslink]', 'type' => 'text' ) );

}