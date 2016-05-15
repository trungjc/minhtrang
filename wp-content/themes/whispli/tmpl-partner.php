<?php
/**
 * Template Name: Partners
 *
 * @package    WordPress
 * @subpackage Whispli
 * @since      Whispli 1.0
 */
?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php $acf_fields = get_fields(); ?>
	<section class="main">
		<div class="site-body-header">
			<section class="hero-section-area">
				<div class="container-fluid">
					<div class="hero-section in-view">
						<div class="slideshow">
							<div class="slideshow-inner">
								<div class="hero-caption">
									<div class="container-fluid">
										<div class="inner col-md-12">
											<?php if ( ! empty( $acf_fields['carousel_heading'] ) ) { ?>
												<h2 class="heading"><?php echo $acf_fields['carousel_heading']; ?></h2>
											<?php } ?>

										</div>
									</div>
								</div>
								<?php if ( ! empty( $acf_fields['carousel_image'] ) && isset( $acf_fields['carousel_image']['url'] ) ) { ?>
									<div class="slideshow-image" id="slideshow-image">
										<div class="item purple-overlay ">
											<div class="img" style="background-image: url('<?php echo whispli_resize_image( $acf_fields['carousel_image']['url'], 1345, 578 ) ?>')"></div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- END - hero-section =================================================================================== -->
		</div>
		<!-- end site-body-header-->
		<div class="page-blocks">
			<div class="container-fluid">
				<div class="site-body">
					<div class="become-partner">
						<div class="container header-block">
							<div class="row">
								<div class="col-md-12">
									<div class="text-content">
										<?php if ( ! empty( $acf_fields['become_partner_heading'] ) ) { ?>
											<h3><?php echo $acf_fields['become_partner_heading']; ?></h3>
										<?php } ?>
										<?php echo $acf_fields['become_partner_subheading']; ?>
										<?php if ( ! empty( $acf_fields['button_link_text'] ) ) { ?>
											<?php if ( $acf_fields['button_link_type'] != 'none' ) { ?>
												<?php
												if ( $acf_fields['button_link_type'] == 'internal' ) {
													$href = $acf_fields['internal_button_link'];
												} else {
													$href = $acf_fields['external_button_link'];
												}
												?>
												<a href="<?php echo $href; ?>" target="<?php echo $acf_fields['button_link_target'] ?>" class="btn btn-default btn-primary"><?php echo $acf_fields['button_link_text'] ?></a>
											<?php } ?>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="text-box">
							<div class="container">

								<?php if ( ! empty( $acf_fields['become_partners_blocks'] ) ) { ?>

									<?php unset( $i );
									$total_blocks = count( $acf_fields['become_partners_blocks'] );
									foreach ( $acf_fields['become_partners_blocks'] as $i => $block ) { ?>
										<?php if ( $i % 2 == 0 ) { ?>
											<div class="row-inner">
										<?php } ?>

										<div class="col-md-5 col-xs-12 <?php if ( $i % 2 == 1 ) {
											echo 'col-md-push-2';
										} ?>">
											<h3><?php echo $block['title'] ?></h3>
											<?php echo whispli_remove_p_wrapper( $block['rich_text'] ); ?>
										</div>
										<?php if ( $i % 2 == 1 || $i == $total_blocks ) { ?>
											</div>
										<?php } ?>

									<?php } ?>
								<?php } ?>

							</div>
						</div>
					</div>
					<div class="resource-support">
						<div class="hero-banner">
							<?php if ( ! empty( $acf_fields['icon'] ) && isset( $acf_fields['icon']['url'] ) ) { ?>
								<div class="heading-img hidden-xs">
									<img alt="" src="<?php echo whispli_resize_image( $acf_fields['icon']['url'], 132, 132 ) ?>">
								</div>
							<?php } ?>
							<div class="hero-caption">
								<div class="container">
									<div class="row">
										<div class="col-md-12 col-xs-12 ">
											<?php if ( ! empty( $acf_fields['icon'] ) && isset( $acf_fields['icon']['url'] ) ) { ?>
												<div class="heading-img-mobile visible-xs-block">
													<img alt="" src="<?php echo whispli_resize_image( $acf_fields['icon']['url'] ) ?>">
												</div>
											<?php } ?>
											<?php if ( ! empty( $acf_fields['bg_img_heading'] ) ) { ?>
												<h3><?php echo $acf_fields['bg_img_heading']; ?></h3>
											<?php } ?>
											<?php echo $acf_fields['bg_img_subheading']; ?>
											<?php if ( ! empty( $acf_fields['bg_img_link_list'] ) ) { ?>
												<ul>
													<?php foreach ( $acf_fields['bg_img_link_list'] as $link ) { ?>
														<?php if ( ! empty( $link['link_text'] ) ) { ?>
															<?php if ( $link['link_type'] != 'none' ) { ?>
																<?php
																if ( $link['link_type'] == 'internal' ) {
																	$href = $link['internal_link'];
																} else {
																	$href = $link['external_link'];
																}
																?>
																<li>
																	<a href="<?php echo $href; ?>" target="<?php echo $link['link_target'] ?>"><?php echo $link['link_text'] ?></a>
																</li>
															<?php } ?>
														<?php } ?>
													<?php } ?>
												</ul>
											<?php } ?>
											<?php if ( ! empty( $acf_fields['button_helper'] ) ) { ?>
												<p><?php echo $acf_fields['button_helper']; ?></p>
											<?php } ?>
											<?php if ( ! empty( $acf_fields['bg_img_button_link_text'] ) ) { ?>
												<?php if ( $acf_fields['bg_img_button_link_type'] != 'none' ) { ?>
													<?php
													if ( $acf_fields['bg_img_button_link_type'] == 'internal' ) {
														$href = $acf_fields['bg_img_internal_button_link'];
													} else {
														$href = $acf_fields['bg_img_external_button_link'];
													}
													?>
													<a href="<?php echo $href; ?>" target="<?php echo $acf_fields['bg_img_button_link_target'] ?>" class="btn btn-default btn-primary"><?php echo $acf_fields['bg_img_button_link_text'] ?></a>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<?php if ( ! empty( $acf_fields['background_image'] ) && isset( $acf_fields['background_image']['url'] ) ) { ?>
								<div class="hero-image">
									<div class="item dark-blue-overlay parallax">
										<div class="parallax-img" style="background-image: url('<?php echo whispli_resize_image( $acf_fields['background_image']['url'], 1345, 528 ) ?>')"></div>
									</div>
								</div>
							<?php } ?>

						</div>
					</div>
					<!-- end what-will-->
					<section class="bottom-brand-widget ">
						<div class="container">
							<?php if ( ! empty( $acf_fields['quote_content'] ) ) { ?>
								<div class="testimonial row">
									<div class="col-md-12 col-xs-12">
										<div class="testimonial-content">
											<div class="quote"><?php echo $acf_fields['quote_content'] ?>
											</div>
											<p class="name"><?php echo $acf_fields['quote_by'] ?></p>
										</div>
									</div>
								</div>
							<?php } ?>

							<div class="brand-post row">
								<div class="col-md-12 col-xs-12">
									<?php if ( ! empty( $acf_fields['partner_heading'] ) ) { ?>
										<h2><?php echo $acf_fields['partner_heading'] ?></h2>
									<?php } ?>
									<?php if ( ! empty( $acf_fields['partners'] ) ) { ?>
										<?php $total_partners = count($acf_fields['partners']); ?>
										<ul class="feature-logo clearfix partner-logo">
											<?php foreach ( $acf_fields['partners'] as $partner ) { ?>
												<?php if ( ! empty( $partner['image'] ) && isset( $partner['image']['url'] ) ) { ?>
													<?php if ( $partner['link_type'] != 'none' ) { ?>
														<?php
														if ( $partner['link_type'] == 'internal' ) {
															$href = $partner['internal_link'];
														} else {
															$href = $partner['external_link'];
														}
														?>
														<li>
															<a href="<?php echo $href; ?>" target="<?php echo $partner['link_target'] ?>">
																<img alt="" src="<?php echo whispli_resize_image( $partner['image']['url'], 300, 300 ) ?>">
															</a>
														</li>
													<?php } else {
														?>
														<li>
															<img alt="" src="<?php echo whispli_resize_image( $partner['image']['url'], 300, 300 ) ?>">
														</li>
														<?php
													} ?>


												<?php } ?>
											<?php } ?>
											<?php if ( $total_partners % 3 == 2 ) { ?>
												<li class="no-image">
													<img alt="" src="<?php echo get_template_directory_uri() ?>/assets/img/partner/img-holder.png">
												</li>
											<?php } ?>
											<?php if ( $total_partners % 3 == 1 ) { ?>
												<li class="no-image">
													<img alt="" src="<?php echo get_template_directory_uri() ?>/assets/img/partner/img-holder.png">
												</li>
												<li class="no-image">
													<img alt="" src="<?php echo get_template_directory_uri() ?>/assets/img/partner/img-holder.png">
												</li>
											<?php } ?>
										</ul>
									<?php } ?>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<!-- end site body-->
		</div>
		<!-- end page-blocks ===================================================================================-->
	</section>
	<!-- end main ====================================-->
<?php endwhile; // End of the loop.?>
<?php
get_footer();
?>
