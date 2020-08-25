<?php
/**
 * Add Widget Areas
 */
if ( function_exists( 'register_sidebar' ) ) {

	// Location: Default Sidebar
	register_sidebar( array(
		'id'            => 'default',
		'name'          => esc_html__( 'Default Sidebar', 'framework' ),
		'description'   => esc_html__( 'This sidebar is for blog page, blog posts and pages that use default template.', 'framework' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	) );

	// Location: Service Detail Page Sidebar
	register_sidebar( array(
		'id'            => 'service-detail-page',
		'name'          => esc_html__( 'Service Detail Page', 'framework' ),
		'description'   => esc_html__( 'This sidebar is for service detail page.', 'framework' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	) );

	if ( class_exists( 'woocommerce' ) ) {
		// Location: Shop page sidebar
		register_sidebar( array(
			'id'            => 'shop',
			'name'          => esc_html__( 'Shop Page', 'framework' ),
			'description'   => esc_html__( 'This sidebar is for WooCommerce shop page.', 'framework' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>'
		) );
	}

	// Location: Footer First Column
	register_sidebar( array(
		'id'            => 'footer-1st-column',
		'name'          => esc_html__( 'Footer First Column', 'framework' ),
		'description'   => esc_html__( 'This represents the 1st column widget area in footer.', 'framework' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	) );

	// Location: Footer Second Column
	register_sidebar( array(
		'id'            => 'footer-2nd-column',
		'name'          => esc_html__( 'Footer Second Column', 'framework' ),
		'description'   => esc_html__( 'This represents the 2nd column widget area in footer.', 'framework' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	) );

	// Location: Footer Third Column
	register_sidebar( array(
		'id'            => 'footer-3rd-column',
		'name'          => esc_html__( 'Footer Third Column', 'framework' ),
		'description'   => esc_html__( 'This represents the 3rd column widget area in footer.', 'framework' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	) );

	// Location: Footer Fourth Column
	register_sidebar( array(
		'id'            => 'footer-4th-column',
		'name'          => esc_html__( 'Footer Fourth Column', 'framework' ),
		'description'   => esc_html__( 'This represents the 4th column widget area in footer.', 'framework' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	) );
}