<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="wrapper-footer">

		<div class="row flex-items-sm-middle footer-line">
			<div class="footer-newsletter col-md-12">
				<a name="footer">
					<?php dynamic_sidebar( 'footerfull' ); ?>
				</a>
			</div>
		</div>

		<div class="row flex-items-xs-center">
					
		<?php wp_nav_menu(
					array(
						'theme_location'  => 'FooterMenu',
						'container_class' => 'col-xs-8 col-sm-8 col-md-11 col-lg-10',
						'container_id'    => '',
						'menu_class'      => 'row',
						'fallback_cb'     => '',
						'menu_id'         => 'footer-menu',
						'walker'          => '',
					)
				); ?>

		</div>

		<div class="row flex-items-xs-center">
			<div class="col-xs-10 col-sm-8">
				<div class="row flex-items-xs-center">
					<ul class="social-media-menu">
						<li><a href="https://www.facebook.com/fgi.toronto"><img src="<?php echo get_bloginfo('template_url') . '/assets/SocialMediaIconsSVGFiles/grey-fb.svg' ?>" alt="Facebook"/></a></li>
						<li><a href="https://twitter.com/fgitoronto"><img src="<?php echo get_bloginfo('template_url') . '/assets/SocialMediaIconsSVGFiles/grey-twitter.svg' ?>" alt="Twitter"/></a></li>
						<li><a href="https://www.instagram.com/fgitoronto"><img src= "<?php echo get_bloginfo('template_url') . '/assets/SocialMediaIconsSVGFiles/grey-insta.svg' ?>" alt="Instagram"/></a></li>
						<li><a href="https://www.instagram.com/fgitoronto"><img src="<?php echo get_bloginfo('template_url') . '/assets/SocialMediaIconsSVGFiles/grey-email.svg' ?>" alt="Email"/></a></li>
					</ul>
				</div><!--end row-->					
			</div><!--col end -->
		</div><!-- row end -->
</div><!-- wrapper end -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
