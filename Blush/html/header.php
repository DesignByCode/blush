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

<?php wp_head();
add_editor_style();
?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<?php if ( is_front_page() ) : ?>
		<header class="hero">
			<?php the_custom_header_markup(); ?>

			<div class="wrapper">
				<div class="row">
					<div class="md-col-6 md-offset-3 text-align-center center-the-block">
						<?php the_custom_logo();  ?>
						<h1 class="hero__heading site-title">
							<a  href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
						</h1>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description "><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif;
						 ?>
					</div>
				</div>
			</div>


		</header>

	<?php endif; ?>

	<nav id="main-menu" class="nav nav--shadow">
		<div class="nav__wrapper">
			<div class="nav__brand">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php bloginfo('name'); ?>
				</a>
			</div>
			<div class="nav__navicon"></div>
			<div class="nav__links__wrapper nav__links--right ">
				<ul class="nav__links hide md-show">

					<li class="nav__links__item"><a href="#" title="cart"><i class="lunacon lunacon-basket-solid"></i></a></li>
					<li class="nav__links__item"><a href="#"><i class="lunacon lunacon-cart-solid"></i></a></li>
					<li class="nav__links__item"><a href="#"><i class="lunacon lunacon-user-solid"></i></a></li>
				</ul>
			</div>
			<div class="nav__links__wrapper nav__links--right">
				<?php $walker = new LunaWalkerMenu; ?>
				<?php wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id' => 'primary-menu',
					'container' => '',
					'menu_class' => 'nav__links',
					'walker' => $walker
				) ); ?>
			</div>
		</div>
	</nav>

		<?php if ( get_header_image() ): ?>


		<div class="featured__banner ">
				<h1 class="text-align-center featured__banner__header slab"><?php echo blush_page_title(); ?></h1>

		</div>


		<?php //the_header_image_tag(); ?>
	<?php endif;  ?>


	<div id="content" class="site-content wrapper">
