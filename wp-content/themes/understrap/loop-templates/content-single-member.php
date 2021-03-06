<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <?php if (get_the_post_thumbnail()) :?>
    <div class="img-bkg col-xs-12" style="background: url('<?php echo the_post_thumbnail_url('full') ?>') center right/cover no-repeat"></div>
    <?php endif; ?>
    <header class="entry-header col-xs-12 col-sm-12 col-md-8">
        <?php
            $post_id = get_the_ID();
            $category = wp_get_post_terms( $post_id, 'membercategory');
            echo "<p class=\"red-font sm-line-ht\"><b>".$category[0]->name."</b></p>";
        ?>
        <p class="red-font sm-line-ht"><b><?php echo get_post_meta( get_the_ID(), 'bio_position', true ); ?> </b></p>

        <?php the_title( '<h2 class="entry-title roboto">', '</h2>' ); ?>

        <p class="sm-line-ht"><b><?php echo get_post_meta( get_the_ID(), 'employment', true ); ?></b></p>
        <p class="sm-line-ht"><?php echo get_post_meta( get_the_ID(), 'employment_position', true ); ?> </p>

        <div class="entry-meta">
            <!-- Social Media -->
            <?php if ( get_uf('website_url') ) : ?>
                <a href="<?php echo get_uf( 'website_url') ?>" target="_blank">
            <img src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-site.png" class="black-icons">
                </a>
            <?php endif; ?>

            <?php if ( get_uf('facebook_url') ) : ?>
                <a href="<?php echo get_uf( 'facebook_url' ) ?>" target="_blank">
                    <img class="black-icons" src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-fb.png">
                </a>
            <?php endif; ?>

            <?php if ( get_uf('instagram_url') ) : ?>
                <a href="<?php echo get_uf( 'instagram_url' ) ?>" target="_blank">
                    <img class="black-icons" src="<?php echo get_bloginfo('template_url')?>/assets/SocialMediaIconsSVGFiles/black-insta.png">
                </a>
            <?php endif; ?>

            <?php if ( get_uf('twitter_url') ) : ?>
                <a href="<?php echo get_uf( 'twitter_url' ) ?>" target="_blank">
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
        <?php if ( get_uf('bio_quote') ) : ?>
            <h2 class="margin-top red-font">&ldquo;<?php echo get_post_meta( get_the_ID(), 'bio_quote', true ); ?>&rdquo;
                <?php if (get_uf('quote_author')) : ?>
                <br> ~ <?php echo get_uf( 'quote_author' ); ?>
                <?php endif; ?>
            </h2>
        <?php endif; ?>

        <?php if (the_content()) : ?>
        <div class="body-content">
            <?php the_content() ?>
        </div>
        <? endif; ?>



    </div><!-- .entry-content -->

</article><!-- #post-## -->