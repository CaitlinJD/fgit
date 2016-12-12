<?php /* Template Name: Get Involved */ ?>

<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">


            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'loop-templates/content', 'page' ); ?>
                <?php

                 $involved_data = ( get_post_meta( get_the_ID(), 'get_involved_data', true ));

                echo "<pre>";
                print_r ($involved_data);
                echo "</pre>";

                 foreach($involved_data as $child) {
                     echo $child["title"]. "\n";
                     echo $child["content"]. "\n";
                    }

                 ?>

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
