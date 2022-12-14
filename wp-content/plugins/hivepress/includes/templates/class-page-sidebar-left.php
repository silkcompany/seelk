<?php
/**
 * Abstract left sidebar page template.
 *
 * @package HivePress\Templates
 */

namespace HivePress\Templates;

use HivePress\Helpers as hp;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Base page with left sidebar.
 */
abstract class Page_Sidebar_Left extends Page {

	/**
	 * Class constructor.
	 *
	 * @param array $args Template arguments.
	 */
	public function __construct( $args = [] ) {
		$args = hp\merge_trees(
			[
				'blocks' => [
					'page_header'    => [],
					'page_footer'    => [],

					'page_container' => [
						'blocks' => [
							'page_columns' => [
								'type'       => 'container',
								'_order'     => 10,

								'attributes' => [
									'class' => [ 'hp-row' ],
								],

								'blocks'     => [
									'page_sidebar' => [
										'type'       => 'container',
										'tag'        => 'aside',
										'blocks'     => [],
										'_order'     => 10,

										'attributes' => [
											'class' => [ 'hp-page__sidebar', 'hp-col-md-3', 'hp-col-sm-12',],
										],
									],

									'page_content' => [
										'type'       => 'container',
										'_order'     => 20,

										'attributes' => [
											'class' => [ 'hp-page__content', 'hp-col-sm-9', 'hp-col-xs-12' ],
										],

										'blocks'     => [
											'breadcrumb_menu' => [
												'type'   => 'menu',
												'menu'   => 'breadcrumb',
												'_order' => 1,
											],

											'page_title'  => [
												'type'   => 'part',
												'path'   => 'page/page-title',
												'_label' => esc_html__( 'Page Title', 'hivepress' ),
												'_order' => 5,
											],

											'page_description' => [
												'type'   => 'part',
												'path'   => 'page/page-description',
												'_label' => esc_html__( 'Page Description', 'hivepress' ),
												'_order' => 7,
											],

											'page_topbar' => [
												'type'     => 'container',
												'blocks'   => [],
												'optional' => true,
												'_order'   => 10,

												'attributes' => [
													'class' => [ 'hp-page__topbar' ],
												],
											],
										],
									],
								],
							],
						],
					],
				],
			],
			$args
		);

		parent::__construct( $args );
	}
}
