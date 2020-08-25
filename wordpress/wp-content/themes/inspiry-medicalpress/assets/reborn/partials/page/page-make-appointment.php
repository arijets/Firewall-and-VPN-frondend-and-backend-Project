<?php
global $theme_options;

get_header(); ?>

<div class="appoint-page">
    <div class="container">
	    <?php get_template_part( INSPIRY_PARTIALS . '/common/page-content' ); ?>

        <div class="appoint-section clearfix">

            <div class="top-icon">
                <img src="<?php echo INSPIRY_ASSETS_DIR_URI; ?>/images/appoint-form-top.png" alt=""/>
            </div>

            <form id="appointment_form_main" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">

                <div class="row">
                    <div class="<?php bc('6','6','12',''); ?>">
                        <input type="text" name="name" id="app-name" class="required" placeholder="<?php esc_html_e('Name', 'framework'); ?>" title="<?php esc_html_e('* Please provide your name', 'framework'); ?>"/>
                    </div>
                    <div class="<?php bc('6','6','12',''); ?>">
                        <input type="text" name="number" id="app-number" class="phoneNumber" placeholder="<?php esc_html_e('Phone Number', 'framework'); ?>" title="<?php esc_html_e('* Please provide a valid phone number.', 'framework'); ?>"/>
                    </div>
                </div>

                <div class="row">
                    <div class="<?php bc('6','6','12',''); ?>">
                        <input type="email" name="email" id="app-email" class="required email" placeholder="<?php esc_html_e('Email Address', 'framework'); ?>" title="<?php esc_html_e('* Please provide a valid email address', 'framework'); ?>"/>
                    </div>
                    <div class="<?php bc('6','6','12',''); ?>">
                        <input type="text" name="date" id="datepicker" class="required" autocomplete="off" placeholder="<?php esc_html_e('Appointment Date', 'framework'); ?>"/  title="<?php esc_html_e('* Please provide appointment date', 'framework'); ?>">
                    </div>
                </div>

                <textarea name="message" id="app-message" class="required" cols="50" rows="1" placeholder="<?php esc_html_e('Message', 'framework'); ?>" title="<?php esc_html_e('* Please provide your message', 'framework'); ?>"></textarea>

                <?php
	            if ( inspiry_get_option( 'gdpr_appointment_form' ) && '1' == inspiry_get_option( 'gdpr_appointment_form' ) ) {
		            inspiry_gdpr_checkbox( 'appointment' );
	            }
	            ?>

                <input type="hidden" name="action" value="make_appointment">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('request_appointment_nonce'); ?>" />

                <?php get_template_part(INSPIRY_COMMON . '/recaptcha/custom-recaptcha'); ?>

                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" name="Submit" class="btn btn-primary" value="<?php esc_html_e('Submit Request', 'framework'); ?>"/>
                        <img src="<?php echo INSPIRY_COMMON_DIR_URI; ?>/images/loader.gif" id="appointment-loader" alt="<?php esc_html_e('Loading...', 'framework'); ?>">
                    </div>
                    <div class="col-sm-12">
                        <div id="message-sent"></div>
                        <div id="error-container"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>
