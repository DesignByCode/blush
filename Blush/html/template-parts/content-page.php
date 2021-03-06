<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blush
 */

?>




<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(has_post_thumbnail()): ?>
	<figure class="responsive__figure banner-image">
		<?php the_post_thumbnail(); ?>
	</figure>
<?php endif; ?>

		<?php if ( !get_header_image() || true ): ?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title text--primary">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blush' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<br>
		<footer class="entry-footer">

				<?php edit_post_link($link = ''); ?>

		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
