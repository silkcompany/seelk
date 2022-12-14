<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Seelk.by - это новая доска объявления для всеми любимой яблочной техники с аккуратным дизайном и всеми необходимыми функциями.">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo bloginfo('template_url');?>/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo bloginfo('template_url');?>/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo bloginfo('template_url');?>/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo bloginfo('template_url');?>/favicon/site.webmanifest">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">
		<?php wp_head(); ?>
	</head>
	<?php $column_width = 4; ?>
	<body <?php body_class(); ?>>
		<?php
		if ( function_exists( 'wp_body_open' ) ) :
			wp_body_open();
		endif;
		?>
		<div class="site-container">
			<header class="site-header">
				<div class="header-navbar">
					<div class="header-navbar__start">
						<div class="header-logo">
							<?php
							if ( has_custom_logo() ) :
								the_custom_logo();
							else :
								?>
								<a href="<?php echo esc_url( home_url() ); ?>" rel="home">
									<div class="header-logo__name"><?php bloginfo( 'name' ); ?></div>
									<?php if ( get_bloginfo( 'description' ) ) : ?>
										<div class="header-logo__description"><?php bloginfo( 'description' ); ?></div>
									<?php endif; ?>
								</a>
							<?php endif; ?>
						</div>
					</div>




					
					<div class="header-navbar__end">
						<div class="header-navbar__burger" data-component="burger">
							<a href="#"><i class="fas fa-bars"></i></a>
							<?php
							wp_nav_menu(
								[
									'theme_location' => 'header',
									'container'      => 'ul',
								]
							);
							?>
						</div>
						<nav class="header-navbar__menu" data-component="menu">
							<?php
							wp_nav_menu(
								[
									'theme_location' => 'header',
									'container'      => 'ul',
								]
							);
							?>
						</nav>
						<?php echo apply_filters( 'hivetheme/v1/areas/site_hero', '' ); ?>
						<?php if ( has_filter( 'hivetheme/v1/areas/site_header' ) ) : ?>
							<div class="header-navbar__actions">
								<?php echo apply_filters( 'hivetheme/v1/areas/site_header', '' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				
			</header>
			<div class="site-content" id="content">
				<div class="container">
