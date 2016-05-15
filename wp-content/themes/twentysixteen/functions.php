<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
		'social'  => __( 'Social Links Menu', 'twentysixteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Content top' ,'twentysixteen' ),
		'id'            => 'content-top',
		'description'   => __( 'load module ở vị trị top của trang', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Thanh bên trái', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'xuất hiện ở vị trí phía bên trái', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'content-bottom1',
		'description'   => __( 'xuất hiện ở vị trí phía dưới trên footer.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="grid_6">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'content-bottom2',
		'description'   => __( 'xuất hiện ở vị trí phía dưới trên footer  và dưới content botttom 1', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'footer top', 'twentysixteen' ),
		'id'            => 'footer1',
		'description'   => __( 'xuất hiện ở vị trí phía  footer', 'twentysixteen' ),
			'before_widget' => '<div id="%1$s" class="grid_3 ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'footer bottom', 'twentysixteen' ),
		'id'            => 'footer2',
		'description'   => __( 'xuất hiện ở vị trí phía  footer', 'twentysixteen' ),
		'before_widget' => '<div id="%1$s" class="grid_4 ">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20150930' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20151230' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20150930' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151112', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20151104' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20151204', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );

add_action( 'init', 'codex_product_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_product_init() {
	$labels = array(
		'name'               => _x( '', 'post type general name', 'mt' ),
		'singular_name'      => _x( 'Sản phẩm và dịch vụ', 'post type singular name', 'mt' ),
		'menu_name'          => _x( 'Sản phẩm và dịch vụ', 'admin menu', 'mt' ),
		'name_admin_bar'     => _x( 'Sản phẩm và dịch vụ', 'add new on admin bar', 'mt' ),
		'add_new'            => _x( 'Thêm mới', 'book', 'mt' ),
		'add_new_item'       => __( 'Thêm mới', 'mt' ),
		'new_item'           => __( 'Thêm mới', 'mt' ),
		'edit_item'          => __( 'Chỉnh sửa', 'mt' ),
		'view_item'          => __( 'Xem', 'mt' ),
		'all_items'          => __( 'Danh sách', 'mt' ),
		'search_items'       => __( 'Tìm kiếm', 'mt' ),
		'parent_item_colon'  => __( 'Parent Products:', 'mt' ),
		'not_found'          => __( 'Không tìm thấy.', 'mt' ),
		'not_found_in_trash' => __( 'Không tìm thấy.', 'mt' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'mt' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'product' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions' ),
		 'taxonomies' => array( 'post_tag', 'category'), 
	);

	register_post_type( 'product', $args );
}
// register a taxonomy called 'Animal Family'
/*function wptp_register_taxonomy() {
    register_taxonomy( 'product_cat', array( 'product', 'post' ),
        array(
            'labels' => array(
                'name'              => 'danh mục',
                'singular_name'     => 'danh mục ',
                'search_items'      => 'Tìm kiếm' ,
                'all_items'         => 'All product',
                'edit_item'         => 'Edit product',
                'update_item'       => 'Update product',
                'add_new_item'      => 'Thêm mới',
                'new_item_name'     => 'Thêm mới',
                'menu_name'         => 'danh mục',
            ),
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'rewrite' => array( 'slug' => 'product' ),
            'show_admin_column' => true
        )
    );
}
add_action( 'init', 'wptp_register_taxonomy' );*/

add_action( 'init', 'codex_slide_init' );

function codex_slide_init() {
	$labels = array(
		'name'               => _x( 'slide banner', 'post type general name', 'mt' ),
		'singular_name'      => _x( 'slide banner', 'post type singular name', 'mt' ),
		'menu_name'          => _x( 'slide banner', 'admin menu', 'mt' ),
		'name_admin_bar'     => _x( 'slide banner', 'add new on admin bar', 'mt' ),
		'add_new'            => _x( 'Thêm mới', 'book', 'mt' ),
		'add_new_item'       => __( 'Thêm mới', 'mt' ),
		'new_item'           => __( 'Thêm mới', 'mt' ),
		'edit_item'          => __( 'Chỉnh sửa', 'mt' ),
		'view_item'          => __( 'Xem', 'mt' ),
		'all_items'          => __( 'Danh sách', 'mt' ),
		'search_items'       => __( 'Tìm kiếm', 'mt' ),
		'parent_item_colon'  => __( 'Parent Products:', 'mt' ),
		'not_found'          => __( 'Không tìm thấy.', 'mt' ),
		'not_found_in_trash' => __( 'Không tìm thấy.', 'mt' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'mt' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slide' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions' )
		);
	register_post_type( 'slide', $args );
}

add_filter( 'auto_update_plugin', '__return_false' );

add_filter( 'auto_update_theme', '__return_false' );

add_filter( 'admin_init', 'mt_general_settings_register_fields' );
if (!function_exists('mt_general_settings_register_fields')) {
	function mt_general_settings_register_fields() {
		register_setting( 'general', 'facebook_link', 'esc_attr' );
		add_settings_field( 'facebook_link', '<label for="facebook_link">' . __( 'Facebook', 'mt' ) . '</label>', 'mt_general_settings_facebook_link', 'general' );

		register_setting( 'general', 'twitter_link', 'esc_attr' );
		add_settings_field( 'twitter_link', '<label for="twitter_link">' . __( 'Twitter', 'mt' ) . '</label>', 'mt_general_settings_twitter_link', 'general' );

		register_setting( 'general', 'linkedin_link', 'esc_attr' );
		add_settings_field( 'linkedin_link', '<label for="linkedin_link">' . __( 'Linkedin', 'mt' ) . '</label>', 'mt_general_settings_linkedin_link', 'general' );

		register_setting( 'general', 'hotline', 'esc_attr' );
		add_settings_field( 'hotline', '<label for="hotline">' . __( 'hotline', 'mt' ) . '</label>', 'mt_general_settings_hotline', 'general' );

		

		register_setting( 'general', 'google_analytic', 'esc_attr' );
		add_settings_field( 'google_analytic', '<label for="google_analytic">' . __( 'Google Analytics', 'mt' ) . '</label>', 'mt_general_settings_google_analytic', 'general' );
	}
}

require get_template_directory() . '/inc/aq_resizer.php';

if ( ! function_exists( 'whispli_resize_image' ) ) {
	function whispli_resize_image( $url, $width = null, $height = null, $crop = true, $single = true, $upscale = true ) {
		if ( ! aq_resize( $url, $width, $height, $crop, $single, $upscale ) ) {
			return $url;
		}

		return aq_resize( $url, $width, $height, $crop, $single, $upscale );
	}
}

if (!function_exists('mt_general_settings_facebook_link')) {
	function mt_general_settings_facebook_link() {
		$value = esc_attr( get_option( 'facebook_link' ) );
		echo '<input type="text" style="width: 80%;" id="facebook_link" class="regular-text" name="facebook_link" value="' . $value . '" />';

	}
}

if (!function_exists('mt_general_settings_twitter_link')) {
	function mt_general_settings_twitter_link() {
		$value = esc_attr( get_option( 'twitter_link' ) );
		echo '<input type="text" style="width: 80%;" id="twitter_link" class="regular-text" name="twitter_link" value="' . $value . '" />';

	}
}

if (!function_exists('mt_general_settings_linkedin_link')) {
	function mt_general_settings_linkedin_link() {
		$value = esc_attr( get_option( 'linkedin_link' ) );
		echo '<input type="text" style="width: 80%;" id="linkedin_link" class="regular-text" name="linkedin_link" value="' . $value . '" />';
	}
}

if (!function_exists('mt_general_settings_hotline')) {
	function mt_general_settings_hotline() {
		$value = esc_attr( get_option( 'hotline' ) );
		echo '<textarea type="text" style="width: 80%;" rows="5" id="hotline" name="hotline" value="">' . $value . '</textarea>';
	}
}

if (!function_exists('mt_general_settings_google_analytic')) {
	function mt_general_settings_google_analytic() {
		$value = esc_attr( get_option( 'google_analytic' ) );
		echo '<input type="text" style="width: 80%;" id="google_analytic" class="regular-text" name="google_analytic" value="' . $value . '" />';
	}
}

add_filter( 'whitelist_options', 'mt_whitelist_options' );
function mt_whitelist_options( $whitelist_options ) {
	$whitelist_options['general'][] = 'facebook_link';
	$whitelist_options['general'][] = 'twitter_link';
	$whitelist_options['general'][] = 'linkedin_link';
	$whitelist_options['general'][] = 'footer_quote';
	$whitelist_options['general'][] = 'google_analytic';

	return $whitelist_options;
}

add_filter('show_admin_bar', '__return_false');

function mt_scripts() {

	$version = '2.0';

	wp_enqueue_style( 'mt-primary-style', get_template_directory_uri() . '/assets/style/style.css');

	wp_enqueue_style( 'mt-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mt-jquery', get_template_directory_uri() . '/assets/js/jquery-1.11.2.min.js', array(), $version, true );
	wp_enqueue_script( 'mt-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(), $version, true );
wp_enqueue_script( 'mt-equalheight', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array(), $version, true );


	wp_register_script( 'mt-main', get_template_directory_uri() . '/assets/js/main.js', array(), $version, true );


	wp_enqueue_script( 'mt-main' );
}

add_action( 'wp_enqueue_scripts', 'mt_scripts' );
function add_custom_types_to_tax( $query ) {
if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

// Get all your post types
$post_types = get_post_types();

$query->set( 'post_type', $post_types );
return $query;
}
}


add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

add_filter( 'pre_get_posts', 'my_get_posts' );

		function my_get_posts( $query ) {

			if ( ( is_home() && $query->is_main_query() ) || is_feed() )
			$query->set( 'post_type', array( 'post', 'product' ) );

		return $query;
		}


// Related Posts Function, matches posts by tags - call using joints_related_posts(); )
function joints_related_posts() {
    global $post;
    $tags = wp_get_post_tags( $post->ID );

    if($tags) {
        foreach( $tags as $tag ) {
            $tag_arr .= $tag->slug . ',';
        }

        $args = array(
        	'post_type' => 'product',
            'tag' => $tag_arr,
            'numberposts' => 6, /* You can change this to show more */
            'post__not_in' => array($post->ID)
        );
        $related_posts = get_posts( $args );
        
        if($related_posts) {
        echo '<h4 style="border-top: 3px solid #686868;">CÁC BÀI VIẾT LIÊN QUAN</h4>';
        echo '<div class="joints-related-posts related_posts row">';
            foreach ( $related_posts as $post ) : setup_postdata( $post );  $acf_fields_product = get_fields(); ?>
                   
                     <div class="grid_3" style="margin-top:15px;margin-bottom: 15px;">
	                                    <div class="block1">
											<?php if ( has_post_thumbnail() ) { ?>
											<div class="feature-image"><a href="<?php the_permalink(); ?>">
												<?php $product_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ) ;

												?>
												<img src="<?php echo whispli_resize_image($product_thumbnail_src[0]); ?>" alt=""></a>
											</div>
											<?php } else {?>
											<div class="feature-image">
												<img src="<?php echo get_template_directory_uri()?>/assets/img/blog_placeholder.png" alt="">
												
											</div>
											<?php } ?>
	                                         <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
	                                          <div class="brief"> <?php the_excerpt () ?></div>
	                                        <div class="price"><?php echo $acf_fields_product['gia'] ?><span><?php echo $acf_fields_product['khuyenmai'] ?></span></div>
	                                        <a href="<?php the_permalink(); ?>" class="btn" >chi tiết</a>
	                                    </div>
	                                </div>
            <?php endforeach; }
            }
    wp_reset_postdata();
    echo '</div>';
}
