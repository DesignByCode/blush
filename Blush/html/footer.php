<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blush
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="wrapper">
			<div class="row">
				<div class="md-col-4">
					<?php wp_nav_menu( array(
						'theme_location' => 'footer-1',
						'menu_id' => 'footer-1-menu',
						'container' => 'ul',
						'menu_class' => 'footer__menus'
					) ); ?>
				</div>
				<div class="md-col-4">
					<?php wp_nav_menu( array(
						'theme_location' => 'footer-2',
						'menu_id' => 'footer-2-menu',
						'container' => 'ul',
						'menu_class' => 'footer__menus'
					) ); ?>
				</div>
				<div class="md-col-4">
					<?php wp_nav_menu( array(
						'theme_location' => 'footer-3',
						'menu_id' => 'footer-3-menu',
						'container' => 'ul',
						'menu_class' => 'footer__menus'
					) ); ?>
				</div>
			</div>

		</div>
	</footer><!-- #colophon -->

	<footer class="footer__copyrite">
		<div class="wrapper">
			<div class="md-col-6 md-float-right md-text-align-right">
			text
			</div>

			<div class="row">
				<div class="md-col-6 md-float-left">
						<?php echo sprintf(
							__('Designed by <a href="%1s" target="_blank">%2s</a>', 'blush'),
							'http://designbycode.co.za', 'DesignByCode'); ?>
				</div>

			</div>
		</div>
	</footer>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
