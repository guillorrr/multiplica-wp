<?php

// Register Custom Post Type Custom Post
// Post Type Key: Custom Post
function multiplica_custom_post_type()
{

	$labels = array(
		'name' => _x('Custom Posts', 'Post Type General Name', 'multiplica'),
		'singular_name' => _x('Custom Post', 'Post Type Singular Name', 'multiplica'),
		'menu_name' => _x('Custom Posts', 'Admin Menu text', 'multiplica'),
		'name_admin_bar' => _x('Custom Post', 'Add New on Toolbar', 'multiplica'),
		'archives' => __('Custom Post', 'multiplica'),
		'attributes' => __('Custom Post', 'multiplica'),
		'parent_item_colon' => __('Custom Post', 'multiplica'),
		'all_items' => __('All Custom Posts', 'multiplica'),
		'add_new_item' => __('Add New Custom Post', 'multiplica'),
		'add_new' => __('Add New', 'multiplica'),
		'new_item' => __('New Custom Post', 'multiplica'),
		'edit_item' => __('Edit Custom Post', 'multiplica'),
		'update_item' => __('Update Custom Post', 'multiplica'),
		'view_item' => __('View Custom Post', 'multiplica'),
		'view_items' => __('View Custom Posts', 'multiplica'),
		'search_items' => __('Search Custom Post', 'multiplica'),
		'not_found' => __('Not found', 'multiplica'),
		'not_found_in_trash' => __('Not found in Trash', 'multiplica'),
		'featured_image' => __('Featured Image', 'multiplica'),
		'set_featured_image' => __('Set featured image', 'multiplica'),
		'remove_featured_image' => __('Remove featured image', 'multiplica'),
		'use_featured_image' => __('Use as featured image', 'multiplica'),
		'insert_into_item' => __('Insert into Custom Post', 'multiplica'),
		'uploaded_to_this_item' => __('Uploaded to this Custom Post', 'multiplica'),
		'items_list' => __('Custom Posts list', 'multiplica'),
		'items_list_navigation' => __('Custom Posts list navigation', 'multiplica'),
		'filter_items_list' => __('Filter Custom Posts list', 'multiplica'),
	);

	$args = array(
		'label' => __('Custom Post', 'multiplica'),
		'description' => __('description', 'multiplica'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-appearance',
		'supports' => array(),
		'taxonomies' => array(),
		'hierarchical' => false,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'has_archive' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'can_export' => true,
		'show_in_nav_menus' => true,
		'menu_position' => 5,
		'capability_type' => 'post',
		'show_in_rest' => true,
	);

	register_post_type('custom_post_type', $args);
}
// REMOVE COMMENT TO ACTIVE
// add_action('init', 'multiplica_custom_post_type', 0);

// Register Taxonomy Custom Taxonomy
// Taxonomy Key: custom_taxonomy
function multiplica_custom_taxonomy_tax()
{
	$labels = array(
		'name'              => _x('Custom Taxonomies', 'taxonomy general name', 'textdomain'),
		'singular_name'     => _x('Custom Taxonomy', 'taxonomy singular name', 'textdomain'),
		'search_items'      => __('Search Custom Taxonomies', 'textdomain'),
		'all_items'         => __('All Custom Taxonomies', 'textdomain'),
		'parent_item'       => __('Parent Custom Taxonomy', 'textdomain'),
		'parent_item_colon' => __('Parent Custom Taxonomy:', 'textdomain'),
		'edit_item'         => __('Edit Custom Taxonomy', 'textdomain'),
		'update_item'       => __('Update Custom Taxonomy', 'textdomain'),
		'add_new_item'      => __('Add New Custom Taxonomy', 'textdomain'),
		'new_item_name'     => __('New Custom Taxonomy Name', 'textdomain'),
		'menu_name'         => __('Custom Taxonomy', 'textdomain'),
	);

	$args = array(
		'labels' => $labels,
		'description' => __('', 'textdomain'),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
	);
	register_taxonomy('custom_taxonomy', array('post', 'page'), $args);
}
add_action('init', 'multiplica_custom_taxonomy_tax');