				</div>
			</div>
		</div>
		<footer class="site-footer">
			<div class="container">
				<?php if ( is_active_sidebar( 'site_footer' ) ) : ?>
					<div class="footer-widgets">
						<div class="row">
							<?php dynamic_sidebar( 'site_footer' ); ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="footer-navbar">
					<?php if ( get_theme_mod( 'copyright_notice' ) ) : ?>
						<div class="footer-navbar__start">
							<div class="footer-navbar__copyright">
								<?php echo wp_kses_post( get_theme_mod( 'copyright_notice' ) ); ?>
							</div>
						</div>
					<?php endif; ?>
					
					<div class="footer-navbar__end">
						<nav class="footer-navbar__menu">
							<?php
							wp_nav_menu(
								[
									'theme_location' => 'footer',
									'container'      => 'ul',
								]
							);
							?>
						</nav>
					</div>
					<div class="cmn">
						<div class="cmn-block-1">
							<span>Поддержка:</span>
							<div class="cmn-mail" type="email">help.seelk@gmail.com</div>
						</div>
						<div class="cmn-block-2">
							<span>Мы в соц.сецях:</span>
								<div class="cmn__inst">
									<a href="https://www.instagram.com/seelk.by/" class="cmn__inst-link">
										<img src="<?php echo bloginfo('template_url'); ?>/assets/img/inst-icon.png" alt="instagram icon">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
