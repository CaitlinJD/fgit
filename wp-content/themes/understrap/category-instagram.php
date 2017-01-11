
<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <div class="row flex-items-xs-center">
         <div class="col-xs-10 col-md-9 page-intro">
                        <h2 class="page-title">Gallery</h2>

                    </div>
        </div>
        <div class="row flex-items-xs-center">
            <div class="col-md-9 col-sm-9 col-xs-10">
                <div class ="row around-xs">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="<?php uf('insta_post_url') ?>" target="_blank">
                            <div class="insta-box" style="background-image: url('<?php the_content(); ?>')" >
                                <p>&#9825; <?php uf('insta_post_likes') ?></p>
                            </div>
                            </a>        
                        </div>
                    <?php endwhile; endif; ?>

            </div>
                <?php custom_pagination_category($wp_query) ?>
           </div>
        </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
