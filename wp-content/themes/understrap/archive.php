<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); ?>

<h1></h1>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'global-templates/variables', 'none' ); ?>


<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<div class="upcoming-events">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php

							/*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
							get_template_part( 'loop-templates/content', get_post_type() );
							?>

						<?php endwhile; ?>
					</div>

				<?php endif; ?>
				<?php
				if ( is_post_type_archive('event')) {
					get_template_part('loop-templates/events-past');

				}
				?>


			</main> <!-- #main -->


		</div> <!-- .row --> <!-- #primary -->

	</div> <!-- Container end -->


</div><!-- Wrapper end -->

<?php get_footer(); ?>


