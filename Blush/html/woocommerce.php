<?php
/**
 *
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blush
 */

get_header(); ?>



	<div class="row flex">
			<div id="primary" class="content-area content-area-left md-col-8 lg-col-9">
				<main id="main" class="site-main">
<?php blush_row_start(); ?>
<?php woocommerce_content(); ?>
	<?php blush_row_end(); ?>
				</main><!-- #main -->
				<?php the_posts_pagination();  ?>
			</div><!-- #primary -->

			<div class="md-col-4 lg-col-3">
				<?php get_sidebar('shop'); ?>
			</div>

	</div>

<?php get_footer(); ?>
