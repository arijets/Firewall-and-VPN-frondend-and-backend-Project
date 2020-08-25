<?php

/* Create the Faq Custom Post Type */
if (!function_exists('create_faq_post_type')) {
    function create_faq_post_type()
    {

        $labels = array(
            'name' => esc_html__( 'FAQs','framework'),
            'singular_name' => esc_html__( 'FAQ','framework' ),
            'add_new' => esc_html__('Add New','framework'),
            'add_new_item' => esc_html__('Add New FAQ','framework'),
            'edit_item' => esc_html__('Edit FAQ','framework'),
            'new_item' => esc_html__('New FAQ','framework'),
            'view_item' => esc_html__('View FAQ','framework'),
            'search_items' => esc_html__('Search FAQ','framework'),
            'not_found' =>  esc_html__('No FAQs found','framework'),
            'not_found_in_trash' => esc_html__('No FAQs found in Trash','framework'),
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
            'menu_icon' => 'dashicons-format-chat',
            'menu_position' => 5,
            'supports' => array('title','editor'),
            'show_in_rest' => true,
            'rest_base' => apply_filters( 'inspiry_faq_rest_base', esc_html__( 'faq', 'framework' ) )
        );

        register_post_type('faq', $args);
    }
}
add_action('init', 'create_faq_post_type');

/* Create FAQ Group Taxonomy */
if (!function_exists('create_faq_group_taxonomy')) {
    function create_faq_group_taxonomy()
    {
        $labels = array(
            'name' => esc_html__( 'FAQ Groups', 'framework' ),
            'singular_name' => esc_html__( 'FAQ Group', 'framework' ),
            'search_items' =>  esc_html__( 'Search FAQ Groups', 'framework' ),
            'popular_items' => esc_html__( 'Popular FAQ Groups', 'framework' ),
            'all_items' => esc_html__( 'All FAQ Groups', 'framework' ),
            'parent_item' => esc_html__( 'Parent FAQ Group', 'framework' ),
            'parent_item_colon' => esc_html__( 'Parent FAQ Group:', 'framework' ),
            'edit_item' => esc_html__( 'Edit FAQ Group', 'framework' ),
            'update_item' => esc_html__( 'Update FAQ Group', 'framework' ),
            'add_new_item' => esc_html__( 'Add New FAQ Group', 'framework' ),
            'new_item_name' => esc_html__( 'New FAQ Group Name', 'framework' ),
            'separate_items_with_commas' => esc_html__( 'Separate FAQ Groups with commas', 'framework' ),
            'add_or_remove_items' => esc_html__( 'Add or Remove FAQ Groups', 'framework' ),
            'choose_from_most_used' => esc_html__( 'Choose from the most used FAQ Groups', 'framework' ),
            'menu_name' => esc_html__( 'FAQ Groups', 'framework' )
        );

        register_taxonomy(
            'faq-group',
            array( 'faq' ),
            array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => esc_html__('faq-group', 'framework')),
                'show_in_rest' => true,
                'rest_base' => apply_filters( 'inspiry_faq-group_rest_base', esc_html__( 'faq-group', 'framework' ) )
            )
        );
    }
}
add_action('init', 'create_faq_group_taxonomy', 0);


?>