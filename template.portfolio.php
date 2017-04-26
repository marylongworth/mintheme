<?php
/**
 * Template Name: Portfolio
 *
 */
 
get_header(); ?>
 
<div class="container">
	<div class="row">
 
	<div id="primary" class="col-md-12 col-lg-12">
		<main id="main" class="site-main portfolio" role="main">
 
			<?php
				if (mint_option('filter_switch') == '1') {
 
				    $terms = get_terms("portfolio_tags");
				    $count = count($terms);
				    $filter_btn_size = mint_option('filter_size');
				    $filter_btn_color = mint_option('filter_color');
				    echo '<div id="filters" class="btn-group btn-group-'.$filter_btn_size.'">';
				    echo '<button type="button" class="btn btn-'.$filter_btn_color.'" data-filter="*">'. __('All', 'mintheme') .'</button>';
				        if ( $count > 0 )
				        {   
				            foreach ( $terms as $term ) {
				                $termname = strtolower($term->name);
				                $termname = str_replace(' ', '-', $termname);
				                echo '<button type="button" class="btn btn-'.$filter_btn_color.'" data-filter=".'.$termname.'">'.$term->name.'</button>';
				            }
				        }
				    echo "</div>";
				}
			?>
 			
 			<?php 
			// Portfolio columns variable from Theme Options
			$pcount = mint_option('portfolio_column', '3'); ?>

			<?php 
			// the query
			$the_query = new WP_Query( array('post_type' => 'portfolio') ); ?>
 
			<?php if ( $the_query->have_posts() ) : ?>
 
				<div class="row">
					<div id="portfolio-items">
 
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
 
					<div class="col-sm-6 col-md-<?php echo $pcount; ?> grid-item <?php echo strtolower($tax); ?>">
						<div class="portfolio-item">
							<a class="thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
							</a>
							<div class="overlay"><br />
    <span><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4></span>
</div>
							
							<!--<a href="<?php the_permalink(); ?>" class="btn btn-default">View Project</a>-->
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
 
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>