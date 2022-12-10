<?php
/**
 * @var $args
 */

use GRIM_SG\Dashboard;

$settings = $args['settings'] ?? new stdClass();
?>
<div class="postbox">
	<h3 class="hndle"><?php
		esc_html_e( 'HTML Sitemap', 'xml-sitemap-generator-for-google' );

		sgg_show_pro_badge();
	?></h3>

	<div class="inside">
		<p><?php esc_html_e( 'Here you can enable HTML Sitemap, customize Output URL and preview.', 'xml-sitemap-generator-for-google' ); ?></p>
		<p>
			<strong>
				<?php
				Dashboard::render(
					'fields/checkbox.php',
					array(
						'name'  => 'enable_html_sitemap',
						'value' => $settings->enable_html_sitemap ?? false,
						'label' => esc_html__( 'Enable HTML Sitemap', 'xml-sitemap-generator-for-google' ),
						'class' => 'has-dependency',
						'data'  => array( 'target' => 'html-sitemap-depended' ),
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
					'name'  => 'html_sitemap_url',
					'value' => $settings->html_sitemap_url,
					'label' => esc_html__( 'HTML Sitemap URL:', 'xml-sitemap-generator-for-google' ),
					'class' => 'html-sitemap-depended',
				)
			);
			?>
		</p>
		<p>
			<?php esc_html_e( 'Preview your HTML Sitemap:', 'xml-sitemap-generator-for-google' ); ?>
			<a href="<?php echo esc_url( get_home_url() . '/' . $settings->html_sitemap_url ); ?>" target="_blank"><?php echo esc_url( get_home_url() . '/' . $settings->html_sitemap_url ); ?></a>
		</p>

		<?php sgg_show_pro_overlay(); ?>
	</div>
</div>
