<?php
add_action( 'vc_before_init', 'inspiry_shortcodes_integration' );
function inspiry_shortcodes_integration() {

    /**
     * Force Visual Composer to initialize as "built into the theme".
     * This will hide certain tabs under the Settings->Visual Composer page
     */
    vc_set_as_theme();

    /* Home News shortcode Visual Composer Element */
    vc_map( array(
        "name" => esc_html__( "Home News", "framework" ),
        "description" => esc_html__( "List of News", "framework" ),
        "base" => "home_news",
        "category" => esc_html__( "Theme", "framework" ),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Number of News", "framework" ),
                "param_name" => "number_of_posts",
                "value" => array(
                    esc_html__('All','framework') => -1,
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                    '10' => 10,
                    '11' => 11,
                    '12' => 12,
                ),
                'admin_label' => true,
            )
        )
    ) );

    /* Home Doctors shortcode Visual Composer Element */
    vc_map( array(
        "name" => esc_html__( "Home Doctors", "framework" ),
        "description" => esc_html__( "List of Doctors", "framework" ),
        "base" => "home_doctors",
        "category" => esc_html__( "Theme", "framework" ),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Number of Columns to Display", "framework" ),
                "param_name" => "number_of_columns",
                "value" => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4
                ),
                'admin_label' => true
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Number of Doctors To Display", "framework" ),
                "param_name" => "number_of_doctors",
                "value" => array(
                    esc_html__('All','framework') => -1,
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                    '10' => 10,
                    '11' => 11,
                    '12' => 12
                ),
                'admin_label' => true
            )
        )
    ) );

    /* Appointment Form Shortcode element for Visual Composer */
    vc_map( array(
        "name" => esc_html__( "Appointment Form", "framework" ),
        "description" => esc_html__( "Appointment Form Shortcode", "framework" ),
        "base" => "appointment_form",
        "category" => esc_html__( "Theme", "framework" )
    ) );
}
?>