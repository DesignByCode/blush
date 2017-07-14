<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blush
 */

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}
?>

<aside id="sidebar-right" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-right' ); ?>
</aside><!-- #secondary -->
