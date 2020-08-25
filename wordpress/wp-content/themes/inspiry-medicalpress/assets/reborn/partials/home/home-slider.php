<?php
global $theme_options, $allowed_html_tags;
$slides             = $theme_options['slides'];
$slider_button_text = isset( $theme_options['announcement_button_text'] ) ? $theme_options['announcement_button_text'] : esc_html__( 'Read More', 'framework' );
if ( ! empty( $slides ) ) : ?>
    <div class="home-slider">
        <div class="flexslider loading">
            <ul class="slides">
				<?php foreach ( $slides as $slide ) : ?>
                    <li>
						<?php
						if ( ! empty( $slide['title'] ) || ! empty( $slide['description'] ) || ! empty( $slide['url'] ) ) : ?>
                            <div class="home-slider-content-wrapper">
                                <div class="container">
                                    <div class="home-slider-content">
										<?php
										if ( ! empty( $slide['title'] ) ) : ?>
                                            <h2 class="home-slider-title"><?php echo wp_kses( $slide['title'], $allowed_html_tags ); ?></h2><?php
										endif;

										if ( ! empty( $slide['description'] ) ) : ?>
                                            <p class="home-slider-description"><?php echo wp_kses( $slide['description'], $allowed_html_tags ); ?></p><?php
										endif;
										?>
                                        <div class="announcement">
	                                        <?php
	                                        if ( 1 == $theme_options['display_announcement'] ) :

		                                        if ( ! empty( $theme_options['discount_amount'] ) || ! empty( $theme_options['discount_text'] ) ) : ?>
                                                    <div class="announcement-left-col">
				                                        <?php if ( ! empty( $theme_options['discount_amount'] ) ) : ?>
                                                            <span class="amount"><?php echo esc_html( $theme_options['discount_amount'] ); ?></span><span class="symbol"><?php echo esc_html( $theme_options['discount_amount_symbol'] ); ?></span>
				                                        <?php endif;

				                                        if ( ! empty( $theme_options['discount_text'] ) ) : ?>
                                                            <small><?php echo esc_html( $theme_options['discount_text'] ); ?></small>
				                                        <?php endif; ?>
                                                    </div>
			                                        <?php
		                                        endif;

		                                        if ( ! empty( $theme_options['announcement_title'] ) ) : ?>
                                                    <div class="announcement-right-col">
                                                        <h3 class="announcement-heading"><?php echo esc_html( $theme_options['announcement_title'] ); ?></h3>
                                                    </div>
			                                        <?php
		                                        endif;
	                                        endif;

	                                        if ( ! empty( $slide['url'] ) ) : ?>
                                                <a class="btn btn-primary btn-block" href="<?php echo esc_url( $slide['url'] ); ?>"><?php echo esc_html( $slider_button_text ); ?></a>
		                                        <?php
	                                        endif;
	                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
						<?php endif; ?>
                        <img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_html( $slide['title'] ); ?>">
                    </li>
				<?php endforeach; ?>
            </ul>
        </div>
    </div><!-- .home-slider -->
	<?php
else :
	get_template_part( INSPIRY_PARTIALS . '/common/banner' );
endif;
?>