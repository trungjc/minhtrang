<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php the_excerpt () ?>
		<?php if ( has_post_thumbnail() ) { ?>
											<div class="feature-image">
												<?php $product_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ) ;

												?>
												<img src="<?php echo whispli_resize_image($product_thumbnail_src[0]); ?>" alt="">
											</div>
											<?php } else {?>
											<div class="feature-image">
												<img src="<?php echo get_template_directory_uri()?>/assets/img/blog_placeholder.png" alt="">
												
											</div>
											<?php } ?>

	<?php if ( 'post' === get_post_type() ) : ?>

		<footer class="entry-footer">
		
		</footer><!-- .entry-footer -->

	<?php else : ?>

		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<footer class="entry-footer"><span class="edit-link">',
				'</span></footer><!-- .entry-footer -->'
			);
		?>

	<?php endif; ?>
</article><!-- #post-## -->

