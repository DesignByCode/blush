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
<?php the_header_image_tag(); ?>
<div id="page" class="site">

	<?php if ( is_front_page() ) : ?>
		<header class="hero">
			<video id="hero-video" src="<?php echo get_template_directory_uri(); ?>/video/avon.mp4" autoplay loop="1"  poster="<?php echo get_template_directory_uri(); ?>/img/avon.jpg"></video>
			<div class="wrapper">
				<div class="row">
					<div class="md-col-8 md-offset-2 text-align-center center-the-block">
						<?php the_custom_logo();  ?>
						<h1 class="hero__heading">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
						</h1>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif;
						 ?>
					</div>
				</div>
			</div>
		</header>
	<?php else: ?>
		<div class="top-menu">
			<div class="wrapper">
				<div class="row">
					<div class="sm-col-4 hide sm-show">
						<h2>Second menu</h2>
					</div>
					<div class="xs-col-4 sm-offset-4 sm-text-align-right">
						<h2>
							<a href="#"> <i class="lunacon lunacon-user"></i></a>
							<a href="#"> <i class="lunacon lunacon-user"></i></a>
							<a href="#"> <i class="lunacon lunacon-user"></i></a>
						</h2>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<nav class="nav">
		<div class="nav__wrapper">
			<div class="nav__brand">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php bloginfo('name'); ?>
				</a>
			</div>
			<div class="nav__navicon"></div>
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


	<div id="content" class="site-content wrapper">
