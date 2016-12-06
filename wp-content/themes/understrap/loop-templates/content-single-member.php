<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="img-bkg" style="background: url('<?php echo get_the_post_thumbnail( 'rectangle-thumb' ) ?>') center left/cover no-repeat"></div>
    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
    <header class="entry-header">
        <p>BOARD MEMBER</p>
        <p><?php echo get_post_meta( get_the_ID(), 'bio_position', true ); ?> </p>

        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

        <p><?php echo get_post_meta( get_the_ID(), 'employment_position', true ); ?> </p>
        <p><?php echo get_post_meta( get_the_ID(), 'employment', true ); ?></p>

        <div class="entry-meta">

            <?php $key_1_value = get_post_meta( get_the_ID(), 'website_url', true );
            // check if the custom field has a value
            if ( ! empty( $key_1_value ) ) : ?>
            <img src="<?php echo get_blog_info('template_url')?>/">

        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->


    <div class="entry-content">

        <p><?php echo get_post_meta( get_the_ID(), 'fave_store', true ); ?> </p>
        <p><?php echo get_post_meta( get_the_ID(), 'fave_clothing', true ); ?> </p>
        <p><?php echo get_post_meta( get_the_ID(), 'style_icon', true ); ?> </p>
        <p><?php echo get_post_meta( get_the_ID(), 'fave_website', true ); ?> </p>
        <p><?php echo get_post_meta( get_the_ID(), 'fave_designer', true ); ?> </p>

        <h2>" "</h2>

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
