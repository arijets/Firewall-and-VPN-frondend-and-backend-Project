<?php
global $theme_options, $allowed_html_tags;
?>
<div class="home-features clearfix">
    <div class="container">
        <div class="row">
            <div class="<?php bc('4', '4', '12', ''); ?>">
                <div class="features-intro clearfix">
                    <h2><?php echo wp_kses( $theme_options['home_features_title'], $allowed_html_tags ); ?></h2>

                    <p><?php echo esc_html( $theme_options['home_features_description'] ); ?></p>
                    <?php
                    if( !empty($theme_options['features_button_text']) && !empty($theme_options['features_button_url']) ){
                        echo '<a class="read-more" href="' . esc_url( $theme_options['features_button_url'] ) . '">' . esc_html( $theme_options['features_button_text'] ) . '</a>';
                    }
                    ?>
                </div>
            </div>
            <div class="<?php bc('8', '8', '12', ''); ?>">
                <div class="row">

                    <div class="<?php bc_all('6') ?> single-feature">
                        <div class="row">
                            <div class="<?php bc_all('3') ?> icon-wrapper">
                                <?php echo wp_kses( $theme_options['feature_var_1_icon_1'], $allowed_html_tags ); ?>
                            </div>
                            <div class="<?php bc_all('9') ?>">
                                <h3>
                                    <?php
                                    if( !empty($theme_options['feature_var_1_url_1']) ) {
                                        echo '<a href="' . esc_url( $theme_options['feature_var_1_url_1'] ) . '">';
                                        echo esc_html( $theme_options['feature_var_1_title_1'] );
                                        echo '</a>';
                                    } else {
                                        echo esc_html( $theme_options['feature_var_1_title_1'] );
                                    }
                                    ?>
                                </h3>
                                <p><?php echo wp_kses( $theme_options['feature_var_1_desc_1'], $allowed_html_tags ); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="<?php bc_all('6') ?> single-feature">
                        <div class="row">
                            <div class="<?php bc_all('3') ?> icon-wrapper">
                                <?php echo wp_kses( $theme_options['feature_var_1_icon_2'], $allowed_html_tags ); ?>
                            </div>
                            <div class="<?php bc_all('9') ?>">
                                <h3>
                                    <?php
                                    if( !empty($theme_options['feature_var_1_url_2']) ) {
                                        echo '<a href="' . esc_url( $theme_options['feature_var_1_url_2'] ) . '">';
                                        echo esc_html( $theme_options['feature_var_1_title_2'] );
                                        echo '</a>';
                                    }else{
                                        echo esc_html( $theme_options['feature_var_1_title_2'] );
                                    }
                                    ?>
                                </h3>
                                <p><?php echo wp_kses( $theme_options['feature_var_1_desc_2'], $allowed_html_tags ); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="visible-lg clearfix"></div>
                    <div class="visible-md clearfix"></div>
                    <div class="visible-sm clearfix"></div>
                    <div class="<?php bc_all('6') ?> single-feature">
                        <div class="row">
                            <div class="<?php bc_all('3') ?> icon-wrapper">
                                <?php echo wp_kses( $theme_options['feature_var_1_icon_3'], $allowed_html_tags ); ?>
                            </div>
                            <div class="<?php bc_all('9') ?>">
                                <h3>
                                    <?php
                                    if( !empty(esc_url( $theme_options['feature_var_1_url_3'] )) ) {
                                        echo '<a href="' . esc_url( $theme_options['feature_var_1_url_3'] ) . '">';
                                        echo esc_html( $theme_options['feature_var_1_title_3'] );
                                        echo '</a>';
                                    }else{
                                        echo esc_html( $theme_options['feature_var_1_title_3'] );
                                    }
                                    ?>
                                </h3>
                                <p><?php echo wp_kses( $theme_options['feature_var_1_desc_3'], $allowed_html_tags ); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="<?php bc_all('6') ?> single-feature">
                        <div class="row">
                            <div class="<?php bc_all('3') ?> icon-wrapper">
                                <?php echo wp_kses( $theme_options['feature_var_1_icon_4'], $allowed_html_tags ); ?>
                            </div>
                            <div class="<?php bc_all('9') ?>">
                                <h3>
                                    <?php
                                    if( !empty($theme_options['feature_var_1_url_4']) ) {
                                        echo '<a href="' . esc_url( $theme_options['feature_var_1_url_4'] ) . '">';
                                        echo esc_html( $theme_options['feature_var_1_title_4'] );
                                        echo '</a>';
                                    }else{
                                        echo esc_html( $theme_options['feature_var_1_title_4'] );
                                    }
                                    ?>
                                </h3>
                                <p><?php echo wp_kses( $theme_options['feature_var_1_desc_4'], $allowed_html_tags ); ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

