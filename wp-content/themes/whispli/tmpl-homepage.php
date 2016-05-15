<?php
/**
 * Template Name: Homepage
 *
 * @package    WordPress
 * @subpackage Whispli
 * @since      Whispli 1.0
 */
?>
<?php get_header(); ?>
<?php  while ( have_posts() ) : the_post();?>
	<?php $acf_fields = get_fields();?>
	<section class="main">
		<div class="site-body-header">
			<div class="container-fluid">
				<div class="hero-section in-view">
					<div class="slideshow">
						<div class="slideshow-inner" style="width:80%">
							<div class="slideshow-caption" data-animation="true">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<h2><?php echo $acf_fields['title'];?></h2>
											<?php echo $acf_fields['description'];?>
											<div class="button-container">
												<div class="btn-group" role="group">
													<?php if(have_rows('carousel_links')) {?>
														<?php unset($i);?>
														<?php $button_colour = array('btn btn-default btn-primary','btn btn-default btn-secondary');?>
														<?php foreach ( $acf_fields['carousel_links'] as $i => $link ) { ?>
															<?php
															if ( $link['type'] != 'none' ) {
																if ( $link['type'] == 'internal' ) {
																	$href = $link['internal_link'];
																} else {
																	$href = $link['external_link'];
																}
																$is_video_url = strpos( $href, 'youtube' ) || strpos( $href, 'vimeo' );
																?>
																<a target="<?php echo $link['target'] ?>" href="<?php echo $href ?>" class="<?php echo $button_colour[$i];
																if ( false != $is_video_url ) {
																	echo ' popup-media';
																} ?>"><?php echo whispli_remove_p_wrapper( $link['block'] ) ?></a>
															<?php } ?>
														<?php } ?>
													<?php }?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="slideshow-image" id="slideshow-image">
								<?php if (!empty($acf_fields['images'])) {?>
									<?php foreach($acf_fields['images'] as $image) {?>
										<?php if($image['image'] && $image['image']['sizes'] && $image['image']['sizes']['homepage-carousel']) {?>
											<div class="item">
												<div class="img lazy" style="background-image: url('<?php echo whispli_resize_image($image['image']['sizes']['homepage-carousel'], 1345, 578)?>')"></div>
											</div>
										<?php }?>
									<?php }?>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<!-- END - hero =================================================================================== -->


			</div>
			<!-- END -product-panel =================================================================================== -->
		</div>
		<div class="page-blocks" data-target-menu="true">
			<div class="container-fluid ">
				<div class="site-body">
					<div class="bellow-hero">
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<h2><?php echo $acf_fields['content_title'];?></h2>
									<?php echo $acf_fields['content_description'];?>
									<?php
									if ( $acf_fields['request_trial_link_type'] != 'none' ) {
										if ( $acf_fields['request_trial_link_type'] == 'internal' ) {
											$href = $acf_fields['internal_request_trial_link'];
										} else {
											$href = $acf_fields['external_request_trial_link'];
										}
										?>
										<a target="<?php echo $acf_fields['request_trial_link_target']?>" href="<?php echo $href; ?>" class="btn btn-default btn-border-dark hidden-xs"><?php echo $acf_fields['request_trial_text']; ?></a>
									<?php } ?>
								</div>
								<div class="col-md-6 col-xs-12">
									<?php if(!empty($acf_fields['features'])) {?>
										<?php foreach($acf_fields['features'] as $row) {?>
											<?php ?>
											<div class="media">
												<div class="pull-left">
                                            <span class="">
												<?php if($row['icon']) {?>
													<img src="<?php echo whispli_resize_image($row['icon']['url'], 44, 43)?>" alt="" />
												<?php }?>
                                            </span>
												</div>
												<div class="media-body">
													<h3 class="media-heading"><?php echo $row['title']?></h3>
													<?php echo $row['description']?>
												</div>
											</div>
										<?php }?>
									<?php }?>
									<?php if ( $acf_fields['request_trial_link_type'] != 'none' ) { ?>
										<a target="<?php echo $acf_fields['request_trial_link_target']?>" href="<?php echo $href; ?>" class="btn btn-default btn-border-dark visible-xs-block"><?php echo $acf_fields['request_trial_text']; ?></a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<!-- END - bellow-hero =================================================================================== -->
					<div class="product-panel" id="product-panel">
						<div class="container">
							<div class="row">
								<?php if(!empty($acf_fields['market_sectors'])) {?>
									<?php $total_market_sector = count($acf_fields['market_sectors']);  $i=0;?>
									<?php foreach($acf_fields['market_sectors'] as $row) { ?>
										<?php if($i++%3 == 0){?>
											<div class="col-md-6 col-sm-6 col-xs-12">
										<?php }?>
										<?php
										$overlay_class = 'blue-overlay';
										if(!empty($row['link_type']) && $row['link_type'] == 'internal') {
											$object = $row['internal_link'];
											if ('product' == get_post_type($object)) {
												$overlay_class = 'purple-overlay';
											}
										}
										?>
										<div class="product-item <?php echo $overlay_class; ?>" data-class-in="in-animation" data-class-out="out-animation">
											<div class="product-item-heading">
												<a href="" class="image">
													<?php if($row['image']) {?>
														<img src="<?php echo whispli_resize_image($row['image']['url'],440,220)?>" alt="" />
													<?php }?>
												</a>
												<h2 class="name">
													<?php if($row['icon']) {?>
														<img src="<?php echo whispli_resize_image($row['icon']['url'], 86, 86)?>" alt="" />
													<?php }?>
													<span class="title"><?php echo $row['title']?></span>
												</h2>
											</div>
											<div class="description"><?php echo whispli_remove_p_wrapper($row['content']);?></div>
											<div class="view-detail">
												<?php if(!empty($row['link_type'])) {?>
													<?php
													if ($row['link_type'] == 'internal' && !empty($row['internal_link'])) {
														$object = $row['internal_link'];
														$market_href = get_permalink($object);
													} elseif ($row['link_type'] == 'external' && !empty($row['external_link'])) {
														$market_href = $row['external_link'];
													}
													?>
													<a target="<?php echo $row['link_target']?>" class="btn btn-default btn-dark" href="<?php echo $market_href; ?>"><?php echo whispli_remove_p_wrapper($row['link_block']); ?></a>
												<?php }?>
											</div>
										</div>
										<?php if($i%3==0 || $i == $total_market_sector) {?>
											</div>
										<?php }?>
									<?php }?>
								<?php }?>
							</div>
							<div class="row more-item">
								<div class="col-md-6 col-sm-6 col-xs-12 ">
									<div class="description">
										<h2><?php echo $acf_fields['more_applications_title']?></h2>
										<?php echo $acf_fields['more_applications_description'];?>
									</div>
									<div class="view-detail">
										<?php if (!empty($acf_fields['more_application_link_type'])){?>
											<?php
											if ($acf_fields['more_application_link_type'] == 'internal') {
												$application_link = $acf_fields['more_application_internal_link'];
											} else{
												$application_link = $acf_fields['more_application_external_link'];
											}
											?>
											<div class="view-detail"><a target="<?php echo $acf_fields['more_application_link_target']; ?>" href="<?php echo $application_link?>" class="btn btn-default"><?php echo whispli_remove_p_wrapper($acf_fields['more_application_link_block']); ?></a></div>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END -product-panel =================================================================================== -->
				</div>
			</div>
			<?php if(!empty($acf_fields['footer_features'])) {?>
				<section class="bottom-feature-widget">
					<div class="container-fluid">
						<div class="container-fluid">
							<div class="container">
								<div class="bottom-feature-post row">
									<?php foreach ($acf_fields['footer_features'] as $row) {?>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="feature-post-content">
												<h3 class="heading"><span><?php echo $row['label']?></span><?php echo $row['title']?></h3>
												<?php echo $row['description'] ?>
												<?php
												$href = '';
												if ( $row['link_type'] != 'none' ) {
													if ( $row['link_type'] == 'internal' ) {
														$href = $row['internal_link'];
													} else {
														$href = $row['external_link'];
													}
													?>
													<a target="<?php echo $row['link_target']?>" href="<?php echo $href; ?>" class="btn btn-default"><?php echo $row['link_text']?></a>
												<?php } ?>
											</div>
										</div>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php }?>
			<!-- END - widget-content-bottom =================================================================================== -->
			<?php if(!empty($acf_fields['as_featured_images'])) {?>
				<section class="bottom-brand-widget">
					<div class="container">
						<div class="brand-post row">
							<div class="col-md-12 col-xs-12">
								<h2 class="title"><?php echo $acf_fields['as_featured_title']?></h2>
								<ul class="feature-logo clearfix">
									<?php foreach($acf_fields['as_featured_images'] as $row) {?>
										<li>
											<a href="<?php echo $row['link']?>"><img src="<?php echo $row['image']['url']?>" alt="" /></a>
										</li>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>
				</section>
			<?php }?>
			<section class="widget-footer">
				<?php echo whispli_footer_featured_post();?>
			</section>
			<!-- END - widget-bottom =================================================================================== -->
		</div>
		<!-- END - page-blocks =================================================================================== -->
	</section>
	<!-- END - Main =================================================================================== -->

	<!-- #primary -->
	<?php endwhile; // End of the loop.?>
<?php
get_footer();
?>