<?php
/**
* Slider
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'maxwp_slider' ) ) :

function maxwp_slider() { ?>
<div class="maxwp-posts-carousel-wrapper">
<div class="maxwp-outer-wrapper">

    <?php
    $slider_length = 5;
    if ( maxwp_get_option('slider_length') ) {
        $slider_length = maxwp_get_option('slider_length');
    }

    $slider_post_type = 'recent-posts';
    if ( maxwp_get_option('slider_post_type') ) {
        $slider_post_type = maxwp_get_option('slider_post_type');
    }

    $slider_cat = maxwp_get_option('slider_cat');

    if(($slider_post_type === 'category-posts') && $slider_cat) {
        $slider_query = new WP_Query("orderby=date&posts_per_page=".$slider_length."&nopaging=0&post_status=publish&ignore_sticky_posts=1&post_type=post&cat=$slider_cat");
    } else {
        $slider_query = new WP_Query("orderby=date&posts_per_page=".$slider_length."&nopaging=0&post_status=publish&ignore_sticky_posts=1&post_type=post");
    }

    if ($slider_query->have_posts()) : ?>

    <div class="maxwp-posts-carousel">
    <div class="maxwp-box">
    <div class="maxwp-box-inside">
    <div class="owl-carousel">
    <?php while ($slider_query->have_posts()) : $slider_query->the_post();  ?>
    <div class="maxwp-slide-item">
        <?php if(has_post_thumbnail()) { ?>
            <?php the_post_thumbnail('maxwp-medium-image', array('class' => 'maxwp-fp07-post-thumbnail-img', 'title' => get_the_title())); ?>
        <?php } else { ?>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-4-3.jpg' ); ?>" class="maxwp-fp07-post-thumbnail-img"/>
        <?php } ?>
        <div class="text-over">
            <?php
            if ( 'post' == get_post_type() ) {
                /* translators: used between list items, there is a space */
                $categories_list = get_the_category_list( ' ' );
                if ( $categories_list ) {
                    /* translators: 1: list of categories. */
                    printf( '<div class="maxwp-carousel-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'maxwp' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
            }
            ?>
            <h4 class="maxwp-carousel-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'maxwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h4>
            <div class="maxwp-carousel-post-footer">
            <span class="maxwp-carousel-post-author maxwp-carousel-post-meta"><i class="fa fa-user-circle-o"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'maxwp'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span>
            <span class="maxwp-carousel-post-date maxwp-carousel-post-meta"><i class="fa fa-clock-o"></i>&nbsp;<span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'maxwp'); ?></span><?php echo get_the_date('Y-m-d'); ?></span>
            <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?><span class="maxwp-carousel-post-comment maxwp-carousel-post-meta"><i class="fa fa-comments-o"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( '0 Comments<span class="screen-reader-text"> on %s</span>', 'maxwp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span><?php } ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    </div>
    </div>
    </div>
    </div>

    <?php wp_reset_postdata();  // Restore global post data stomped by the_post().
    endif; ?>

</div>
</div>
<?php }

endif;