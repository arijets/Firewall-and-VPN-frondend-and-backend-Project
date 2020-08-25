<?php
global $theme_options, $allowed_html_tags;

if ( isset( $theme_options['header_contact_address'] ) && ! empty( $theme_options['header_contact_address'] ) ) :?>
    <div class="header-address">
	    <?php include INSPIRY_ASSETS_DIR . '/images/svg/icon-pin.svg'; ?>
        <address><?php echo esc_html( wp_kses( $theme_options['header_contact_address'], $allowed_html_tags ) ); ?></address>
    </div>
	<?php
endif;