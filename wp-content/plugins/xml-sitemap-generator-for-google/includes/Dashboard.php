<?php

namespace GRIM_SG;

use GRIM_SG\Vendor\Controller;

class Dashboard extends Controller {

	/**
	 * Dashboard constructor.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu_pages' ) );
		add_filter( 'plugin_action_links_' . GRIM_SG_BASENAME, array( $this, 'plugin_action_links' ) );
	}

	/**
	 * Menu
	 */
	public function admin_menu_pages() {
		add_options_page(
			esc_html__( 'XML Sitemap Generator Settings', 'xml-sitemap-generator-for-google' ),
			esc_html__( 'XML Sitemap', 'xml-sitemap-generator-for-google' ),
			'manage_options',
			self::$slug,
			array( $this, 'render_settings_page' )
		);
	}

	/**
	 * Register Settings
	 */
	public function register_settings() {
		register_setting( self::$slug, self::$slug );
	}

	/**
	 * Save Settings
	 */
	public function save_settings() {
		if ( 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ) ) {
			return;
		}

		$settings = new Settings();

		$settings->sitemap_url         = ( isset( $_POST['sitemap_url'] ) ) ? sanitize_text_field( $_POST['sitemap_url'] ) : $settings->sitemap_url;
		$settings->html_sitemap_url    = ( isset( $_POST['html_sitemap_url'] ) ) ? sanitize_text_field( $_POST['html_sitemap_url'] ) : $settings->html_sitemap_url;
		$settings->enable_html_sitemap = ( isset( $_POST['enable_html_sitemap'] ) ) ? sanitize_text_field( $_POST['enable_html_sitemap'] ) : 0;
		$settings->sitemap_to_robots   = ( isset( $_POST['sitemap_to_robots'] ) ) ? sanitize_text_field( $_POST['sitemap_to_robots'] ) : 0;
		$settings->ping_sitemap        = ( isset( $_POST['ping_sitemap'] ) ) ? sanitize_text_field( $_POST['ping_sitemap'] ) : 0;
		$settings->exclude_posts       = ( isset( $_POST['exclude_posts'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['exclude_posts'] ) : '';
		$settings->posts_priority      = ( isset( $_POST['posts_priority'] ) ) ? sanitize_text_field( $_POST['posts_priority'] ) : '';
		$settings->enable_google_news  = ( isset( $_POST['enable_google_news'] ) ) ? sanitize_text_field( $_POST['enable_google_news'] ) : 0;
		$settings->google_news_name    = ( isset( $_POST['google_news_name'] ) ) ? sanitize_text_field( $_POST['google_news_name'] ) : '';
		$settings->google_news_url     = ( isset( $_POST['google_news_url'] ) ) ? sanitize_text_field( $_POST['google_news_url'] ) : $settings->google_news_url;
		$settings->google_news_exclude = ( isset( $_POST['google_news_exclude'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['google_news_exclude'] ) : '';

		$settings->home          = $settings->get_row_value( 'home' );
		$settings->page          = $settings->get_row_value( 'page' );
		$settings->post          = $settings->get_row_value( 'post' );
		$settings->archive       = $settings->get_row_value( 'archive' );
		$settings->archive_older = $settings->get_row_value( 'archive_older' );
		$settings->authors       = $settings->get_row_value( 'authors' );

		foreach ( $this->get_cpt() as $cpt ) {
			$settings->{$cpt} = $settings->get_row_value( $cpt );
		}

		foreach ( $this->get_taxonomy_types() as $taxonomy_type ) {
			$settings->{$taxonomy_type} = $settings->get_row_value( $taxonomy_type );
		}

		$additional_urls        = ( isset( $_POST['additional_urls'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['additional_urls'] ) : [];
		$additional_priorities  = ( isset( $_POST['additional_priorities'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['additional_priorities'] ) : [];
		$additional_frequencies = ( isset( $_POST['additional_frequencies'] ) ) ? apply_filters( 'sanitize_post_array', $_POST['additional_frequencies'] ) : [];

		foreach ( $additional_urls as $key => $value ) {
			$page = array(
				'url'       => $additional_urls[ $key ],
				'priority'  => $additional_priorities[ $key ],
				'frequency' => $additional_frequencies[ $key ],
			);

			$settings->additional_pages[] = $page;
		}

		update_option( self::$slug, $settings );

		flush_rewrite_rules();
	}

	/**
	 * Settings page
	 */
	public function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		wp_enqueue_style( 'grim-sgg', GRIM_SG_URL . 'assets/css/styles.css', array(), GRIM_SG_VERSION );
		wp_enqueue_script( 'jquery-ui', GRIM_SG_URL . 'assets/js/jquery-ui.min.js', array( 'jquery' ), GRIM_SG_VERSION, true );
		wp_enqueue_script( 'grim-sgg', GRIM_SG_URL . 'assets/js/scripts.js', array( 'jquery' ), GRIM_SG_VERSION, true );

		wp_localize_script(
			'grim-sgg',
			'sgg',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
			)
		);

		$this->save_settings();

		self::render(
			'settings.php',
			array(
				'settings'   => $this->get_settings(),
				'cpt'        => $this->get_cpt( 'objects' ),
				'taxonomies' => $this->get_taxonomy_types( 'objects' ),
			)
		);
	}

	/**
	 * Render Sitemap Post Row
	 * @param $title
	 * @param $option
	 * @param $data
	 */
	public static function render_post_row( $title, $option, $data ) {
		self::render(
			'fields/post-row.php',
			array(
				'title'  => $title,
				'option' => $option,
				'data'   => $data,
			)
		);
	}

	/**
	 * Render Priority Selectbox
	 * @param $name
	 * @param $value
	 */
	public static function render_priority_field( $name, $value ) {
		self::render(
			'fields/priority.php',
			array(
				'name'  => $name,
				'value' => $value,
			)
		);
	}

	/**
	 * Render Frequency Selectbox
	 * @param $name
	 * @param $value
	 */
	public static function render_frequency_field( $name, $value ) {
		self::render(
			'fields/frequency.php',
			array(
				'name'  => $name,
				'value' => $value,
			)
		);
	}

	/**
	 * Render Google News Selectbox
	 * @param $title
	 * @param $name
	 * @param $value
	 */
	public static function render_google_news_field( $title, $name, $value ) {
		self::render(
			'fields/google-news-row.php',
			array(
				'title' => $title,
				'name'  => $name,
				'value' => $value,
			)
		);
	}

	/**
	 * Render Template
	 * @param $template_name
	 * @param $args
	 */
	public static function render( $template_name, $args = array() ) {
		load_template( GRIM_SG_PATH . "/templates/{$template_name}", false, $args );
	}

	/**
	 * Setting Link
	 *
	 * @param $links
	 * @return mixed
	 */
	public function plugin_action_links( $links ) {
		$settings_link = sprintf(
			'<a href="%1$s">%2$s</a>',
			admin_url( 'options-general.php?page=' . self::$slug ),
			esc_html__( 'Settings', 'xml-sitemap-generator-for-google' )
		);

		array_unshift( $links, $settings_link );

		if ( ! sgg_pro_enabled() ) {
			$pro_link = sprintf(
				'<a href="%1$s" style="font-weight: 600; color: #00b000;" target="_blank">%2$s</a>',
				sgg_get_pro_url(),
				esc_html__( 'Get Pro', 'xml-sitemap-generator-for-google' )
			);

			$links[] = $pro_link;
		}

		return $links;
	}
}
