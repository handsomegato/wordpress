<?php
/**
* The file for displaying the search form
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<form role="search" method="get" class="maxwp-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label>
    <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'maxwp' ); ?></span>
    <input type="search" class="maxwp-search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'maxwp' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</label>
<input type="submit" class="maxwp-search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'maxwp' ); ?>" />
</form>