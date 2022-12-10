<?php
/**
 * @var $args
 */

use GRIM_SG\Dashboard;

$settings = $args['settings'] ?? new stdClass();
?>
<div class="postbox">
	<h3 class="hndle"><?php esc_html_e( 'Google News Options', 'xml-sitemap-generator-for-google' ); ?></h3>
	<div class="inside">
		<p><?php esc_html_e( 'This Options will be used for generating your Google News.', 'xml-sitemap-generator-for-google' ); ?></p>

		<table class="wp-list-table widefat fixed striped">
			<thead>
			<tr>
				<th scope="col"><?php esc_html_e( 'Content', 'xml-sitemap-generator-for-google' ); ?></th>
				<th scope="col"><?php esc_html_e( 'Include', 'xml-sitemap-generator-for-google' ); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php Dashboard::render_google_news_field( 'Posts', 'post', $settings->post->google_newss ?? 1 ); ?>
			</tbody>
		</table>

		<?php if ( ! empty( $args['cpt'] ) ) { ?>
			<h3 class="hndle"><?php
				esc_html_e( 'Custom Post Types', 'xml-sitemap-generator-for-google' );

				sgg_show_pro_badge();
			?></h3>
			<div class="pro-wrapper">
				<table class="wp-list-table widefat fixed striped tags">
					<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Content', 'xml-sitemap-generator-for-google' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Include', 'xml-sitemap-generator-for-google' ); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ( $args['cpt'] as $cpt ) {
						Dashboard::render_google_news_field( $cpt->label, $cpt->name, $settings->{$cpt->name}->google_news ?? 0 );
					}
					?>
					</tbody>

				</table>

				<?php sgg_show_pro_overlay(); ?>
			</div>
		<?php } ?>

		<?php if ( ! empty( $args['taxonomies'] ) ) { ?>
			<h3 class="hndle"><?php
				esc_html_e( 'Taxonomies', 'xml-sitemap-generator-for-google' );

				sgg_show_pro_badge();
			?></h3>
			<div class="pro-wrapper">
				<table class="wp-list-table widefat fixed striped tags">
					<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Content', 'xml-sitemap-generator-for-google' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Include', 'xml-sitemap-generator-for-google' ); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php
					if ( ! empty( $args['taxonomies'] ) ) {
						foreach ( $args['taxonomies'] as $taxonomy ) {
							Dashboard::render_google_news_field( $taxonomy->label, $taxonomy->name, $settings->{$taxonomy->name}->google_news ?? 0 );
						}
					}
					?>
					</tbody>
				</table>

				<?php sgg_show_pro_overlay(); ?>
			</div>
		<?php } ?>
	</div>
</div>
