<?php

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



?>