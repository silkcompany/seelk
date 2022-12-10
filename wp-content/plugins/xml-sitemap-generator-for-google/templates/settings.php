<?php
/**
 * @var $args
 */

use GRIM_SG\Dashboard;

settings_errors( 'grim_messages' );
?>
<div class="wrap grim-wrapper">
	<h1><?php esc_html_e( 'XML Sitemap Generator Settings', 'xml-sitemap-generator-for-google' ); ?></h1>

	<?php Dashboard::render( 'partials/alerts.php' ); ?>

	<form method="post">
		<div id="poststuff" class="metabox-holder has-right-sidebar">
			<div class="has-sidebar">
				<div id="post-body-content" class="has-sidebar-content">

					<div class="meta-box-sortabless">
						<nav class="nav-tab-wrapper">
							<a href="#" class="nav-tab nav-tab-active" data-id="general"><?php esc_html_e( 'General', 'xml-sitemap-generator-for-google' ); ?></a>
							<a href="#" class="nav-tab" data-id="gogle-news"><?php esc_html_e( 'Google News', 'xml-sitemap-generator-for-google' ); ?></a>
						</nav>

						<div class="nav-tabs-content">
							<div class="section">
								<!-- General -->
								<?php Dashboard::render( 'sections/general/general-settings.php', $args ); ?>

								<!-- Output URLs -->
								<?php Dashboard::render( 'sections/general/xml-sitemap.php', $args ); ?>

								<!-- HTML Sitemap -->
								<?php Dashboard::render( 'sections/general/html-sitemap.php', $args ); ?>

								<!-- Additional Pages -->
								<?php Dashboard::render( 'sections/general/additional.php', $args ); ?>

								<!-- Exclude -->
								<?php Dashboard::render( 'sections/general/exclude.php', $args ); ?>

								<!-- Posts Priority -->
								<?php Dashboard::render( 'sections/general/posts-priority.php', $args ); ?>

								<!-- Sitemap -->
								<?php Dashboard::render( 'sections/general/sitemap-options.php', $args ); ?>
							</div>

							<div class="section">
								<!-- General -->
								<?php Dashboard::render( 'sections/google-news/general-settings.php', $args ); ?>

								<!-- Output URLs -->
								<?php Dashboard::render( 'sections/google-news/output.php', $args ); ?>

								<!-- Exclude -->
								<?php Dashboard::render( 'sections/google-news/exclude.php', $args ); ?>

								<!-- Options -->
								<?php Dashboard::render( 'sections/google-news/options.php', $args ); ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<input type="hidden" name="save_settings">
		<?php
		submit_button();
		?>
	</form>
</div>
