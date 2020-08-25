<?php

/* Create the Testimonial Custom Post Type */
if (!function_exists('create_testimonial_post_type')) {
    function create_testimonial_post_type()
    {
        $labels = array(
            'name' => esc_html__( 'Testimonials','framework'),
            'singular_name' => esc_html__( 'Testimonial','framework' ),
            'add_new' => esc_html__('Add New','framework'),
            'add_new_item' => esc_html__('Add New Testimonial','framework'),
            'edit_item' => esc_html__('Edit Testimonial','framework'),
            'new_item' => esc_html__('New Testimonial','framework'),
            'view_item' => esc_html__('View Testimonial','framework'),
            'search_items' => esc_html__('Search Testimonial','framework'),
            'not_found' => esc_html__('No Testimonial found','framework'),
            'not_found_in_trash' => esc_html__('No Testimonial found in Trash','framework'),
            'parent_item_colon' => ''
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'show_ui' => true,
            'query_var' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_icon' => 'dashicons-testimonial',
            'menu_position' => 5,
            'supports' => array('title','thumbnail'),
            'show_in_rest' => true,
            'rest_base' => apply_filters( 'inspiry_testimonial_rest_base', esc_html__( 'testimonial', 'framework' ) )
        );

        register_post_type('testimonial',$args);
    }
}

add_action('init', 'create_testimonial_post_type');
?>