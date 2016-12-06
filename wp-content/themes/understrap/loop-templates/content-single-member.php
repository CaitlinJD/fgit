<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="img-bkg" style="background: url('<?php echo get_the_post_thumbnail( 'rectangle-thumb' ) ?>') center left/cover no-repeat"></div>
    <header class="entry-header">
        <p>BOARD MEMBER</p>
        <p><?php echo get_post_meta( get_the_ID(), 'bio_position', true ); ?> </p>

        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

        <div class="entry-meta">

            <?php understrap_posted_on(); ?>

        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->

    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

    <div class="entry-content">

        <?php the_content(); ?>

        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
            'after'  => '</div>',
        ) );
        ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

        <?php understrap_entry_footer(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-## -->
