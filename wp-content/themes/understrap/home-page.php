<?php /* Template Name: Home Page */ ?>

<?php

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="wrapper" id="page-wrapper">

    <div id="content" tabindex="-1">

    <main class="site-main" id="main">

             
                <div class="row home-banner section-container">
                    <div class="banner-img"  style="background-image: url('<?php echo uf('banner_image'); ?>')"></div>

                    <div class="offset-xs-1 offset-md-1 col-xs-8 col-md-6 col-lg-5 title-section">
                    
                        <h2 class="banner-title">
                        <?php echo uf( 'banner_title'); ?>
                        </h2>
                        <?php if (get_uf('banner_link')) : ?>
                            <a id="home-banner-button" class="article-button" href="<?php echo get_uf('banner_link'); ?>">
                                <?php echo (get_uf('banner_link_text')? get_uf('banner_link_text') : 'Learn More'); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                </div> 

                <div class="row flex-items-sm-center section-container home-secondary-content">
                    <div class="col-md-9">
                        <div class="row">

                    <div class="col-xs-10 col-md-7 article-container">
                        <h3><?php echo uf('article_title'); ?></h3>
                        <hr>
                        <p><?php echo uf('article_content'); ?></p>
                        <?php if (get_uf('article_link')) : ?>
                            <a class="article-button" target="_blank" href="<?php echo get_uf('article_link'); ?>"><?php echo (get_uf('article_link_text')? get_uf('article_link_text') : 'LEARN MORE'); ?></a>
                        <?php endif; ?>
                    </div>

                    <div class="offset-xs-1 offset-md-0  col-xs-10 col-md-5 twitter-wrapper">
                        <h3><?php uf('social_media_feed_title'); ?></h3>
                        <div class="twit-feed-container">
                        
                        
                            <?php query_posts(array('category_name'=>'twitter','posts_per_page'=>12)); ?>
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
                                <div class="tweet-div">
                                    <img class="user-pic" src="<?php uf('tweet_display_pic')?>" />
                                    <h4><?php uf('tweet_display_name')?><span> <?php uf('tweet_user_name'); ?></span></h4>
                                    <p><?php the_content(); ?></p>
                                    <img style="height: 100px; <?php if( uf('tweet_media_url') == ''){echo 'display: none;';} ?>" src="<?php uf('tweet_media_url')?>" />
                                    <a href="<?php uf('tweet_url') ?>">View on Twitter</a>
                                </div>
                            <?php endwhile; endif; ?>
                            <?php wp_reset_query(); ?>

                        </div>
                    </div>

                        </div>
                    </div>

                </div>


            <!-- Featured event -->
            <div class="row flex-items-sm-center section-container home-featured-event">
                <div class="col-md-9">
                    <div class="row">
                    <?php get_template_part( 'loop-templates/content', 'featured-event' ) ?>
                    </div>
                 </div>
            </div>



                <div style="display: none;" class="row flex-items-sm-center section-container home-events-content">

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                </a>
                            <?php endif; ?>

                             <?php the_title( sprintf( '<h3 class="entry-title"><span><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></span></h3>' ); ?>
                            <a class="read-more-link" href="<?php the_permalink(); ?>">Read More</a>

                        <?php endwhile; ?>

                </div>


                 <?php $home_article_data = get_post_meta( get_the_ID(), 'home_articles', true );
                            foreach($home_article_data as $home_article){
                    ?>
                    <div class="row flex-items-sm-center section-container home-repeater">
                        <div class="col-xs-10 col-md-9 home-article">
                                <h2 class="red-font"><?php echo $home_article['home_article_title']; ?></h2>
                                <hr>
                                <div class="row">
                                    <p class="col-md-6"><?php echo $home_article['home_first_paragraph']; ?></p>
                                    <p class="col-md-6"><?php echo $home_article['home_second_paragraph']; ?></p>
                                </div>
                                <?php if ( $home_article['article_link']) : ?>
                                    <div class="home-link">
                                    <a href="<?php echo $home_article['article_link']; ?>" class="article-button">
                                        <?php echo ($home_article['article_link_text']? $home_article['article_link_text'] : 'Learn More' ); ?>
                                    </a>
                                    </div>

                                    <?php endif; ?>
                                <?php if(!$home_article['home_article_link_url'] == ''){echo "<a class='article-button' href='".$home_article['home_article_link_url']."'>".$home_article['home_article_link_title']."</a>";}; ?>
                        </div>

                    </div>

                    <?php } ?>

     </main><!-- #main -->

</div><!-- content end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

