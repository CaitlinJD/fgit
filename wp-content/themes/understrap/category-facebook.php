
<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <div class="row flex-items-xs-center">
         <div class="col-xs-10 col-md-9 col-lg-9 page-intro facebook-intro">
                        <h2 class="page-title">News</h2>
                       <p class="bold">FGIT Toronto</p>

                    </div>
        </div>
        <div class="row flex-items-xs-center">
            <div class="col-md-9 col-xs-10 news-container">
            <div class ="card-columns around-xs">
      
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
                    <div class="card">
                        <div class="news-box">
                            <img src="<?php if( !uf('facebook_post_image')){echo uf('facebook_post_image');}else{echo 'https://scontent-yyz1-1.xx.fbcdn.net/v/t1.0-9/405246_10150652183552753_2139047369_n.jpg?oh=fbe0de6532572403fa08cd6eaa5e14b1&oe=58E7FFC8';}; ?>" />
                                
                            <p><?php the_content(); ?></p>
                            <a href="<?php uf('facebook_post_url') ?>">Read More</a>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
 
            </div>

            <a href="<?php custom_pagination($wp_query) ?>" class="article-button">Load More</a>

            </div>
        </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
