<?php
/**
* The header for MaxWP theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class('maxwp-animated maxwp-fadein'); ?> id="maxwp-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#maxwp-posts-wrapper"><?php esc_html_e( 'Skip to content', 'maxwp' ); ?></a>

<?php if ( !(maxwp_get_option('disable_secondary_menu')) ) { ?>
<div class="maxwp-container maxwp-secondary-menu-container clearfix">
<div class="maxwp-outer-wrapper">
<div class="maxwp-secondary-menu-container-inside clearfix">
<nav class="maxwp-nav-secondary" id="maxwp-secondary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Secondary Menu', 'maxwp' ); ?>">
<button class="maxwp-secondary-responsive-menu-icon" aria-controls="maxwp-menu-secondary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'maxwp' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'maxwp-menu-secondary-navigation', 'menu_class' => 'maxwp-secondary-nav-menu maxwp-menu-secondary', 'fallback_cb' => 'maxwp_top_fallback_menu', 'container' => '', ) ); ?>
</nav>
</div>
</div>
</div>
<?php } ?>

<div class="maxwp-container" id="maxwp-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="maxwp-outer-wrapper">
<div class="maxwp-head-content clearfix" id="maxwp-head-content">

<?php if ( get_header_image() ) : ?>
<div class="maxwp-header-image clearfix">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="maxwp-header-img-link">
    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="maxwp-header-img"/>
</a>
</div>
<?php endif; ?>

<?php if ( !(maxwp_get_option('hide_header_content')) ) { ?>
<div class="maxwp-header-inside clearfix">
<div id="maxwp-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="maxwp-logo-img-link">
        <img src="<?php echo esc_url( maxwp_custom_logo() ); ?>" alt="" class="maxwp-logo-img"/>
    </a>
    </div>
<?php else: ?>
    <div class="site-branding">
      <h1 class="maxwp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="maxwp-site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
<?php endif; ?>
</div><!--/#maxwp-logo -->

<div id="maxwp-header-banner">
<?php dynamic_sidebar( 'maxwp-header-banner' ); ?>
</div><!--/#maxwp-header-banner -->

</div>
<?php } ?>

</div><!--/#maxwp-head-content -->
</div>
</div><!--/#maxwp-header -->


<?php if ( !(maxwp_get_option('disable_primary_menu')) ) { ?>
<div class="maxwp-container maxwp-primary-menu-container clearfix">
<div class="maxwp-outer-wrapper">
<div class="maxwp-primary-menu-container-inside clearfix">
<nav class="maxwp-nav-primary" id="maxwp-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'maxwp' ); ?>">
<button class="maxwp-primary-responsive-menu-icon" aria-controls="maxwp-menu-primary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'maxwp' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'maxwp-menu-primary-navigation', 'menu_class' => 'maxwp-primary-nav-menu maxwp-menu-primary', 'fallback_cb' => 'maxwp_fallback_menu', 'container' => '', ) ); ?>
<?php if ( !(maxwp_get_option('hide_header_social_buttons')) ) { maxwp_header_social_buttons(); } ?>
</nav>
</div>
</div>
</div>
<?php } ?>

<div id="maxwp-search-overlay-wrap" class="maxwp-search-overlay">
  <button class="maxwp-search-closebtn" aria-label="<?php esc_attr_e( 'Close Search', 'maxwp' ); ?>" title="<?php esc_attr_e('Close Search','maxwp'); ?>">&#xD7;</button>
  <div class="maxwp-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
</div>

<?php if(is_front_page() && !is_paged()) { ?>
<?php if ( maxwp_get_option('enable_slider') ) { maxwp_slider(); } ?>
<?php } ?>

<div class="maxwp-outer-wrapper">
<?php maxwp_top_wide_widgets(); ?>
</div>

<div class="maxwp-outer-wrapper">

<div class="maxwp-container clearfix" id="maxwp-wrapper">
<div class="maxwp-content-wrapper clearfix" id="maxwp-content-wrapper">