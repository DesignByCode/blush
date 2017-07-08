<?php
/**
 * Template Name: #1 - 2 Column layout sidebar on left
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

	<div class="row flex flex-reverse">

			<div id="primary" class="content-area content-area-right md-col-9 ">
				<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
				<?php the_posts_pagination();  ?>
			</div><!-- #primary -->

			<div class="md-col-3">
				<?php get_sidebar(); ?>
			</div>


	</div>


<?php get_footer(); ?>
