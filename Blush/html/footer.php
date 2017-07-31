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
			<div class="row">
			<?php if ( get_theme_mod('blush_ssl_image_setting') ): ?>
			<div class="md-col-6 md-float-right md-text-align-right">
				<a target="_blank" href="<?php echo get_theme_mod('blush_ssl_image_link_setting') ?>">
					<img class="site-footer__ssl" src="<?php echo get_theme_mod('blush_ssl_image_setting') ?>" alt="SSL ">
				</a>
			</div>

			<?php endif; ?>

				<div class="md-col-6 md-float-left">
						<?php echo sprintf(
							__('Designed by <a href="%1s" target="_blank">%2s</a>', 'blush'),
							'http://designbycode.co.za', 'DesignByCode'); ?>
				</div>

			</div>
		</div>
	</footer>

	<div class="scrollup">
	<div class="wrapper"><a href="#" class="scrollup__button"></a></div>
</div>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
