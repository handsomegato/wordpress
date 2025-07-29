<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="maxwp-main-wrapper clearfix" id="maxwp-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="maxwp-main-wrapper-inside clearfix">

<?php maxwp_top_widgets(); ?>

<div class="maxwp-posts-wrapper" id="maxwp-posts-wrapper">

<div class="maxwp-posts maxwp-box">

<?php if ( !(maxwp_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( maxwp_get_option('posts_heading') ) : ?>
<h1 class="maxwp-posts-heading"><span><?php echo esc_html( maxwp_get_option('posts_heading') ); ?></span></h1>
<?php else : ?>
<h1 class="maxwp-posts-heading"><span><?php esc_html_e( 'Recent Posts', 'maxwp' ); ?></span></h1>
<?php endif; ?>
<?php } ?>
<?php } ?>

<div class="maxwp-posts-content">

<?php if (have_posts()) : ?>

    <div class="maxwp-posts-container">
    <?php $maxwp_total_posts = $wp_query->post_count; ?>
    <?php $maxwp_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', maxwp_post_style() ); ?>

    <?php $maxwp_post_counter++; endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php maxwp_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>
</div>

</div><!--/#maxwp-posts-wrapper -->

<?php maxwp_bottom_widgets(); ?>

</div>
</div>
</div><!-- /#maxwp-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>