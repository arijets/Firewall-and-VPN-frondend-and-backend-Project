<?php

/* Create the Gallery Item Custom Post Type */
if (!function_exists('create_gallery_post_type')) {
    function create_gallery_post_type()
    {
        $labels = array(
            'name' => esc_html__( 'Gallery Items','framework'),
            'singular_name' => esc_html__( 'Gallery Item','framework' ),
            'add_new' => esc_html__('Add New','framework'),
            'add_new_item' => esc_html__('Add New Gallery Item','framework'),
            'edit_item' => esc_html__('Edit Gallery Item','framework'),
            'new_item' => esc_html__('New Gallery Item','framework'),
            'view_item' => esc_html__('View Gallery Item','framework'),
            'search_items' => esc_html__('Search Gallery Items','framework'),
            'not_found' => esc_html__('No Gallery Item found','framework'),
            'not_found_in_trash' => esc_html__('No Gallery Item found in Trash','framework'),
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
            'menu_icon' => 'dashicons-images-alt',
            'menu_position' => 5,
            'supports' => array('title','editor','thumbnail'),
            'rewrite' => array( 'slug' => apply_filters( 'inspiry_filter_slugs', esc_html__('gallery-item', 'framework'), 'gallery_slugs' ) ),
            'show_in_rest' => true,
            'rest_base' => apply_filters( 'inspiry_gallery-item_rest_base', esc_html__( 'gallery-item', 'framework' ) )
        );

        register_post_type('gallery-item', $args);
    }
}
add_action('init', 'create_gallery_post_type');


/* Create Gallery Item Type Taxonomy */
if (!function_exists('create_gallery_item_type_taxonomy')) {
    function create_gallery_item_type_taxonomy()
    {
        $labels = array(
            'name' => esc_html__( 'Gallery Item Types', 'framework' ),
            'singular_name' => esc_html__( 'Gallery Item Type', 'framework' ),
            'search_items' =>  esc_html__( 'Search Gallery Item Types', 'framework' ),
            'popular_items' => esc_html__( 'Popular Gallery Item Types', 'framework' ),
            'all_items' => esc_html__( 'All Gallery Item Types', 'framework' ),
            'parent_item' => esc_html__( 'Parent Gallery Item Type', 'framework' ),
            'parent_item_colon' => esc_html__( 'Parent Gallery Item Type:', 'framework' ),
            'edit_item' => esc_html__( 'Edit Gallery Item Type', 'framework' ),
            'update_item' => esc_html__( 'Update Gallery Item Type', 'framework' ),
            'add_new_item' => esc_html__( 'Add New Gallery Item Type', 'framework' ),
            'new_item_name' => esc_html__( 'New Gallery Item Type Name', 'framework' ),
            'separate_items_with_commas' => esc_html__( 'Separate Gallery Item Types with commas', 'framework' ),
            'add_or_remove_items' => esc_html__( 'Add or Remove Gallery Item Types', 'framework' ),
            'choose_from_most_used' => esc_html__( 'Choose from the most used Gallery Item Types', 'framework' ),
            'menu_name' => esc_html__( 'Gallery Item Types', 'framework' )
        );

        register_taxonomy(
            'gallery-item-type',
            array( 'gallery-item' ),
            array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => esc_html__('gallery-item-type', 'framework')),
                'show_in_rest' => true,
                'rest_base' => apply_filters( 'inspiry_gallery-item-type_rest_base', esc_html__( 'gallery-item-type', 'framework' ) )
            )
        );
    }
}
add_action('init', 'create_gallery_item_type_taxonomy', 0);


/* Add Custom Columns */
if (!function_exists('gallery_edit_columns')) {
    function gallery_edit_columns($columns)
    {
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => esc_html__('Gallery Item Title', 'framework'),
            "gallery-thumb" => esc_html__('Thumbnail', 'framework'),
            "type" => esc_html__('Gallery Item Type', 'framework'),
            "date" => esc_html__('Publish Time', 'framework')
        );
        return $columns;
    }
}
add_filter("manage_edit-gallery-item_columns", "gallery_edit_columns");

if (!function_exists('gallery_custom_columns')) {
    function gallery_custom_columns($column)
    {
        global $post;
        switch ($column) {
            case 'gallery-thumb':
                if (has_post_thumbnail($post->ID)) {
                    ?>
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                <?php
                } else {
                    esc_html_e('No Thumbnail', 'framework');
                }
                break;

            case 'type':
                echo get_the_term_list($post->ID, 'gallery-item-type', '', ', ', '');
                break;
        }
    }
}

add_action("manage_posts_custom_column", "gallery_custom_columns");

?>