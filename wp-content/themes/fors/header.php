<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fors
 */

$options = get_option( 'theme_settings' );

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- <script src="https://unpkg.com/scroll-out/dist/scroll-out.min.js"></script> -->

	<?php wp_head(); ?>

	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> -->

	<!-- <script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/micromodal.min.js"></script> -->
	<!-- <script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/swiper.min.js"></script> -->
	<!-- <script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/js.js"></script> -->



</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fors' ); ?></a>

	<header class="header " uk-scrollspy="cls:header_inview">
		<div class="uk-container uk-container-expand">
			<nav class="uk-navbar">
				<div class="uk-navbar-left">
					<?php
					the_custom_logo();
					if ( is_front_page() ) :
						?>
						<div class="uk-navbar-item uk-logo" rel="home">
							<img src="<?=get_template_directory_uri()?>/images/logo.svg" alt="" width="80">
						</div>
						<?php
					else :
						?>
						<a class="uk-navbar-item uk-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?=get_template_directory_uri()?>/images/logo.svg" alt="" width="80">
						</a>
						<?php
					endif; ?>

				</div>
				<div class="uk-navbar-right">

					<?php
					if ( is_front_page() ) {
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'		=> 'header__navbar uk-visible@m'
					) );
					} else {
						wp_nav_menu( array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'secondary-menu',
							'menu_class'		=> 'header__navbar uk-visible@m'
						) );
					}

					?>
					<div class="uk-navbar-item header-phone uk-visible@s">
						<a href="tel:<? echo str_replace([' ', '(', ')', '-'], '', "{$options['phone']}")?>"><?echo "{$options['phone']}";?></a>
					</div>
					<div class="uk-navbar-item header-socials uk-visible@s">
						<a href="<?echo "{$options['instagram']}";?>" class="header-social social social_instagram" target="_blank"></a>
						<a href="<?echo "{$options['vk']}";?>" class="header-social social social_vk"  target="_blank"></a>
			    </div>


				</div>
			</nav>
		</div>
	</header>


	<div class="navbar-toggle uk-hidden@m">
	    <a href="#menu" class=" z-navbar-toggle"><span></span></a>
	</div>

	<div id="content" class="site-content">
