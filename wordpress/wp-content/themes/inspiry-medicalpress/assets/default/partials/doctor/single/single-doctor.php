<?php
/* Include Header */
get_header();

global $theme_options, $allowed_html_tags;
?>

    <div class=" page-top clearfix">
        <div class="container">
            <div class="row">
                <div class="<?php bc_all('12'); ?>">
					<?php
					if ( !empty($theme_options['doctor_detail_title'] ) ) {
						?><h2><?php echo esc_html( $theme_options['doctor_detail_title'] ); ?></h2><?php
					}
					?>
                    <nav class="bread-crumb">
						<?php theme_breadcrumb(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="doctors-posts clearfix">
        <article id="post-<?php the_ID(); ?>" <?php post_class('doctors-single clearfix'); ?>>
            <div class="container">
                <div class="row">
					<?php
					if (have_posts()) :
						while (have_posts()) :
							the_post();
							global $post;
							?>
                            <div class="<?php bc('4', '4', '5', ''); ?>">
                                <div class="entry-meta common clearfix">
									<?php inspiry_standard_thumbnail('gallery-post-single'); ?>
                                    <h5><?php the_title(); ?></h5>
                                    <div class="doctor-departments"><?php the_terms( $post->ID, 'department', ' ', ', ', ' '); ?></div>
                                    <div class="doc-schedule clearfix">
										<?php
										$speciality = get_post_meta( $post->ID, 'doctor_speciality', true );
										if (!empty($speciality)) {
											echo "<p><strong>" . esc_html__('Speciality', 'framework') . "</strong><span>" . esc_html( $speciality ) . "</span></p>";
										}

										$education = get_post_meta($post->ID, 'doctor_education', true);
										if (!empty($education)) {
											echo "<p><strong>" . esc_html__('Education', 'framework') . "</strong><span>" . esc_html( $education ) . "</span></p>";
										}

										$work_days = get_post_meta($post->ID, 'doctor_work_days', true);
										if (!empty($work_days)) {
											echo "<p><strong>" . esc_html__('Work Days', 'framework') . "</strong><span>" . esc_html( $work_days ) . "</span></p>";
										}
										?>
                                    </div>
									<?php get_template_part(INSPIRY_PARTIALS . '/doctor/doctor-social-icons'); ?>
                                </div>
                            </div>
                            <div class="<?php bc('8', '8', '7', ''); ?>">
                                <div class="side-content clearfix">
                                    <header class="top-area clearfix entry-header">
                                        <h1 class="entry-title"><?php the_title(); ?></h1>
                                    </header>
                                    <div class="entry-content">
										<?php
										/* output contents */
										the_content();
										?>
                                    </div>
                                </div>
                            </div>
							<?php
						endwhile;
					endif;
					?>
                </div>
            </div>
        </article>

		<?php
		if ($theme_options['display_related_doctors']) {
			?>
            <div class="container">
                <div class="row">
                    <div class=" <?php bc_all('12') ?> ">
                        <div class="clearfix">
                            <div id="related-doctors-title" class="slogan-section text-left clearfix">
								<?php
								if (!empty($theme_options['related_doctors_title'])) {
									echo '<h2>' . esc_html( $theme_options['related_doctors_title'] ) . '</h2>';
								}
								if (!empty($theme_options['related_doctors_description'])) {
									echo '<p>' . wp_kses( $theme_options['related_doctors_description'], $allowed_html_tags ) . '</p>';
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
					<?php get_template_part(INSPIRY_PARTIALS . '/doctor/related-doctor') ?>
                </div>
            </div>
			<?php
		}
		?>

    </div>
<?php get_footer(); ?>