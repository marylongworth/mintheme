<?php
/**
 *
 * Template Name: Sidebar Right
 *
 * The template for displaying the left sidebar page.
 *
 * @package mintheme
 */

get_header(); ?>

<div class="container">
	<div class="row">

		<div id="primary" class="col-md-9 col-lg-9">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('right');
get_footer();
