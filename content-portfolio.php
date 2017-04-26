<?php
/**
 * @package mintheme
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title page-header">', '</h1>' ); ?>
	</header><!-- .entry-header -->
 
	<div class="entry-content">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail(); ?>
				<?php endif; ?>
			</div>
 
			<div class="col-md-6 col-lg-6">
				<?php the_content(); ?>
			</div>
 
		</div> <!-- .row -->
 
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mintheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
 
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'mintheme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->