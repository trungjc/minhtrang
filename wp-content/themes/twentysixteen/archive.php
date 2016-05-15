<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php $post = get_post(); 
$type= $post->post_type;
if($type=="product") { 

	include( 'archive-product.php' );
}
else {
	
?>
<div class="bg1">
	<div id="primary" class="content-area container">
		<div class="row">
			<?php get_sidebar(); ?>
			<main id="main" class="site-main grid_9" role="main">

			<?php if ( have_posts() ) : ?>

		
				<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	
	
		<?php if ( has_post_thumbnail() ) { ?>
											<div class="feature-image">
												<?php $product_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ) ;

												?>
												<img src="<?php echo whispli_resize_image($product_thumbnail_src[0]); ?>" alt="">
											</div>
											<?php } else {?>
											<div class="feature-image">
												<img src="<?php echo get_template_directory_uri()?>/assets/images/blog_placeholder.png" alt="">
												
											</div>
											<?php } ?>
											 <?php the_excerpt () ?>

</article><!-- #post-## -->
<?php
				// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'twentysixteen' ),
					'next_text'          => __( 'Next page', 'twentysixteen' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
				) );

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- .site-main -->
		</div>
	</div><!-- .content-area -->
<?php } ?>

<?php get_footer(); ?>
