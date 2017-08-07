<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blush
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php
wp_head();
add_editor_style();
?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<?php if ( is_front_page() ) : ?>
		<header class="hero">
			<?php the_custom_header_markup(); ?>

			<?php get_template_part('template-parts/site', 'branding'); ?>

		</header>
	<?php endif; ?>

		<?php get_template_part('template-parts/main', 'menu'); ?>
		<?php if ( get_header_image() ): ?>

			<div class="featured__banner ">
					<h1 class="text-align-center featured__banner__header slab"><?php echo blush_page_title(); ?></h1>
			</div>
		<?php //the_header_image_tag(); ?>
	<?php endif;  ?>

	<div class="body-wrapper">


		<div id="content" class="site-content wrapper">
