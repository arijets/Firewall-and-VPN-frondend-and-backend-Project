<?php
/**
 * Register meta boxes
 */

add_filter( 'rwmb_meta_boxes', 'inspiry_register_meta_boxes' );

if( !function_exists( 'inspiry_register_meta_boxes' ) ) {
    function inspiry_register_meta_boxes() {

        // Make sure there's no errors when the plugin is deactivated or during upgrade
        if (!class_exists('RW_Meta_Box')) {
            return;
        }

        $meta_boxes = array();
        $prefix = 'MEDICAL_META_';


        // Video Meta Box
        $meta_boxes[] = array(
            'id' => 'video-meta-box',
            'title' => esc_html__('Video Information', 'framework'),
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'show' => array(
            	'post_format' => array('Video')
            ),
            'fields' => array(
                array(
                    'name' => esc_html__('Video Embed Code', 'framework'),
                    'desc' => esc_html__('Provide the video embed code and remove the width and height attributes.', 'framework'),
                    'id' => "{$prefix}embed_code",
                    'type' => 'textarea',
                    'cols' => '20',
                    'rows' => '3'
                )
            )
        );


        // Link Meta Box
        $meta_boxes[] = array(
            'id' => 'url-meta-box',
            'title' => esc_html__('Link Information', 'framework'),
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'show' => array(
	            'post_format' => array('Link')
            ),
            'fields' => array(
                array(
                    'name' => esc_html__('Link Title Text', 'framework'),
                    'id' => "{$prefix}link_text",
                    'desc' => '',
                    'type' => 'text'
                ),
                array(
                    'name' => esc_html__('Link URL', 'framework'),
                    'id' => "{$prefix}link_url",
                    'desc' => '',
                    'type' => 'text'
                )
            )
        );


        // Gallery Meta Box for blog post
        $meta_boxes[] = array(
            'title' => esc_html__('Gallery Settings', 'framework'),
            'pages' => array('post'),
            'id' => 'gallery-meta-box',
            'context' => 'normal',
            'priority' => 'high',
            'show' => array(
	            'post_format' => array('Gallery')
            ),
            'fields' => array(
                array(
                    'name' => esc_html__('Gallery Images', 'framework'),
                    'id' => "{$prefix}gallery",
                    'desc' => esc_html__('An image should have minimum width of 732px and minimum height of 447px ( Bigger size images will be cropped automatically).', 'framework'),
                    'type' => 'image_advanced',
                    'max_file_uploads' => 48
                )
            )
        );

	    if ( 'reborn' == INSPIRY_DESIGN_VARIATION ) {

		    // Meta Box for single service icon
		    $meta_boxes[] = array(
			    'title' => esc_html__('Icon Settings', 'framework'),
			    'pages' => array('service'),
			    'id' => 'service-icon-meta-box',
			    'context' => 'normal',
			    'priority' => 'high',
			    'fields' => array(
				    array(
					    'name' => esc_html__('Service Icon', 'framework'),
					    'id' => "{$prefix}service_icon",
					    'desc' => esc_html__('The service icon should have minimum width and height of 64px (Bigger size icon will be adjusted proportionally).', 'framework'),
					    'type' => 'image_advanced',
					    'max_file_uploads' => 1
				    )
			    )
		    );
	    }

	    // Gallery Meta Box for service single
	    $meta_boxes[] = array(
		    'title' => esc_html__('Gallery Settings', 'framework'),
		    'pages' => array('service'),
		    'id' => 'service-gallery-meta-box',
		    'context' => 'normal',
		    'priority' => 'high',
		    'fields' => array(
			    array(
				    'name' => esc_html__('Gallery Images', 'framework'),
				    'id' => "{$prefix}gallery",
				    'desc' => esc_html__('An image should have minimum width of 848px and minimum height of 518px ( Bigger size images will be cropped automatically).', 'framework'),
				    'type' => 'image_advanced',
				    'max_file_uploads' => 48
			    )
		    )
	    );

        // Audio Meta Box
        $meta_boxes[] = array(
            'id' => 'audio-meta-box',
            'title' => esc_html__('Audio Settings', 'framework'),
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'show' => array(
	            'post_format' => array('Post')
            ),
            'fields' => array(
                array(
                    'name' => esc_html__('MP3 Audio File', 'framework'),
                    'id' => "{$prefix}audio_mp3",
                    'desc' => esc_html__('Upload the MP3 audio file.', 'framework'),
                    'type' => 'file',
                    'max_file_uploads' => 1
                ),
                array(
                    'name' => esc_html__('OGG Audio File', 'framework'),
                    'id' => "{$prefix}audio_ogg",
                    'desc' => esc_html__('Upload the OGG audio file.', 'framework'),
                    'type' => 'file',
                    'max_file_uploads' => 1
                ),
                array(
                    'name' => esc_html__('Audio Embed Code', 'framework'),
                    'desc' => esc_html__('If you do not have audio files to upload, then you can provide audio embed code here.', 'framework'),
                    'id' => "{$prefix}audio_embed_code",
                    'type' => 'textarea',
                    'cols' => '20',
                    'rows' => '3'
                )
            )
        );


        // Quote Meta Box
        $meta_boxes[] = array(
            'id' => 'quote-meta-box',
            'title' => esc_html__('Quote Information', 'framework'),
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'show' => array(
	            'post_format' => array('Quote')
            ),
            'fields' => array(
                array(
                    'name' => esc_html__('Quote Text', 'framework'),
                    'id' => "{$prefix}quote_desc",
                    'desc' => esc_html__('Provide quote text here.', 'framework'),
                    'type' => 'textarea',
                    'cols' => '20',
                    'rows' => '3'
                ),
                array(
                    'name' => esc_html__('Quote Author', 'framework'),
                    'id' => "{$prefix}quote_author",
                    'desc' => esc_html__('Provide quote author name.', 'framework'),
                    'type' => 'text',
                )
            )
        );


        // doctor meta box
        $meta_boxes[] = array(
            'id' => 'doctor-schedule-meta-box',
            'title' => esc_html__('Doctor Information', 'framework'),
            'pages' => array('doctor'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__('Speciality', 'framework'),
                    'id' => "doctor_speciality",
                    'type' => 'text'
                ),
                array(
                    'name' => esc_html__('Education', 'framework'),
                    'id' => "doctor_education",
                    'type' => 'text'
                ),
                array(
                    'name' => esc_html__('Work Days', 'framework'),
                    'id' => "doctor_work_days",
                    'type' => 'text'
                ),
                array(
                    'name' => esc_html__('Intro Text', 'framework'),
                    'desc' => esc_html__('A short introduction of doctor to display on homepage and multiple doctors listing places.', 'framework'),
                    'id' => "doctor_intro_text",
                    'type' => 'textarea'
                ),
                array(
                    'name' => esc_html__('Twitter URL', 'framework'),
                    'id' => "twitter_link",
                    'type' => 'text'

                ),
                array(
                    'name' => esc_html__('Facebook URL', 'framework'),
                    'id' => "facebook_link",
                    'type' => 'text'
                ),
	            array(
		            'name' => esc_html__('Google+ URL', 'framework'),
		            'id' => "google_plus_link",
		            'type' => 'text'
	            ),
                array(
                    'name' => esc_html__('LinkedIn URL', 'framework'),
                    'id' => "linkedin_link",
                    'type' => 'text'
                ),
	            array(
		            'name' => esc_html__('Youtube URL', 'framework'),
		            'id' => "youtube_link",
		            'type' => 'text'
	            ),
                array(
                    'name' => esc_html__('Skype Username', 'framework'),
                    'id' => "skype_username",
                    'type' => 'text'
                )
            )
        );

        // testimonial meta box
        $meta_boxes[] = array(
            'id' => 'testimonial-meta-box',
            'title' => esc_html__('Testimonial', 'framework'),
            'pages' => array('testimonial'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__('Testimonial Text', 'framework'),
                    'id' => "the_testimonial",
                    'type' => 'textarea',
                    'cols' => '20',
                    'rows' => '3'
                ),
                array(
                    'name' => esc_html__('Testimonial Author', 'framework'),
                    'id' => "testimonial_author",
                    'type' => 'text'
                ),
                array(
                    'name' => esc_html__('Testimonial Author Organization', 'framework'),
                    'id' => "testimonial_author_organization",
                    'type' => 'text'
                ),
                array(
                    'name' => esc_html__('Testimonial Author URL', 'framework'),
                    'id' => "testimonial_author_link",
                    'type' => 'text'
                )
            )
        );

        // gallery item meta box
        $meta_boxes[] = array(
            'id' => 'gallery-item-meta-box',
            'title' => esc_html__('Gallery Settings', 'framework'),
            'pages' => array('gallery-item'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__('Gallery Images', 'framework'),
                    'id' => "{$prefix}custom_gallery",
                    'desc' => esc_html__('An image should have minimum width of 670px and minimum height of 500px, Bigger size images will be cropped automatically.', 'framework'),
                    'type' => 'image_advanced',
                    'max_file_uploads' => 48
                )
            )
        );

        // page banner meta box
        $meta_boxes[] = array(
            'id' => 'page-banner-meta-box',
            'title' => esc_html__('Banner Settings', 'framework'),
            'pages' => array('page', 'post', 'gallery-item', 'service', 'faq', 'doctor'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__('Banner Image', 'framework'),
                    'id' => "{$prefix}page_banner",
                    'desc' => esc_html__('Banner image should have minimum width of 2000px and minimum height of 180px.', 'framework'),
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1
                )

            )
        );

        // apply a filter before returning meta boxes
        $meta_boxes = apply_filters('framework_theme_meta', $meta_boxes);

        return $meta_boxes;

    }
}

// Show Hide extension
if ( ! class_exists( 'RWMB_Show_Hide' ) ) {
	require_once( INSPIRY_INC_DIR . '/meta-box/meta-box-show-hide/meta-box-show-hide.php' );
}
?>