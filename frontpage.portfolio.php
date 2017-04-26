<?php
/**
 * Template Name: Recent Portfolio
 *
 */
 
get_header(); ?>

 
	<div id="primary" class="col-md-12 col-lg-12">
		<main id="main" class="site-main homepage-portfolio" role="main">
 
			
 			
 			<?php 
			// the query
			$the_query = new WP_Query( array('post_type' => 'featured', 'posts_per_page' => 4, 'order' => 'ASC' ) ); ?>
 
			<?php if ( $the_query->have_posts() ) : ?>
 
				<div class="row">
					<div id="homepage-portfolio-items">
 
					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
 
					  <?php
		                $terms = get_the_terms( $post->ID, 'portfolio_tags' );
		                                     
		                if ( $terms && ! is_wp_error( $terms ) ) : 
		                    $links = array();
		 
		                    foreach ( $terms as $term ) 
		                    {
		                        $links[] = $term->name;
		                    }
		                    $links = str_replace(' ', '-', $links); 
		                    $tax = join( " ", $links );     
		                else :  
		                    $tax = '';  
		                endif;
		                ?>
 
					<div class="col-sm-6 col-md-<?php echo $pcount; ?> item <?php echo strtolower($tax); ?>">
						<div class="homepage-portfolio-item">
							<a class="thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
							</a>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							
						</div>
					</div>
					<?php endwhile; ?>
					<!-- end of the loop -->
 
				</div> <!-- #portfolio-items -->
 
				</div> <!-- .row -->
				
 
				<?php wp_reset_postdata(); ?>
 
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
 
			
		</main><!-- #main -->
	</div><!-- #primary -->
 