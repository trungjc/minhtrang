<?php
/**
 * Template Name: Informant Terms page
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
		<div class="container-fluid">
			<div class="site-body">
				<div class="hero-banner">
					<div class="hero-caption">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<h2 class="heading"><?php the_title()?></h2>
								</div>
							</div>
						</div>
					</div>
					<div class="hero-image purple-overlay">&nbsp;</div>
					<!--overlay background -->
				</div>
				<!-- END - hero =================================================================================== -->
				<div class="content-page container">
					<div class="row">
						<div class="col-md-10 col-md-push-1">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
			<!--site-body-->
		</div>
	</section>
	<!-- END - Main =================================================================================== -->
<?php endwhile; // End of the loop.?>
<?php
get_footer();
?>