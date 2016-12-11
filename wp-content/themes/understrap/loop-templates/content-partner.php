<?php
/**
 * Archive template.
 *
 * @package understrap
 */
?>
<article class="col-xs-12">
        <div class="img-bkg hide-xs-down col-sm-12" style="background: url('<?php echo the_post_thumbnail_url('full') ?>')center right/cover no-repeat">
        </div>

        <div class="overlay partner col-xs-12 col-sm-4 push-sm-2 text-xs-center">
            <div class="relative-position">
                <p class="card-text name"><b><?php the_title() ?></b></p>
                <p class="card-text"><?php echo uf('bio_position'); ?></p>
                <hr>
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

