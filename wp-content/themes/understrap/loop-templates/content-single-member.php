<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="img-bkg col-xs-12" style="background: url('<?php echo the_post_thumbnail_url('full') ?>') center right/cover no-repeat"></div>
    <header class="entry-header col-xs-12 col-sm-12 col-md-8">
        <p class="red-font sm-line-ht"><b>BOARD MEMBER</b></p>
        <p class="red-font sm-line-ht"><b><?php echo get_post_meta( get_the_ID(), 'bio_position', true ); ?> </b></p>

        <?php the_title( '<h2 class="entry-title roboto">', '</h2>' ); ?>

        <p class="sm-line-ht"><b><?php echo get_post_meta( get_the_ID(), 'employment', true ); ?></b></p>
        <p class="sm-line-ht"><?php echo get_post_meta( get_the_ID(), 'employment_position', true ); ?> </p>

        <div class="entry-meta">

            <?php $key_1_value = get_post_meta( get_the_ID(), 'website_url', true );
            // check if the custom field has a value
            if ( ! empty( $key_1_value ) ) : ?>
                <a href="<?php get_post_meta( get_the_ID(), 'website_url', true ) ?>">
            <img src="<?php echo get_blog_info('template_url')?>/">
                </a>
            <?php endif; ?>

            <?php $key_1_value = get_post_meta( get_the_ID(), 'facebook_url', true );
            if ( ! empty( $key_1_value ) ) : ?>
                <a href="<?php get_post_meta( get_the_ID(), 'facebook_url', true ) ?>">
                    <img src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-fb.svg">
                </a>
            <?php endif; ?>

            <?php $key_1_value = get_post_meta( get_the_ID(), 'instagram_url', true );
            if ( ! empty( $key_1_value ) ) : ?>
                <a href="<?php get_post_meta( get_the_ID(), 'instagram_url', true ) ?>">
                    <img src="<?php echo get_blog_info('template_url')?>/">
                </a>
            <?php endif; ?>

            <?php $key_1_value = get_post_meta( get_the_ID(), 'twitter_url', true );
            if ( ! empty( $key_1_value ) ) : ?>
                <a href="<?php get_post_meta( get_the_ID(), 'twitter_url', true ) ?>">
                    <img src="<?php echo get_blog_info('template_url')?>/">
                </a>
            <?php endif; ?>



        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->


    <div class="entry-content col-xs-12 col-sm-12 col-md-8">
        <?php $key_1_value = get_post_meta( get_the_ID(), 'fave_store', true );
        if ( ! empty( $key_1_value ) ) : ?>
            <p><b>Favourite Toronto Store </b> <?php echo get_post_meta( get_the_ID(), 'fave_store', true ); ?> </p>
        <?php endif; ?>

        <?php $key_1_value = get_post_meta( get_the_ID(), 'fave_clothing', true );
        if ( ! empty( $key_1_value ) ) : ?>
            <p><b>Favourite piece of clothing </b> <?php echo get_post_meta( get_the_ID(), 'fave_clothing', true ); ?> </p>
        <?php endif; ?>

        <?php $key_1_value = get_post_meta( get_the_ID(), 'style_icon', true );
        if ( ! empty( $key_1_value ) ) : ?>
            <p><b>Style Icon </b> <?php echo get_post_meta( get_the_ID(), 'style_icon', true ); ?> </p>
        <?php endif; ?>

        <?php $key_1_value = get_post_meta( get_the_ID(), 'fave_website', true );
        if ( ! empty( $key_1_value ) ) : ?>
            <p><b>Favourite Website </b> <?php echo get_post_meta( get_the_ID(), 'fave_website', true ); ?> </p>
        <?php endif; ?>

        <?php $key_1_value = get_post_meta( get_the_ID(), 'fave_designer', true );
        if ( ! empty( $key_1_value ) ) : ?>
            <p><b>Favourite Canadian designer </b> <?php echo get_post_meta( get_the_ID(), 'fave_designer', true ); ?> </p>
        <?php endif; ?>

        <h2 class="margin-top">&ldquo;<?php echo get_post_meta( get_the_ID(), 'bio_quote', true ); ?>&rdquo;
            <br> ~ <?php echo get_post_meta( get_the_ID(), 'quote_author', true ); ?>
        </h2>


    </div><!-- .entry-content -->

</article><!-- #post-## -->