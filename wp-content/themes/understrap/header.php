<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title"
	      content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php _e( 'Skip to content',
				'understrap' ); ?></a>

		<nav class="navbar navbar-light site-navigation no-padding" itemscope="itemscope"
			 itemtype="http://schema.org/SiteNavigationElement">

			<div class="<?php echo esc_html( $container ); ?> no-padding" >

				<div class="navbar-header">

						<!-- Your site title as branding in the menu -->
						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
						   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							<div class="site-logo"></div>
						</a>

						<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
						<button class="navbar-toggler hidden-sm-up pull-right" type="button" data-toggle="collapse"
								data-target=".exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false"
								aria-label="Toggle navigation"></button>



				</div>

				<div>
					<div class="header-icons">
						<?php echo get_search_form() ?>
						<a href="https://www.facebook.com/fgi.toronto" target="_blank">
							<img src="<?php echo (get_bloginfo('template_url')); ?>/assets/SocialMediaIconsSVGFiles/grey-fb.svg" alt="facebook-link" title="facebook-link" class="header-icon">
						</a>
						<a href="https://twitter.com/fgitoronto" target="_blank">
							<img src="<?php echo (get_bloginfo('template_url')); ?>/assets/SocialMediaIconsSVGFiles/grey-twitter.svg" alt="facebook-link" title="facebook-link" class="header-icon">
						</a>
						<a href="https://www.instagram.com/fgitoronto" target="_blank">
							<img src="<?php echo (get_bloginfo('template_url')); ?>/assets/SocialMediaIconsSVGFiles/grey-insta.svg" alt="facebook-link" title="facebook-link" class="header-icon">
						</a>
					</div>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-toggleable-xs exCollapsingNavbar',
							'container_id'    => 'exCollapsingNavbar',
							'menu_class'      => 'nav navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new WP_Bootstrap_Navwalker(),
						)
					); ?>

				</div>

			</div> <!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->
