
<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <div class="row">
         <div class="offset-xs-1 offset-md-2 col-xs-10 col-md-8 col-lg-6 page-intro">
                        <h2 class="page-title">Gallery</h2>

                    </div>
        </div>
        <div class="row flex-items-sm-center">
            <div class="col-md-9">
            <div class ="row">
            <?php query_posts('cat=instagram'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
                    <div class="col-md-3">
                        <div class="insta-box">
                            <a href="<?php uf('insta_post_url') ?>">
                                <img src="<?php the_content(); ?>" />
                            </a>                                
                            <p><?php uf('insta_post_likes') ?></p>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
                </div>
                </div>
        </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
