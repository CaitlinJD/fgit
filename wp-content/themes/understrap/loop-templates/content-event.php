<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="row">
        <header class="entry-header col-xs-12 col-sm-6  <?php echo(is_archive()? 'content-right' : ''); ?>">
            <?php if (is_single()) : ?>
                <?php the_post_thumbnail( 'large' ); ?>
            <?php endif; ?>

            <?php
            $ev_date = get_uf('events_meta_start_date');
            echo date('l, F d, Y', strtotime($ev_date));
            ?>

            <h2><?php the_title() ?></h2>
            <hr>

            <?php if (is_archive()) : ?>
                <?php the_excerpt() ?>
            <?php else : ?>
                <?php the_content() ?>
            <?php endif; ?>

        </header><!-- .entry-header -->

        <div class="entry-content col-sm-6 col-md-6 <?php echo(is_archive()? 'hidden-xs-down pic-left' : ''); ?>">
            <?php if (is_archive() ) : ?>
                <?php the_post_thumbnail( 'large' ); ?>
            <?php else : ?>

            <?php endif; ?>
        </div><!-- .entry-content -->

    </div> <!-- end of row -->

</article><!-- #post-## -->
