<?php
/**
* Template part for displaying single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('maxwp-post-singular maxwp-box'); ?>>

    <header class="entry-header">
        <?php if ( !(maxwp_get_option('hide_post_categories')) ) { ?><?php maxwp_single_cats(); ?><?php } ?>

        <?php the_title( sprintf( '<h1 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

        <?php maxwp_single_postmeta(); ?>
    </header><!-- .entry-header -->

    <div class="entry-content clearfix">
            <?php
            if ( has_post_thumbnail() ) {
                if ( !(maxwp_get_option('hide_thumbnail')) ) {
                    if ( !(maxwp_get_option('hide_thumbnail_single')) ) {
                        if ( maxwp_get_option('thumbnail_link') == 'no' ) {
                            the_post_thumbnail('maxwp-featured-image', array('class' => 'maxwp-post-thumbnail-single'));
                        } else { ?>
                            <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'maxwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('maxwp-featured-image', array('class' => 'maxwp-post-thumbnail-single')); ?></a>
                <?php   }
                    }
                }
            }

            the_content( sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span> <span class="meta-nav">&rarr;</span>', 'maxwp' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );

            wp_link_pages( array(
             'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'maxwp' ) . '</span>',
             'after'       => '</div>',
             'link_before' => '<span>',
             'link_after'  => '</span>',
             ) );
             ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php if ( !(maxwp_get_option('hide_post_tags')) ) { ?><?php maxwp_post_tags(); ?><?php } ?>
    </footer><!-- .entry-footer -->

    <?php if ( !(maxwp_get_option('hide_author_bio_box')) ) { echo wp_kses_post( force_balance_tags( maxwp_add_author_bio_box() ) ); } ?>

</article>