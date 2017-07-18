<?php
/**
 * Template Name: #4 - 3 Colum layout with 2 sidebars
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

	<div class="row ">

		<div class="md-col-3">
			<?php get_sidebar(); ?>
		</div>


			<div id="primary" class="content-area md-col-6">
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
				<aside class="widget-area">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae nobis quam distinctio, beatae numquam ratione facere cumque, voluptatibus molestiae, autem magnam pariatur laboriosam corporis veniam maxime eaque quos accusamus sit.
				</aside>
			</div>





	</div>


<?php get_footer(); ?>
