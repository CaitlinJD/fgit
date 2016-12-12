<?php /* Template Name: Home Page */ ?>

<?php

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
// On WooCommerce pages there is no need for sidebars as they leave
// too little space for WooCommerce itself. We check if WooCommerce
// is active and the current page is a WooCommerce page and we do
// not render sidebars.
$is_woocommerce = false;
$this_page_id   = get_queried_object_id();
if ( class_exists( 'WooCommerce' ) ) {

    if ( is_woocommerce() || is_shop() || get_option( 'woocommerce_shop_page_id' ) === $this_page_id ||
        get_option( 'woocommerce_cart_page_id' ) == $this_page_id || get_option( 'woocommerce_checkout_page_id' ) == $this_page_id ||
        get_option( 'woocommerce_pay_page_id' ) == $this_page_id || get_option( 'woocommerce_thanks_page_id' ) === $this_page_id ||
        get_option( 'woocommerce_myaccount_page_id' ) == $this_page_id || get_option( 'woocommerce_edit_address_page_id' ) == $this_page_id ||
        get_option( 'woocommerce_view_order_page_id' ) == $this_page_id || get_option( 'woocommerce_terms_page_id' ) == $this_page_id
    ) {

        $is_woocommerce = true;
    }
}
?>

<div class="wrapper" id="page-wrapper">

    <div id="content" tabindex="-1">

    <main class="site-main" id="main">	
            
             
                <div class="row home-banner section-container" style="background-image: url(<?php echo uf('banner_image'); ?>">

                    <div class="offset-xs-1 offset-md-2 col-xs-8 col-md-6 col-lg-5">
                    
                        <h2 class="banner-title">
                        <?php echo uf( 'banner_title'); ?>
                        <h2>
                        <a id="home-banner-button" class="article-button" href="<?php echo uf('banner_image'); ?>">Upcoming Events</a>
                    </div>

                </div> 

                <div class="row flex-items-sm-center section-container home-secondary-content">

                    <div class="offset-xs-1 offset-md-2 col-xs-10 col-md-5 article-container">
                        <h3><?php echo uf('article_title'); ?></h3>
                        <hr>
                        <p><?php echo uf('article_content'); ?></p>
                        <a class="article-button" href="#">MEMBERSHIP</a>
                        
                    </div>

                    <div class="offset-xs-1 offset-md-0  col-xs-10 col-md-4 twitter-wrapper">
                        <h3>Keep In Touch With Us</h3>
                        <div class="twit-feed-container">
                            <?php getTwitterInfo($twitter_data); ?>
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
                

                <div class="row flex-items-sm-center section-container home-third-content">                

                    <div class="col-xs-10 col-md-8 offset-xs-1">
                    <?php $homeArticleData = get_post_meta( get_the_ID(), 'home_articles', true );?>
                            <h3><?php echo $homeArticleData[0]['home_article_title']; ?></h3>
                            <hr>
                            <div class="row">
                                <p class="col-md-6"><?php echo $homeArticleData[0]['home_first_paragraph']; ?></p>
                                <p class="col-md-6"><?php echo $homeArticleData[0]['home_second_paragraph']; ?></p>
                            </div>
                            <a class="article-button" href="#">NEWSLETTER SIGNUP</a>
                    </div>

                    <div class="col-xs-5 article-container">
                    </div>

                </div>

                <div class="row flex-items-sm-center section-container home-fourth-content">
                
                    <div class="col-xs-10 col-md-8 offset-xs-1">
                    <?php $homeArticleData = get_post_meta( get_the_ID(), 'home_articles', true );?>
                            <h3><?php echo $homeArticleData[1]['home_article_title']; ?></h3>
                            <hr>
                            <div class="row">
                                <p class="col-xs-12 col-md-6"><?php echo $homeArticleData[1]['home_first_paragraph']; ?></p>
                                <p class="col-xs-12 col-md-6"><?php echo $homeArticleData[1]['home_second_paragraph']; ?></p>
                            </div>
                            <a class="article-button" href="#">NEWSLETTER SIGNUP</a>
                    </div>

                </div>

     </main><!-- #main -->

</div><!-- content end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

