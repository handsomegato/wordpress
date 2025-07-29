<?php
/**
* The template for displaying archive pages.
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

<header class="page-header">
<div class="page-header-inside">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</div>
</header>

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