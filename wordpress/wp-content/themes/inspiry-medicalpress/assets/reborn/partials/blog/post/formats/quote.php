<?php
/* For quote post format */
global $post, $allowed_html_tags;

$quote_author = get_post_meta($post->ID, 'MEDICAL_META_quote_author', true); // quote author
$quote_desc = get_post_meta($post->ID, 'MEDICAL_META_quote_desc', true); // quote text

if (!empty($quote_desc)) {
    ?>
    <blockquote class="quote">
        <p>
            <?php
            echo wp_kses( $quote_desc, $allowed_html_tags );

            if (!empty($quote_author)) {
                ?><cite><?php echo esc_html( $quote_author ) ?></cite><?php
            }
            ?>
        </p>
    </blockquote>
<?php
} else {
    the_content('');
}
?>