<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<div class="bg1">
                <div class="container hero">
                    <div class="row">
                        <div class="grid_12">
                            <div class="slider_wrapper slideshow" id="banner" style="width:100%;height: 480px;overflow: hidden;">
                               <?php
							  $args = array(
							    'post_type' => 'slide',
							    'post_status' => 'publish',
							    'posts_per_page' => '10'
							  );
							  $slideshowloop = new WP_Query( $args );
							  if ( $slideshowloop->have_posts() ) :
							    while ( $slideshowloop->have_posts() ) : $slideshowloop->the_post();
							      // Set variables
								 $acf_fields = get_fields();
							      ?>
    
        
	       						<div style="float: left;"> 						
									<!-- <div class="img" style="display: none;width:0;background-image: url(<?php echo $acf_fields['hinh_anh']['url'] ?>)"></div>	 -->	
									<a href="<?php echo $acf_fields['link'] ?>"><img src="<?php echo $acf_fields['hinh_anh']['url'] ?>" /></a>	
										<?php if ((!empty($acf_fields['name'])) || (!empty($acf_fields['content'])) ) {?>									
										<!-- <div class="caption">
											<h3><?php echo $acf_fields['name'] ?></h3>
											<?php echo $acf_fields['content'] ?>
										</div> -->
									<?php } ?>
								</div>
							       
						      <?php
						      endwhile;
						    wp_reset_postdata();
						  endif;
						 ?>

                            </div>   
                        </div>
                    </div>
                </div>
                <!--=====================Content======================-->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <?php get_sidebar(); ?>
                            <div class="grid_9">
	                            <div class="page1_block">
	                            <?php if ( is_active_sidebar( 'content-top' )  ) : ?>
	                                    <div id="'content-top" class="'content-top-widget widget-area" role="complementary">
	                                        <?php dynamic_sidebar( 'content-top'  ); ?>
	                                    </div><!-- .sidebar .widget-area -->
	                                <?php endif; ?>

	                               
	                            </div>
	                            <h2>Các mẫu xe  nổi bật</h2>   

	                            <div class="list-product-container">
	                            	<div class="list-product" id="list-product">                            	
			                            <?php
										//var_dump($category);
										  $args1 = array(
										    'post_type' => 'product',
										    'post_status' => 'publish',
										    'posts_per_page' => '12',
										    'meta_key'		=> 'feature_post_product',
											'meta_value'	=> 'hiện'
										  );
										  $products_loop = new WP_Query( $args1 );
										  $i = 0;
										
										  if ( $products_loop->have_posts() ) :
										    while ( $products_loop->have_posts() ) : $products_loop->the_post();
										      // Set variables
											 $acf_fields_product = get_fields();
											/* var_dump( $acf_fields_product);*/
											 $title = get_the_title();
											   if($i% 6 == 0) {
											    echo $i > 0 ? "</div>" : "";
											    echo "<div>";
											  }
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
	                               
	                                 $i++;
							      endwhile;
							    wp_reset_postdata();
							  endif;
							 ?>

	                            </div> <!--list-product-->
	                            </div><!--list-product-container-->
                             </div>   <!--9-->
                                
                         </div>
                         <!--end row-->
                  </div><!--end container-->
                </div><!--end content-->
                </div>
<?php get_footer(); ?>
