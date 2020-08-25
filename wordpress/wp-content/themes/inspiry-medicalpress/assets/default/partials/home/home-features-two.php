<?php
global $theme_options, $allowed_html_tags;
?>
<div class="features-var-two clearfix">
    <div class="container">
        <?php
        if ( !empty($theme_options['home_features_title']) || !empty($theme_options['home_features_description']) ) {
            ?>
            <div class="row">
                <div class="<?php bc_all('12'); ?> ">
                    <div class="slogan-section clearfix">
                        <?php
                        if( !empty($theme_options['home_features_title']) ){
                            echo '<h2>' . wp_kses( $theme_options['home_features_title'], $allowed_html_tags ) . '</h2>';
                        }

                        if( !empty($theme_options['home_features_description']) ){
                            echo '<p>' . wp_kses( $theme_options['home_features_description'], $allowed_html_tags ) . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="row">
            <?php
            $variation_2_features = $theme_options['variation_2_features'];
            if (!empty($variation_2_features)) {
                $loop_counter = 0;
                foreach ($variation_2_features as $feature) {
                    ?>
                    <section class="single-feature text-center clearfix <?php bc('4', '4', '4', ''); ?>">
                        <?php
                        if( !empty($feature['url']) ) {
                            echo '<a href="' . esc_url( $feature['url'] ) . '">';
                            echo '<img src="'. esc_url( $feature['image'] ) .'" alt="' . esc_html( $feature['title'] ) . '"/>';
                            echo '</a>';
                        }else{
                            echo '<img src="'. esc_url( $feature['image'] ) .'" alt="' . esc_html( $feature['title'] ) . '"/>';
                        }
                        ?>
                        <h3>
                            <?php
                            if( !empty($feature['url']) ) {
                                echo '<a href="' . esc_url( $feature['url'] ) . '">';
                                echo esc_html( $feature['title'] );
                                echo '</a>';
                            }else{
                                echo esc_html( $feature['title'] );
                            }
                            ?>
                        </h3>
                        <div class="feature-border"></div>
                        <p><?php echo wp_kses( $feature['description'], $allowed_html_tags ); ?></p>
                    </section>
                <?php
                    $loop_counter++;
                    if( ($loop_counter % 3) == 0 ){
                        ?>
                        <div class="visible-lg clearfix"></div>
                        <div class="visible-md clearfix"></div>
                        <div class="visible-sm clearfix"></div>
                    <?php
                    }
                }
            }
            ?>
        </div>

    </div>
</div>

