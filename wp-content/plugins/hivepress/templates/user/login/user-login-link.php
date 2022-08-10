<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() ) :
	?>
	<a href="<?php echo esc_url( hivepress()->router->get_url( 'user_account_page' ) ); ?>" class="hp-menu__item hp-menu__item--user-account hp-link">
		<i class="hp-icon icon-UserCircle"></i>
		<span><?php echo esc_html( hivepress()->request->get_user()->get_username() ); ?></span>
		<?php if ( hivepress()->request->get_context( 'notice_count' ) ) : ?>
			<small><?php echo esc_html( hivepress()->request->get_context( 'notice_count' ) ); ?></small>
		<?php endif; ?>
	</a>
<?php elseif ( get_option( 'hp_user_enable_registration', true ) ) : ?>
	<a href="#user_login_modal" class="hp-menu__item hp-menu__item--user-login hp-link">
		<i class="hp-icon" style="color: #fff;">
			<svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
				<path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
			</svg>
		</i>
		<span><?php esc_html_e( 'Sign In', 'hivepress' ); ?></span>
	</a>
	<?php
endif;
