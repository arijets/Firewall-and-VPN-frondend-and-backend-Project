<?php

/* Create the Doctor Custom Post Type */
if (!function_exists('create_doctor_post_type')) {
    function create_doctor_post_type()
    {
        $labels = array(
            'name' => esc_html__( 'Doctors','framework'),
            'singular_name' => esc_html__( 'Doctor','framework' ),
            'add_new' => esc_html__('Add New','framework'),
            'add_new_item' => esc_html__('Add New Doctor','framework'),
            'edit_item' => esc_html__('Edit Doctor','framework'),
            'new_item' => esc_html__('New Doctor','framework'),
            'view_item' => esc_html__('View Doctor','framework'),
            'search_items' => esc_html__('Search Doctor','framework'),
            'not_found' =>  esc_html__('No Doctor found','framework'),
            'not_found_in_trash' => esc_html__('No Doctor found in Trash','framework'),
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
            'menu_icon' => 'dashicons-businessman',
            'menu_position' => 5,
            'supports' => array('title','editor','thumbnail'),
            'rewrite' => array( 'slug' => apply_filters( 'inspiry_filter_slugs', esc_html__('doctor', 'framework'), 'doctor_slugs' ) ),
	        'show_in_rest' => true,
            'rest_base' => apply_filters( 'inspiry_doctor_rest_base', esc_html__( 'doctor', 'framework' ) )
        );

        register_post_type('doctor', $args);
    }
}
add_action('init', 'create_doctor_post_type');


/* Create Doctor Type Taxonomy */
if (!function_exists('create_doctor_department_taxonomy')) {
    function create_doctor_department_taxonomy()
    {
        $department_labels = array(
            'name' => esc_html__( 'Department', 'framework' ),
            'singular_name' => esc_html__( 'Department', 'framework' ),
            'search_items' =>  esc_html__( 'Search Departments', 'framework' ),
            'popular_items' => esc_html__( 'Popular Departments', 'framework' ),
            'all_items' => esc_html__( 'All Departments', 'framework' ),
            'parent_item' => esc_html__( 'Parent Department', 'framework' ),
            'parent_item_colon' => esc_html__( 'Parent Department:', 'framework' ),
            'edit_item' => esc_html__( 'Edit Department', 'framework' ),
            'update_item' => esc_html__( 'Update Department', 'framework' ),
            'add_new_item' => esc_html__( 'Add New Department', 'framework' ),
            'new_item_name' => esc_html__( 'New Department Name', 'framework' ),
            'separate_items_with_commas' => esc_html__( 'Separate Departments with commas', 'framework' ),
            'add_or_remove_items' => esc_html__( 'Add or remove Departments', 'framework' ),
            'choose_from_most_used' => esc_html__( 'Choose from the most used Departments', 'framework' ),
            'menu_name' => esc_html__( 'Departments', 'framework' )
        );

        register_taxonomy(
            'department',
            array( 'doctor' ),
            array(
                'hierarchical' => true,
                'labels' => $department_labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => esc_html__('department', 'framework')),
                'show_in_rest' => true,
                'rest_base' => apply_filters( 'inspiry_department_rest_base', esc_html__( 'department', 'framework' ) )
            )
        );
    }
}

add_action('init', 'create_doctor_department_taxonomy', 0);

/* Add Custom Columns */
if (!function_exists('doctor_edit_columns')) {
    function doctor_edit_columns($columns)
    {

        $columns = array(
            "cb" => '<input type="checkbox" >',
            "title" => esc_html__( 'Doctor Name','framework' ),
            "doc_thumb" => esc_html__( 'Thumbnail','framework' ),
            "education" => esc_html__('Education','framework'),
            "date" => esc_html__( 'Date','framework' )
        );

        return $columns;
    }
}

add_filter("manage_edit-doctor_columns", "doctor_edit_columns");

if (!function_exists('doctor_custom_columns')) {
    function doctor_custom_columns($column){
        global $post;
        switch ($column)
        {
            case 'doc_thumb':
                if(has_post_thumbnail($post->ID)){
                    the_post_thumbnail('thumbnail');
                }
                else{
                    esc_html_e('No Thumbnail','framework');
                }
                break;
            case 'education':
                $education = get_post_meta($post->ID,'doctor_education',true);
                if(!empty($education))
                {
                    echo $education;
                }
                else
                {
                    esc_html_e('NA','framework');
                }
                break;
        }
    }
}
add_action("manage_posts_custom_column", "doctor_custom_columns");

?>