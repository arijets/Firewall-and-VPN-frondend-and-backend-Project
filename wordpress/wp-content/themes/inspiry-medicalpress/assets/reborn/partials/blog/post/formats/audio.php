<?php
global $post;

$mp3_id = get_post_meta($post->ID, 'MEDICAL_META_audio_mp3', true);
$ogg_id = get_post_meta($post->ID, 'MEDICAL_META_audio_ogg', true);

if ($mp3_id) {
    $mp3_url = wp_get_attachment_url($mp3_id);
}

if ($ogg_id) {
    $ogg_url = wp_get_attachment_url($ogg_id);
}

if ((!empty($mp3_url)) || (!empty($ogg_url))) {
    ?>
    <div id="jplayer_<?php echo intval( $post->ID ); ?>" class="jp-jplayer jp-jplayer-audio"></div>

    <div class="jp-audio-container">
        <div class="jp-audio">
            <div id="jp_interface_<?php echo intval( $post->ID ); ?>" class="jp-interface">
                <ul class="jp-controls">
                    <li><a href="#" class="jp-play" tabindex="1"><?php esc_html_e( 'play', 'framework' ); ?></a></li>
                    <li><a href="#" class="jp-pause" tabindex="1"><?php esc_html_e( 'pause', 'framework' ); ?></a></li>
                    <li><a href="#" class="jp-mute" tabindex="1"><?php esc_html_e( 'mute', 'framework' ); ?></a></li>
                    <li><a href="#" class="jp-unmute" tabindex="1"><?php esc_html_e( 'unmute', 'framework' ); ?></a></li>
                </ul>
                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-volume-bar-container">
                    <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            if (jQuery().jPlayer) {
                jQuery("#jplayer_<?php echo intval( $post->ID ); ?>").jPlayer({
                    ready: function () {
                        $(this).jPlayer("setMedia", {
                            <?php
                            if( !empty($mp3_url) ) {
                                ?>mp3: "<?php echo esc_url( $mp3_url ); ?>", <?php
                            }

                            if( !empty($ogg_url) ) {
                                ?>oga: "<?php echo esc_url( $ogg_url ); ?>"<?php
                            }
                            ?>
                        });
                    },
                    swfPath: "<?php echo get_template_directory_uri(); ?>/js",
                    cssSelectorAncestor: "#jp_interface_<?php echo intval( $post->ID ); ?>",
                    supplied: "<?php if( !empty($ogg_url) ) : ?>oga,<?php endif; ?><?php if( !empty($mp3_url) ) : ?>mp3,<?php endif; ?>all"
                });
            }
        });
    </script>
<?php
} else {

    $audio_embed_code = get_post_meta($post->ID, 'MEDICAL_META_audio_embed_code', true); // audio embed code

    if (!empty($audio_embed_code)) {
        ?>
        <div class="audio-embed clearfix">
            <div class="audio-embed-wrapper clearfix">
                <?php echo stripslashes(htmlspecialchars_decode($audio_embed_code)); ?>
            </div>
        </div>
    <?php
    }
}
?>