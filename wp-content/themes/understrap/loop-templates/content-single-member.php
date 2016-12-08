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
            <!-- Social Media -->
            <?php $key_1_value = get_post_meta( get_the_ID(), 'website_url', true );
            // check if the custom field has a value
            if ( ! empty( $key_1_value ) ) : ?>
                <a href="<?php echo get_post_meta( get_the_ID(), 'website_url', true ) ?>" target="_blank">
            <img src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-site.png" class="black-icons">
                </a>
            <?php endif; ?>

            <?php $key_1_value = get_post_meta( get_the_ID(), 'facebook_url', true );
            if ( ! empty( $key_1_value ) ) : ?>
                <a href="<?php echo get_post_meta( get_the_ID(), 'facebook_url', true ) ?>" target="_blank">
                    <img class="black-icons" src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-fb.png">
                </a>
            <?php endif; ?>

            <?php $key_1_value = get_post_meta( get_the_ID(), 'instagram_url', true );
            if ( ! empty( $key_1_value ) ) : ?>
                <a href="<?php echo get_post_meta( get_the_ID(), 'instagram_url', true ) ?>" target="_blank">
                    <img class="black-icons" src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-insta.png">
                </a>
            <?php endif; ?>

            <?php $key_1_value = get_post_meta( get_the_ID(), 'twitter_url', true );
            if ( ! empty( $key_1_value ) ) : ?>
                <a href="<?php echo get_post_meta( get_the_ID(), 'twitter_url', true ) ?>" target="_blank">
                    <img class="black-icons" src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-twitter.png">
                </a>
            <?php endif; ?>



        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->


    <div class="entry-content col-xs-12 col-sm-12 col-md-8">
        <!-- Question and Answers -->
        <?php
        $question_answers = get_uf('question__answers');
        if ($question_answers) {
            foreach ($question_answers as $question_answer) {
                echo "<p><b>" . $question_answer['question'] . " </b> " . $question_answer['answer'] . "</p>";
            }
        }
        ?>

        <!-- Quote -->
        <?php $key_1_value = get_post_meta( get_the_ID(), 'bio_quote', true );
        if ( ! empty( $key_1_value ) ) : ?>
            <h2 class="margin-top">&ldquo;<?php echo get_post_meta( get_the_ID(), 'bio_quote', true ); ?>&rdquo;
                <br> ~ <?php echo get_post_meta( get_the_ID(), 'quote_author', true ); ?>
            </h2>
        <?php endif; ?>



    </div><!-- .entry-content -->

</article><!-- #post-## -->