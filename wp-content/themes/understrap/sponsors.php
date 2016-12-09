<?php /* Template Name: Sponsors */ ?>

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
            
             
                <div class="row section-container">

                    <div class="offset-xs-1 offset-md-2 col-xs-10 col-md-8 col-lg-6 page-intro sponsorship-main-content">
                    <?php while ( have_posts() ) : the_post(); ?>	
                        <h2 class="page-title"><?php the_title(); ?></h2>
                       <p><?php the_content(); ?></p>
                       <?php endwhile; ?>
                    </div>

                    <div class="offset-xs-3 offset-md-2 col-md-8 col-xs-6 sponsor-logo-section">
                        
                        <?php $sponsorship_logos = get_post_meta( get_the_ID(), 'sponsorship_logos', true );
                            foreach($sponsorship_logos as $logo){                             
                                
                                $image_array = (wp_get_attachment_image_src($logo['sponsorship_logo'], 'medium'));
                                echo "<img class='col-xs-12 col-sm-6 col-md-4 col-lg-3' src='".$image_array[0]."' />";
                            }
                        ?>
                                 
                    </div>

                </div>  

                <div class="row">
                    <div class="offset-md-2 offset-xs-1 col-xs-10 col-md-5 col-lg-4 article-container sponsorship-secondary-container">
                        <h3 class="white-font"><?php uf('sponsorship_secondary_title'); ?></h3>
                        <hr>
                        <?php uf('sponsorship_secondary_content'); ?>
                        <a class="article-button" href="mailto: info@fgitoronto.org">Learn More</a>
                    </div>
                </div>    
                         

     </main><!-- #main -->

</div><!-- content end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

