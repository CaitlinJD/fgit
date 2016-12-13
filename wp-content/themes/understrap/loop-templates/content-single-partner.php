<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <?php if (get_the_post_thumbnail()) : ?>
        <div class="img-bkg col-xs-12" style="background: url('<?php echo the_post_thumbnail_url('full') ?>') center right/cover no-repeat"></div>
    <?php endif; ?>

    <header class="entry-header col-xs-12 col-sm-12 col-md-8">
        <!-- Taxonomy Term -->
        <?php
            $post_id = get_the_ID();
            $category = wp_get_post_terms( $post_id, 'partnercategory');
            echo "<p class=\"red-font sm-line-ht\"><b>".$category[0]->name."</b></p>";
        ?>


        <!-- Name -->
        <?php the_title( '<h2 class="entry-title roboto">', '</h2>' ); ?>

        <!-- Position -->
        <p class="sm-line-ht"><b><?php echo get_post_meta( get_the_ID(), 'bio_position', true ); ?> </b></p>


        <div class="entry-meta">
            <!-- Social Media -->
            <?php if ( get_uf('website_url') ) : ?>
                <a href="<?php echo get_post_meta( get_the_ID(), 'website_url', true ) ?>" target="_blank">
                    <img src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-site.png" class="black-icons">
                </a>
            <?php endif; ?>

            <?php if ( get_uf('facebook_url') ) : ?>
                <a href="<?php echo get_post_meta( get_the_ID(), 'facebook_url', true ) ?>" target="_blank">
                    <img class="black-icons" src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-fb.png">
                </a>
            <?php endif; ?>

            <?php if ( get_uf('instagram_url') ) : ?>
                <a href="<?php echo get_post_meta( get_the_ID(), 'instagram_url', true ) ?>" target="_blank">
                    <img class="black-icons" src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-insta.png">
                </a>
            <?php endif; ?>

            <?php if ( get_uf('twitter_url') ) : ?>
                <a href="<?php echo get_post_meta( get_the_ID(), 'twitter_url', true ) ?>" target="_blank">
                    <img class="black-icons" src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-twitter.png">
                </a>
            <?php endif; ?>



        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

    <!-- Highlights box -->
    <?php if (get_uf('box_title') || get_uf('box_content') ) : ?>
    <aside class="highlight-box">
        <?php if ( get_uf('box_title') ) : ?>
            <h2><?php echo get_post_meta( get_the_ID(), 'box_title', true ); ?></h2>
        <?php endif; ?>
        <hr>
        <?php if ( get_uf('box_content') ) : ?>
            <p><?php echo uf('box_content'); ?></p>
        <?php endif; ?>
    </aside>
    <?php endif; ?>

    <div class="entry-content col-xs-12 col-sm-12 col-md-8">
        <!-- Content -->
        <?php the_content() ?>




    </div><!-- .entry-content -->


</article><!-- #post-## -->