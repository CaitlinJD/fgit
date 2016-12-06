<?php /* Template Name: Get Involved */ ?>

<?php get_header(); ?>

<h1>yolo </h1>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">


<div class="bannerimage" style="background: url(' <?php echo $homeinfo ?>'); background-size: cover">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'page' ); ?>

                <?php //the_post_navigation(); ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
