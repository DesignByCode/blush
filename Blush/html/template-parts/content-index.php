<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blush
 */

?>




<article id="post-<?php the_ID(); ?>" <?php post_class('blog_list'); ?>>
	<?php if(has_post_thumbnail()): ?>
		<a href="<?php the_permalink(); ?>" class="blog_list_images">
			<?php the_post_thumbnail('banner-image'); ?>
		</a>
<?php endif; ?>

	<div class="blog_list_content">

		<header class="entry-header">
			<h1 class="entry-title ">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h1>
			<h6>Authored by Claude Myburgh</h6>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php //the_content(); ?>
			<?php the_excerpt(); ?>
			<div class="clearfix"></div>
			<a href="<?php the_permalink(); ?> " class="btn btn--primary">Read More</a>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blush' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>	<!-- blog list content -->

	<?php if ( get_edit_post_link() ) : ?>
		<br>
		<footer class="entry-footer">

				<?php edit_post_link($link = ''); ?>

		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
