<?php
add_filter(
	'hivepress/v1/templates/vendor_view_page',
	function( $template ) {
		return hivepress()->helper->merge_trees(
			$template,
			[
				'blocks' => [
					'listings' => [
						'columns' => 3,
					],
				],
			]
		);
	}
);

// Enqueue theme styles.
add_action(
    'wp_enqueue_scripts',
    function(){
         wp_enqueue_style('listinghive-child',get_stylesheet_directory_uri() . '/style.css');
);
// Add custom code below.
