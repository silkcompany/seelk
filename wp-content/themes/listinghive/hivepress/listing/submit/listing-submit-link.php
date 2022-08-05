<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( get_option( 'hp_listing_enable_submission' ) ) :
	?>
	<button type="button" class="hp-menu__item hp-menu__item--listing-submit button button--secondary" data-component="link" data-url="<?php echo esc_url( hivepress()->router->get_url( 'listing_submit_page' ) ); ?>"><i style="font-size: 21px;" class="hp-icon icon-Plus"></i><span style="font-family: 'Inter', sans-serif; font-weight: 500; font-size: 16px; line-height: 19px; color: #FFFFFF; margin: 0 auto;"><?php echo esc_html( hivepress()->translator->get_string( 'add_listing' ) ); ?></span></button>
	<?php
endif;
