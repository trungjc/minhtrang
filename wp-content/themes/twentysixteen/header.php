<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">
  <div class="main">
            <header class="header">
                <div class="container">
                    <div class="row">
                        <div class="grid_12">
                            <div class="h_top">
                                <div class="socials"><a href="<?php echo get_option('twitter_link')?>"  class="fa fa-twitter col1"></a>
                                <a href="<?php echo get_option('facebook_link')?>" class="fa fa-facebook"></a></div>

                                <div class="search-top">
                                    <form role="search" method="get" id="searchform"
                                    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <div>
                                        
                                        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
                                        <input type="submit" id="searchsubmit"
                                            value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
                                    </div>
                                </form>
                                </div>
                                 <div class="number"><span>Hotline: </span> <?php echo get_option('hotline')?> </div>
                            </div>
                        </div>
                        <div class="grid_2">
                          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.jpg"/></a>
                        </div>

                        <div class="grid_10">
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'menu_class'     => 'primary-menu main-menu',
                                     ) );
                                ?>
                            </nav><!-- .main-navigation -->
                        <?php endif; ?>
                        </div>
                        <div class="grid_12">
                             <div class="mb-menu">
                                <a href="#" class="fright ico-menu"><i class="fa  fa-align-justify"></i></a>
                                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'menu_class'     => 'content-mb-menu',
                                     ) );
                                ?>
                            </nav><!-- .main-navigation -->
                        <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </header>  