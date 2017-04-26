<?php
/**
 * Template Name: Front Page
 *
 */
 
get_header(); ?>
 
<div class="container">
	<div class="row">
 
	<div id="slider" class="col-md-12 col-lg-12">
		<main id="main-slider" class="site-main slider" role="main">
 
			<?php if(is_front_page()) {?>
<?php query_posts('showposts=5&post_type=slider'); ?>

	 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators 
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol> -->
      <div class="carousel-inner" role="listbox">

      	<?php 
      	$i=0;
      	if ( have_posts() ) : while ( have_posts() ) : the_post(); $i++; ?>

		    <?php if ($i==1) { ?>
		        <div class="item active">
	        <?php } else { ?>
	        	<div class="item">
	        <?php } ?>
	        	<?php if ( has_post_thumbnail() ) {
	        		$url = wp_get_attachment_url( get_post_thumbnail_id() );
	        	?>
	        	<img class="first-slide" src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
	          	<?php } ?>
          <div class="container">
            <div class="carousel-caption">
              <!-- <h1><?php the_title(); ?></h1> -->
              
            </div>
          </div>
        </div>
       <?php endwhile; endif;?>
       
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
    </div><!-- end of carousel -->

    <?php } wp_reset_query(); ?>

    <!-- Featured content below slider -->
    <?php get_template_part( 'featured-box' ); ?>

    <?php get_template_part( 'frontpage.portfolio' ); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  	<?php the_content(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>
 
			
		</main><!-- #main -->
	</div><!-- #primary -->
 
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>