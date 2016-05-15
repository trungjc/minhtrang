
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php
  $args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => '10',
    'meta_key'		=> 'feature_post_product',
	'meta_value'	=> 'hiện'
  );
  $products_loop = new WP_Query( $args );
  if ( $products_loop->have_posts() ) :
    while ( $products_loop->have_posts() ) : $products_loop->the_post();
      // Set variables
	 $acf_fields = get_fields();
	 $title = get_the_title();
      $description = get_the_content();
      /*
      $brief = get_field('tom_tat');
      $price = get_field('gia');
      $product_image2 = get_field('thu_vien');*/
      // Output
      ?>
      <div class="product">
        <h2><?php echo $title; ?></h2>
         <?php echo $acf_fields['feature_post_product'] ?>
       <div class="slideshow-image" id="slideshow-image">
								<?php if (!empty($acf_fields['thu_vien'])) {?>
									<?php foreach($acf_fields['thu_vien'] as $image) {
										/*print_r($image)*/
										?>
										<?php if($image['hinh_anh'] ) {?>
											<div class="item">
											
												<img src="<?php echo $image['hinh_anh']['sizes']['medium']; ?>" alt="<?php echo $image['hinh_anh']['caption']; ?>">
											</div>
										<?php }?>
									<?php }?>
								<?php }?>
							</div>
        <?php echo $description; ?>
        <p><a href="" target="_blank" name="Spec Sheet">Gia: <?php echo $acf_fields['gia'] ?></a></p> 
        <p><a href="" target="_blank" name="Spec Sheet"><?php echo $acf_fields['gia_chi_tiet'] ?></a></p> 
      </div>
      <?php
      endwhile;
    wp_reset_postdata();
  endif;
 ?>
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

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
	</div><!-- .content-area -->

<?php get_sidebar(); ?>