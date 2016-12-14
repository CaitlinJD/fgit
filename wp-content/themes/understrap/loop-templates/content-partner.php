<?php
/**
 * Archive template.
 *
 * @package understrap
 */
?>
<article class="col-xs-12">
        <?php if (get_the_post_thumbnail()) : ?>
            <div class="img-bkg col-sm-12" style="background: url('<?php echo the_post_thumbnail_url('full') ?>')center right/cover no-repeat">
            </div>
        <?php else : ?>
            <div class="img-bkg col-sm-12" style="background-color: rgba(0, 0, 0, 0.3)"></div>
        <?php endif; ?>

        <div class="overlay partner col-xs-12 col-sm-5 push-sm-1 text-xs-center">
            <div class="relative-position">
                <p class="card-text name"><b><?php the_title() ?></b></p>
                <p class="card-text"><?php echo uf('bio_position'); ?></p>
                <?php if ( get_uf('bio_quote') ) : ?>
                <hr>
                <h2>&ldquo;<?php echo uf('bio_quote'); ?>&rdquo;</h2>
                <?php endif; ?>
                <a class="post-link" href="<?php the_permalink(); ?>">
                        <?php if ( get_uf('read_more_text') ) : ?>
                        <?php echo uf('read_more_text'); ?>
                        <?php else : ?>
                        READ MORE
                        <?php endif; ?>
                </a>
            </div>
        </div>

</article>

