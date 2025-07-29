<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package MaxWP WordPress Theme
* @copyright Copyright (C) 2025 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div>

</div><!--/#maxwp-content-wrapper -->
</div><!--/#maxwp-wrapper -->


<?php if ( !(maxwp_get_option('hide_footer_widgets')) ) { ?>
<?php if ( is_active_sidebar( 'maxwp-footer-1' ) || is_active_sidebar( 'maxwp-footer-2' ) || is_active_sidebar( 'maxwp-footer-3' ) || is_active_sidebar( 'maxwp-footer-4' ) ) : ?>
<div class="maxwp-outer-wrapper">
<div class='clearfix' id='maxwp-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='maxwp-container clearfix'>

<div class='maxwp-footer-block-1'>
<?php dynamic_sidebar( 'maxwp-footer-1' ); ?>
</div>

<div class='maxwp-footer-block-2'>
<?php dynamic_sidebar( 'maxwp-footer-2' ); ?>
</div>

<div class='maxwp-footer-block-3'>
<?php dynamic_sidebar( 'maxwp-footer-3' ); ?>
</div>

<div class='maxwp-footer-block-4'>
<?php dynamic_sidebar( 'maxwp-footer-4' ); ?>
</div>

</div>
</div><!--/#maxwp-footer-blocks-->
</div>
<?php endif; ?>
<?php } ?>


<div class="maxwp-outer-wrapper">
<div class='clearfix' id='maxwp-footer'>
<div class='maxwp-foot-wrap maxwp-container'>

<?php if ( maxwp_get_option('footer_text') ) : ?>
  <p class='maxwp-copyright'><?php echo wp_kses_post( force_balance_tags( maxwp_get_option('footer_text') ) ); ?></p>
<?php else : ?>
  <p class='maxwp-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'maxwp' ), esc_html(date_i18n(__('Y','maxwp'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='maxwp-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'maxwp' ), 'ThemesDNA.com' ); ?></a></p>

</div>
</div><!--/#maxwp-footer -->
</div>

<button class="maxwp-scroll-top" title="<?php esc_attr_e('Scroll to Top','maxwp'); ?>"><span class="fa fa-arrow-up" aria-hidden="true"></span><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'maxwp'); ?></span></button>

<?php wp_footer(); ?>
</body>
</html>