<?php
/**
* Author bio box
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function maxwp_add_author_bio_box() {
    $content='';
    if (is_single()) {
        $content .= '
            <div class="maxwp-author-bio">
            <div class="maxwp-author-bio-top">
            <div class="maxwp-author-bio-gravatar">
                '. get_avatar( get_the_author_meta('email') , 80 ) .'
            </div>
            <div class="maxwp-author-bio-text">
                <h4>'.esc_html__( 'Author: ', 'maxwp' ).'<span>'. get_the_author_link() .'</span></h4>'. get_the_author_meta('description',get_query_var('author') ) .'
            </div>
            </div>
            </div>
        ';
    }
    return $content;
}