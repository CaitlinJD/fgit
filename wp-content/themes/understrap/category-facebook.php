
<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <div class="row">
         <div class="offset-xs-1 offset-md-2 col-xs-10 col-md-8 col-lg-6 page-intro">
                        <h2 class="page-title">News</h2>
                       <p>FGIT Toronto</p>

                    </div>
        </div>
        <div class="row flex-items-sm-center">
            <div class="col-md-9">
            <div class ="row">
            <?php query_posts('cat=facebook'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
                    <div class="col-md-4">
                        <div class="news-box">
                            <img src="<?php if( !uf('facebook_post_image')){echo uf('facebook_post_image');}else{echo 'https://scontent-yyz1-1.xx.fbcdn.net/v/t1.0-9/405246_10150652183552753_2139047369_n.jpg?oh=fbe0de6532572403fa08cd6eaa5e14b1&oe=58E7FFC8';}; ?>" />
                                
                            <p><?php the_content(); ?></p>
                            <a href="<?php uf('facebook_post_url') ?>">Read More</a>
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
