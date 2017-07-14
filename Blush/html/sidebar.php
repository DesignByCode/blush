<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blush
 */

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
}
?>

<aside id="sidebar-left" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-left' ); ?>
</aside><!-- #secondary -->
