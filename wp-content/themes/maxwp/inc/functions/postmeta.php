<?php
/**
* Post meta functions
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'maxwp_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function maxwp_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'maxwp' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="maxwp-tags-links"><i class="fa fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'maxwp' ) . '</span>', $tags_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'maxwp_style_9_cats' ) ) :
function maxwp_style_9_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'maxwp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="maxwp-fp09-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'maxwp' ) . '</div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'maxwp_style_9_postmeta' ) ) :
function maxwp_style_9_postmeta() { ?>
    <?php if ( !(maxwp_get_option('hide_post_author_home')) || !(maxwp_get_option('hide_posted_date_home')) || !(maxwp_get_option('hide_comments_link_home')) ) { ?>
    <div class="maxwp-fp09-post-footer">
    <?php if ( !(maxwp_get_option('hide_post_author_home')) ) { ?><span class="maxwp-fp09-post-author maxwp-fp09-post-meta"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'maxwp'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(maxwp_get_option('hide_posted_date_home')) ) { ?><span class="maxwp-fp09-post-date maxwp-fp09-post-meta"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'maxwp'); ?></span><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(maxwp_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="maxwp-fp09-post-comment maxwp-fp09-post-meta"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'maxwp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'maxwp_style_4_cats' ) ) :
function maxwp_style_4_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'maxwp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="maxwp-fp04-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'maxwp' ) . '</div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'maxwp_style_4_postmeta' ) ) :
function maxwp_style_4_postmeta() { ?>
    <?php if ( !(maxwp_get_option('hide_post_author_home')) || !(maxwp_get_option('hide_posted_date_home')) || !(maxwp_get_option('hide_comments_link_home')) ) { ?>
    <div class="maxwp-fp04-post-footer">
    <?php if ( !(maxwp_get_option('hide_post_author_home')) ) { ?><span class="maxwp-fp04-post-author maxwp-fp04-post-meta"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'maxwp'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(maxwp_get_option('hide_posted_date_home')) ) { ?><span class="maxwp-fp04-post-date maxwp-fp04-post-meta"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'maxwp'); ?></span><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(maxwp_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="maxwp-fp04-post-comment maxwp-fp04-post-meta"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'maxwp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'maxwp_style_5_cats' ) ) :
function maxwp_style_5_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'maxwp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="maxwp-fp05-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'maxwp' ) . '</div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'maxwp_style_5_postmeta' ) ) :
function maxwp_style_5_postmeta() { ?>
    <?php if ( !(maxwp_get_option('hide_post_author_home')) || !(maxwp_get_option('hide_posted_date_home')) || !(maxwp_get_option('hide_comments_link_home')) ) { ?>
    <div class="maxwp-fp05-post-footer">
    <?php if ( !(maxwp_get_option('hide_post_author_home')) ) { ?><span class="maxwp-fp05-post-author maxwp-fp05-post-meta"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'maxwp'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(maxwp_get_option('hide_posted_date_home')) ) { ?><span class="maxwp-fp05-post-date maxwp-fp05-post-meta"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'maxwp'); ?></span><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(maxwp_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="maxwp-fp05-post-comment maxwp-fp05-post-meta"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'maxwp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'maxwp_single_cats' ) ) :
function maxwp_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'maxwp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="maxwp-entry-meta-single maxwp-entry-meta-single-top"><span class="maxwp-entry-meta-single-cats"><i class="fa fa-folder-open-o" aria-hidden="true"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'maxwp' ) . '</span></div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'maxwp_single_postmeta' ) ) :
function maxwp_single_postmeta() { ?>
    <?php if ( !(maxwp_get_option('hide_post_author')) || !(maxwp_get_option('hide_posted_date')) || !(maxwp_get_option('hide_comments_link')) || !(maxwp_get_option('hide_post_edit')) ) { ?>
    <div class="maxwp-entry-meta-single">
    <?php if ( !(maxwp_get_option('hide_post_author')) ) { ?><span class="maxwp-entry-meta-single-author"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'maxwp'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(maxwp_get_option('hide_posted_date')) ) { ?><span class="maxwp-entry-meta-single-date"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'maxwp'); ?></span><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(maxwp_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="maxwp-entry-meta-single-comments"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'maxwp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(maxwp_get_option('hide_post_edit')) ) { ?><?php edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit<span class="screen-reader-text"> %s</span>', 'maxwp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ), '<span class="edit-link">&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;