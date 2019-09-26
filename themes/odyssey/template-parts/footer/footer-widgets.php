<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php
if ( is_active_sidebar( 'sidebar-2' ) ||
	 is_active_sidebar( 'sidebar-3' ) ) :
?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'twentyseventeen' ); ?>">
		<div class="p-container">
			<?php
			if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				<div class="cols-1">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			<?php }
			if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
				<div class="cols-2">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			<?php }
			if ( is_active_sidebar( 'footer_contact_no' ) ) { ?>
				<div class="clear"></div>
				<div class="footer-contact-info">
					<?php dynamic_sidebar( 'footer_contact_no' ); ?>
				</div>
			<?php }?>
		</div>
		</aside><!-- .widget-area -->

<?php endif; ?>
