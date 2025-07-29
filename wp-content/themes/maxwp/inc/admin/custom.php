<?php
/**
* Customizer Options
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Header styles
if ( ! function_exists( 'maxwp_header_style' ) ) :
function maxwp_header_style() {
    $header_text_color = get_header_textcolor();
    if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) { return; }
    ?>
    <style type="text/css">
    <?php if ( ! display_header_text() ) : ?>
        .maxwp-site-title, .maxwp-site-description {position:absolute !important;word-wrap:normal !important;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(1px,1px,1px,1px);-webkit-clip-path:inset(50%);clip-path:inset(50%);white-space:nowrap;border:0;}
    <?php else : ?>
        .maxwp-site-title, .maxwp-site-title a, .maxwp-site-description {color: #<?php echo esc_attr( $header_text_color ); ?>;}
    <?php endif; ?>
    </style>
    <?php
}
endif;