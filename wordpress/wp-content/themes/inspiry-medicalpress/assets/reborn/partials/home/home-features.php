<?php
global $theme_options, $allowed_html_tags;
$features_variation_2 = $theme_options['features_variation_2'];
$features_variation_2_title = array_filter( $features_variation_2[0] );
$has_features         = ! empty( $features_variation_2 ) && ! empty( $features_variation_2_title );
if ( $has_features ) : ?>
    <div class="home-section home-features">
        <div class="container">
            <div class="row">
				<?php foreach ( $features_variation_2 as $feature ) : ?>
                    <div class="col-md-4">
                        <div class="home-features-item">
                            <div class="home-features-item-image">
								<?php
								if ( ! empty( $feature['url'] ) ) {
									echo '<a href="' . esc_url( $feature['url'] ) . '">';
									echo '<img src="' . esc_url( $feature['image'] ) . '" alt="' . esc_html( $feature['title'] ) . '"/>';
									echo '</a>';
								} else {
									echo '<img src="' . esc_url( $feature['image'] ) . '" alt="' . esc_html( $feature['title'] ) . '"/>';
								}
								?>
                            </div>
                            <div class="home-features-item-content">
                                <h3 class="home-features-item-title">
									<?php
									if ( ! empty( $feature['url'] ) ) {
										echo '<a href="' . esc_url( $feature['url'] ) . '">';
										echo esc_html( $feature['title'] );
										echo '</a>';
									} else {
										echo esc_html( $feature['title'] );
									}
									?>
                                </h3>
                                <p class="home-features-item-description"><?php echo wp_kses( $feature['description'], $allowed_html_tags ); ?></p>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>