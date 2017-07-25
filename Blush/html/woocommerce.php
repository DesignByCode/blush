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

	<?php if ( !is_product() ): ?>
	<div class="filter__widget">
		<div class="filter__widget__trigger">
			<i class="lunacon lunacon-chevron-right"></i>
		</div>
		<div class="filter__widget__inner slimscroll">
			<?php get_sidebar('shop'); ?>
		</div>
	</div>
<?php endif; ?>



	<div class="row">
		<div class="search-bar">
			<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/'));?>">
			<input type="search" id="s" class="form__item form__item--lg" placeholder="<?php esc_attr_e('Search Product', 'blush'); ?>" value="<?php the_search_query(); ?>" name="s">
			<input type="hidden" value="product" name="post_type">
			<button type="submit"><i class="lunacon  lunacon-search"></i></button>
		</form>
		</div>
			<div id="primary" class="content-area after-search">
				<main id="main" class="site-main">
					<?php woocommerce_content(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
	</div>
<?php get_footer(); ?>
