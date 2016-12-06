<?php
/**
 * The template for displaying archive pages for CPT taxonomies (BoardMembers/SuccessStories).
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
//$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php get_template_part( 'global-templates/variables', 'none' ); ?>


<div class="wrapper" id="archive-wrapper">

    <div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

        <div class="row">

            <main class="site-main" id="main">

                <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                       <h1><?php
                        echo ( is_tax('membercategory', 'board-member')? 'Ignite the others, <br>Empowered by us.' :
                            (is_tax('membercategory','success-stories')? 'Our Members. <br>Stories that Touch' : '') );
                        ?> </h1>

                    <div class="page-content">
                        <p>
                            <?php
                            $current_term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
                            echo $current_term->description;
                            ?>
                        </p>

                    </div>

                    </header><!-- .page-header -->

                    <?php /* Start the Loop */ ?>
                    <div class="col-xs-12">
                        <div class="row">
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'loop-templates/content', 'archive' );
                                ?>


                            <?php endwhile; ?>
                        </div> <!-- end of row -->
                    </div> <!-- end of col-xs-12 -->
                <?php else : ?>

                    <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                <?php endif; ?>

            </main><!-- #main -->


        </div><!-- #primary -->



    </div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
