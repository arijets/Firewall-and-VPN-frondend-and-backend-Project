<?php

/* Create the Service Custom Post Type */
if (!function_exists('create_service_post_type')) {
    function create_service_post_type()
    {
        $labels = array(
            'name' => esc_html__( 'Services','framework'),
            'singular_name' => esc_html__( 'Service','framework' ),
            'add_new' => esc_html__('Add New','framework'),
            'add_new_item' => esc_html__('Add New Service','framework'),
            'edit_item' => esc_html__('Edit Service','framework'),
            'new_item' => esc_html__('New Service','framework'),
            'view_item' => esc_html__('View Service','framework'),
            'search_items' => esc_html__('Search Service','framework'),
            'not_found' =>  esc_html__('No Service found','framework'),
            'not_found_in_trash' => esc_html__('No Service found in Trash','framework'),
            'parent_item_colon' => ''
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_icon' => 'dashicons-portfolio',
            'menu_position' => 5,
            'supports' => array('title','editor', 'excerpt', 'thumbnail'),
            'rewrite' => array( 'slug' => apply_filters( 'inspiry_filter_slugs', esc_html__('service', 'framework'), 'service_slugs' ) ),
            'show_in_rest' => true,
            'rest_base' => apply_filters( 'inspiry_service_rest_base', esc_html__( 'service', 'framework' ) )
        );

        register_post_type('service', $args);
    }
}
add_action('init', 'create_service_post_type');


?>