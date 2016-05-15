<?php
add_action( 'init', 'codex_product_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_product_init() {
	$labels = array(
		'name'               => _x( 'Products', 'post type general name', 'whispli' ),
		'singular_name'      => _x( 'Product', 'post type singular name', 'whispli' ),
		'menu_name'          => _x( 'Products', 'admin menu', 'whispli' ),
		'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'whispli' ),
		'add_new'            => _x( 'Add New', 'book', 'whispli' ),
		'add_new_item'       => __( 'Add New Product', 'whispli' ),
		'new_item'           => __( 'New Product', 'whispli' ),
		'edit_item'          => __( 'Edit Product', 'whispli' ),
		'view_item'          => __( 'View Product', 'whispli' ),
		'all_items'          => __( 'All Products', 'whispli' ),
		'search_items'       => __( 'Search Products', 'whispli' ),
		'parent_item_colon'  => __( 'Parent Products:', 'whispli' ),
		'not_found'          => __( 'No products found.', 'whispli' ),
		'not_found_in_trash' => __( 'No products found in Trash.', 'whispli' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'whispli' ),
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
		'taxonomies'         => array( 'post_tag' )
	);

	register_post_type( 'product', $args );
}