<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( $listing->get_description() ) :
	?>
	<div class="hp-listing__description">
		<div class="hp-listing__description-title">Описание</div>	
		<?php echo $listing->display_description(); ?>
	</div>
	<?php
endif;
