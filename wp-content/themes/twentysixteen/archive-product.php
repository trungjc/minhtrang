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
<div class="bg1">
	<div id="primary" class="content-area container">
		<div class="row">
			<?php get_sidebar(); ?>
			<main id="main" class="site-main grid_9" role="main">

			<?php if ( have_posts() ) : $category = get_the_category(); 
			$catid = $category[0]->cat_ID;  
			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}
			 ?>
				<div class="list-product clearfix">                            	
			                            <?php
										//var_dump($category);
										  $args = array(
										    'post_type' => 'product',
										    'cat' => $catid,'paged' => $paged,
											'post_status' => 'publish'
										  );
										  $products_loop = new WP_Query( $args );
										
										  if ( $products_loop->have_posts() ) :
										    while ( $products_loop->have_posts() ) : $products_loop->the_post();
										      // Set variables
											 $acf_fields_product = get_fields();
											/* var_dump( $acf_fields_product);*/
											 $title = get_the_title();
											  
										      ?>
	                                
	                                <div class="grid_3">
	                                    <div class="block1">
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
	                                         <div class="title"><a href="<?php the_permalink(); ?>"><?php echo $title ?></a></div>
	                                        <div class="brief"> <?php the_excerpt () ?></div>
	                                        <div class="price"><?php echo $acf_fields_product['gia'] ?><span><?php echo $acf_fields_product['khuyenmai'] ?></span></div>
	                                        <a href="<?php the_permalink(); ?>" class="btn" >chi tiết</a>
	                                    </div>
	                                </div>

	                                 <?php
	                               
							      endwhile;
							    wp_reset_postdata();
							  endif;
							 ?>

	                            </div> <!--list-product-->


		
<?php				

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


<?php get_footer(); ?>
