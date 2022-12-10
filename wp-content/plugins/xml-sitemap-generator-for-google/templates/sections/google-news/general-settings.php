<?php
/**
 * @var $args
 */

use GRIM_SG\Dashboard;

$settings = $args['settings'] ?? new stdClass();
?>
<div class="postbox">
	<h3 class="hndle"><?php esc_html_e( 'General Settings', 'xml-sitemap-generator-for-google' ); ?></h3>
	<div class="inside">
		<p><?php esc_html_e( 'Basic Settings for your Google News. All below options will be available after enabling Google News.', 'xml-sitemap-generator-for-google' ); ?></p>
		<p>
			<strong>
				<?php
				Dashboard::render(
					'fields/checkbox.php',
					array(
						'name'  => 'enable_google_news',
						'value' => $settings->enable_google_news ?? false,
						'label' => esc_html__( 'Enable Google News', 'xml-sitemap-generator-for-google' ),
						'class' => 'has-dependency',
						'data'  => array( 'target' => 'google-news-depended' ),
					)
				);
				?>
			</strong>
		</p>
		<p>
			<?php
			Dashboard::render(
				'fields/input.php',
				array(
					'name'        => 'google_news_name',
					'value'       => $settings->google_news_name ?? '',
					'label'       => esc_html__( 'Publication Name:', 'xml-sitemap-generator-for-google' ),
					'description' => sprintf(
						/* translators: %s General Settings URL */
						wp_kses_post( 'Default value is General Settings > <a href="%s" target="_blank">Site Title</a>.' ),
						esc_url( admin_url( 'options-general.php' ) )
					),
					'class' => 'google-news-depended',
				)
			);
			?>
		</p>
		<p>
			<label><?php esc_html_e( 'Source Labels:', 'xml-sitemap-generator-for-google' ); ?></label>
			<span>
				<?php
				printf(
					/* translators: %s General Settings URL */
					wp_kses_post( 'To manage your Site Source Labels, please go to the <a href="%s" target="_blank">Google News Publisher Center</a>.' ),
					'https://publishercenter.google.com/'
				)
				?>
				</span>
		</p>
	</div>
</div>
