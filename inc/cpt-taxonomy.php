<?php

/**
 * Registering CPT and Taxonomies
 *
 * @package Fetch
 */

function fetch_register_custom_post_types()
{
	// Register staff
	$labels = array(
		'name'                  => _x('Staff', 'post type general name'),
		'singular_name'         => _x('Staff', 'post type singular name'),
		'menu_name'             => _x('Staff', 'admin menu'),
		'name_admin_bar'        => _x('Staff', 'add new on admin bar'),
		'add_new'               => _x('Add New', 'staff'),
		'add_new_item'          => __('Add New Staff'),
		'new_item'              => __('New Staff'),
		'edit_item'             => __('Edit Staff'),
		'view_item'             => __('View Staff'),
		'all_items'             => __('All Staff'),
		'search_items'          => __('Search Staff'),
		'parent_item_colon'     => __('Parent Staff:'),
		'not_found'             => __('No staff found.'),
		'not_found_in_trash'    => __('No staff found in Trash.'),
		'archives'              => __('Staff Archives'),
		'insert_into_item'      => __('Insert into staff'),
		'uploaded_to_this_item' => __('Uploaded to this staff'),
		'filter_item_list'      => __('Filter staff list'),
		'items_list_navigation' => __('Staff list navigation'),
		'items_list'            => __('Staff list'),
		'featured_image'        => __('Staff featured image'),
		'set_featured_image'    => __('Set staff featured image'),
		'remove_featured_image' => __('Remove staff featured image'),
		'use_featured_image'    => __('Use as featured image'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_admin_bar'  => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'staff'),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-businessperson',
		'supports'           => array('title',),
		// Editor disabled
	);

	register_post_type('fetch-staff', $args);


	// Register Testimonials
	$labels = array(
		'name'                  => _x('Testimonials', 'post type general name'),
		'singular_name'         => _x('Testimonial', 'post type singular name'),
		'menu_name'             => _x('Testimonials', 'admin menu'),
		'name_admin_bar'        => _x('Testimonial', 'add new on admin bar'),
		'add_new'               => _x('Add New', 'testimonial'),
		'add_new_item'          => __('Add New Testimonial'),
		'new_item'              => __('New Testimonial'),
		'edit_item'             => __('Edit Testimonial'),
		'view_item'             => __('View Testimonial'),
		'all_items'             => __('All Testimonials'),
		'search_items'          => __('Search Testimonials'),
		'parent_item_colon'     => __('Parent Testimonial:'),
		'not_found'             => __('No testimonials found.'),
		'not_found_in_trash'    => __('No testimonials found in Trash.'),
		'archives'              => __('Testimonial Archives'),
		'insert_into_item'      => __('Insert into testimonial'),
		'uploaded_to_this_item' => __('Uploaded to this testimonial'),
		'filter_item_list'      => __('Filter testimonial list'),
		'items_list_navigation' => __('Testimonial list navigation'),
		'items_list'            => __('Testimonial list'),
		'featured_image'        => __('Testimonial featured image'),
		'set_featured_image'    => __('Set testimonial featured image'),
		'remove_featured_image' => __('Remove testimonial featured image'),
		'use_featured_image'    => __('Use as featured image'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => false,
		// setting this to false means a user cannot
		// view a testimonial as a separate page
		// it also disables the archive
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_admin_bar'  => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'testimonial'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-businessperson',
		'supports'           => array('title',),
		// Editor disabled
	);

	register_post_type('fetch-testimonial', $args);

	// Register faq
	$labels = array(
		'name'                  => _x('FAQ', 'post type general name'),
		'singular_name'         => _x('FAQ', 'post type singular name'),
		'menu_name'             => _x('FAQ', 'admin menu'),
		'name_admin_bar'        => _x('FAQ', 'add new on admin bar'),
		'add_new'               => _x('Add New', 'FAQ'),
		'add_new_item'          => __('Add New FAQ'),
		'new_item'              => __('New FAQ'),
		'edit_item'             => __('Edit FAQ'),
		'view_item'             => __('View FAQ'),
		'all_items'             => __('All FAQ'),
		'search_items'          => __('Search FAQ'),
		'parent_item_colon'     => __('Parent FAQ:'),
		'not_found'             => __('No FAQ found.'),
		'not_found_in_trash'    => __('No FAQ found in Trash.'),
		'archives'              => __('FAQ Archives'),
		'insert_into_item'      => __('Insert into FAQ'),
		'uploaded_to_this_item' => __('Uploaded to this FAQ'),
		'filter_item_list'      => __('Filter FAQ list'),
		'items_list_navigation' => __('FAQ list navigation'),
		'items_list'            => __('FAQ list'),
		'featured_image'        => __('FAQ featured image'),
		'set_featured_image'    => __('Set FAQ featured image'),
		'remove_featured_image' => __('Remove FAQ featured image'),
		'use_featured_image'    => __('Use as featured image'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_admin_bar'  => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'faq'),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 8,
		'menu_icon'          => 'dashicons-info-outline',
		'supports'           => array('title',),
		// Editor Disabled
		'template_lock'      => 'all'
	);

	register_post_type('fetch-faq', $args);
}

add_action('init', 'fetch_register_custom_post_types');

function fetch_register_taxonomies()
{
	// Add Staff Type Taxonomy
	$labels = array(
		'name'              => _x('Staff Types', 'taxonomy general name'),
		'singular_name'     => _x('Staff Type', 'taxonomy singular name'),
		'search_items'      => __('Search Staff Types'),
		'all_items'         => __('All Staff Type'),
		'parent_item'       => __('Parent Staff Type'),
		'parent_item_colon' => __('Parent Staff Type:'),
		'edit_item'         => __('Edit Staff Type'),
		'view_item'         => __('View Staff Type'),
		'update_item'       => __('Update Staff Type'),
		'add_new_item'      => __('Add New Staff Type'),
		'new_item_name'     => __('New Staff Type Name'),
		'menu_name'         => __('Staff Type'),
	);
	$args = array(
		'hierarchical'      => true,
		// hierarchical true = categories / false = tags
		'labels'            => $labels,
		'show_ui'           => true,
		'show_in_menu'      => true,
		'show_in_nav_menu'  => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'staff-type'),
	);
	register_taxonomy('fetch-staff-type', array('fetch-staff'), $args);

	// Add Featured Testimonial Taxonomy
	$labels = array(
		'name'              => _x('Featured Testimonials', 'taxonomy general name'),
		'singular_name'     => _x('Featured Testimonial', 'taxonomy singular name'),
		'search_items'      => __('Search Featured Testimonials'),
		'all_items'         => __('All Featured Testimonials'),
		'parent_item'       => __('Parent Featured Testimonial'),
		'parent_item_colon' => __('Parent Featured Testimonial:'),
		'edit_item'         => __('Edit Featured Testimonial'),
		'view_item'         => __('View Featured Testimonial'),
		'update_item'       => __('Update Featured Testimonial'),
		'add_new_item'      => __('Add New Featured Testimonial'),
		'new_item_name'     => __('New Featured Testimonial Name'),
		'menu_name'         => __('Featured Testimonial'),
	);
	$args = array(
		'hierarchical'      => false,
		// hierarchical true = categories / false = tags
		'publicly_queryable' => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_in_menu'      => true,
		'show_in_nav_menu'  => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'testimonial-featured'),
	);
	register_taxonomy('fetch-featured', array('fetch-testimonial'), $args);

	// Add FAQ Type Taxonomy
	$labels = array(
		'name'              => _x('FAQ Types', 'taxonomy general name'),
		'singular_name'     => _x('FAQ Type', 'taxonomy singular name'),
		'search_items'      => __('Search FAQ Types'),
		'all_items'         => __('All FAQ Type'),
		'parent_item'       => __('Parent FAQ Type'),
		'parent_item_colon' => __('Parent FAQ Type:'),
		'edit_item'         => __('Edit FAQ Type'),
		'view_item'         => __('View FAQ Type'),
		'update_item'       => __('Update FAQ Type'),
		'add_new_item'      => __('Add New FAQ Type'),
		'new_item_name'     => __('New FAQ Type Name'),
		'menu_name'         => __('FAQ Type'),
	);
	$args = array(
		'hierarchical'      => true,
		// hierarchical true = categories / false = tags
		'publicly_queryable' => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_in_menu'      => true,
		'show_in_nav_menu'  => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'faq-type'),
	);
	register_taxonomy('fetch-faq-type', array('fetch-faq'), $args);
}

add_action('init', 'fetch_register_taxonomies');


function fetch_rewrite_flush()
{
	// Automatic flushing on theme switch
	fetch_register_custom_post_types();
	flush_rewrite_rules();
	fetch_register_taxonomies();
}

add_action('after_switch_theme', 'fetch_rewrite_flush');
