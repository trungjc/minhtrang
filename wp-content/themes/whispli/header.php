<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whispli
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="apple-touch-icon" type="image/png" href="apple-touch-icon.png">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/icon.png"/>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png"/>
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png"/>
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/icon.png"/>
	<link rel="icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png"/>
	<link rel="icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png"/>
	<?php wp_head(); ?>
</head>
<?php $locations = get_nav_menu_locations(); ?>
<?php
# Get menus
$header_left_menu = false;
if ( isset( $locations['header_left_menu'] ) ) {
	$header_left_menu = whispli_custom_nav_menu( 'header_left_menu' );
}
$mobile_header_primary_menu = false;
if ( isset( $locations['mobile_header_primary_menu'] ) ) {
	$mobile_header_primary_menu = whispli_custom_nav_menu( 'mobile_header_primary_menu' );
}
$mobile_header_secondary_menu = false;
if ( isset( $locations['mobile_header_primary_menu'] ) ) {
	$mobile_header_secondary_menu = whispli_custom_nav_menu( 'mobile_header_secondary_menu' );
}

$header_right_menu = false;
if ( isset( $locations['header_right_menu'] ) ) {
	$header_right_menu = whispli_custom_nav_menu( 'header_right_menu' );
}
?>
<body <?php body_class(); ?>>
<div class="wrapper">
	<header class="header navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button data-target=".mobile-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- menu for mobile-->
				<nav class="mobile-navbar-collapse collapse">
					<span class="icon-cross"></span>
					<div class="navbar-box">
						<?php
						if ( count( $mobile_header_primary_menu[0] ) > 0 ) {
							?>
							<ul class="nav navbar-nav">
								<?php foreach ( $mobile_header_primary_menu[0] as $index => $parent_item ) { ?>
									<?php
									$has_sub = in_array( $parent_item->ID, array_keys( $mobile_header_primary_menu[2] ) );
									$classes = implode( ' ', $parent_item->classes );;
									if ($has_sub) {
										$classes = str_replace('current-menu-item','', $classes);
									}
									?>
									<li class="<?php echo $classes; ?>">
										<a <?php if ( $has_sub ) {
											echo 'href="javascript:void(0)"';
										} else {
											echo 'href=' . apply_filters( 'the_permalink', $parent_item->url ) . '';
										} ?>>
											<?php echo apply_filters( 'post_title', $parent_item->title ) ?>
										</a>
										<?php if ( count( $mobile_header_primary_menu[1] ) > 0 && isset( $mobile_header_primary_menu[1][$parent_item->ID] ) ) { ?>
											<ul class="dropdown-menu sub-menu">
												<?php if ( count( $mobile_header_primary_menu[1][$parent_item->ID] ) > 0 ) { ?>
													<?php foreach ( $mobile_header_primary_menu[1][$parent_item->ID] as $item ) { ?>
														<li class="<?php echo implode( ' ', $item->classes ); ?>">
															<a href="<?php echo apply_filters( 'the_permalink', $item->url ) ?>">
																<?php echo apply_filters( 'post_title', $item->title ) ?></a>
															</a>
														</li>
													<?php } ?>
												<?php } ?>
											</ul>
										<?php } ?>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
						<?php
						if ( count( $mobile_header_secondary_menu[0] ) > 0 ) {
							?>
							<ul class="second-menu visible-xs-block">
								<?php foreach ( $mobile_header_secondary_menu[0] as $index => $parent_item ) { ?>
									<li class="<?php echo implode( ' ', $parent_item->classes ); ?>">
										<a href="<?php echo apply_filters( 'the_permalink', $parent_item->url ); ?>">
											<?php echo apply_filters( 'post_title', $parent_item->title ) ?>
										</a>
									</li>
								<?php } ?>
								<li>
									ABN 25 605 003 825
								</li>
							</ul>
						<?php } ?>
					</div>
				</nav>

				<!-- end mobile-navbar-collapse-->
				<h1 class="logo">
					<a href="<?php echo icl_get_home_url(); ?>" title="logo"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt="logo" width="250" height="100" /></a>
				</h1>
				<!-- end logo-->
			</div>
			<!-- end navbar-header -->
			<!-- menu for desktop-->

			<?php
			if ( count( $header_left_menu[0] ) > 0 ) {
				?>
				<nav class="navbar-collapse bs-navbar-collapse collapse ">
					<ul class="nav navbar-nav">
						<?php foreach ( $header_left_menu[0] as $index => $parent_item ) { ?>
							<?php $has_sub = in_array( $parent_item->ID, array_keys( $header_left_menu[2] ) ); ?>
							<li class="<?php echo implode( ' ', $parent_item->classes ); ?>">
								<a <?php if ( $has_sub ) {
									echo 'href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"';
								} else {
									echo 'href=' . apply_filters( 'the_permalink', $parent_item->url ) . '';
								} ?>>
									<?php echo apply_filters( 'post_title', $parent_item->title ) ?>
								</a>
								<?php if ( count( $header_left_menu[1] ) > 0 && isset( $header_left_menu[1][$parent_item->ID] ) ) { ?>
									<ul class="dropdown-menu sub-menu">
										<?php if ( count( $header_left_menu[1][$parent_item->ID] ) > 0 ) { ?>
											<?php foreach ( $header_left_menu[1][$parent_item->ID] as $item ) { ?>
												<li class="<?php echo implode( ' ', $item->classes ); ?>">
													<a href="<?php echo apply_filters( 'the_permalink', $item->url ) ?>">
														<?php echo apply_filters( 'post_title', $item->title ) ?></a>
													</a>
												</li>
											<?php } ?>
										<?php } ?>
									</ul>
								<?php } ?>
							</li>
						<?php } ?>
					</ul>
					<!-- end navbar-nav-->
				</nav>
			<?php } ?>
			<!-- /end navbar-collapse -->
			<?php
			if ( count( $header_right_menu[0] ) > 0 ) {
				?>
				<ul class="nav navbar-nav navbar-right">
					<?php foreach ( $header_right_menu[0] as $index => $parent_item ) { ?>
						<?php $has_sub = in_array( $parent_item->ID, array_keys( $header_right_menu[2] ) ); ?>
						<li class="<?php echo implode( ' ', $parent_item->classes ); ?>">
							<a <?php if ( $has_sub ) {
								echo 'href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"';
							} else {
								echo 'href=' . apply_filters( 'the_permalink', $parent_item->url ) . '';
							} ?>>
								<?php echo apply_filters( 'post_title', $parent_item->title ) ?>
							</a>
							<?php if ( count( $header_right_menu[1] ) > 0 && isset( $header_right_menu[1][$parent_item->ID] ) ) { ?>
								<ul class="dropdown-menu sub-menu">
									<?php if ( count( $header_right_menu[1][$parent_item->ID] ) > 0 ) { ?>
										<?php foreach ( $header_right_menu[1][$parent_item->ID] as $item ) { ?>
											<li>
												<a href="<?php echo apply_filters( 'the_permalink', $item->url ) ?>">
													<?php echo apply_filters( 'post_title', $item->title ) ?></a>
												</a>
											</li>
										<?php } ?>
									<?php } ?>
								</ul>
							<?php } ?>
						</li>
					<?php } ?>
					<?php whispli_language_selector(); ?>
				</ul>
			<?php } ?>
			<!-- end navbar-right-->
		</div>
	</header>
	<!-- END - Header =================================================================================== -->
