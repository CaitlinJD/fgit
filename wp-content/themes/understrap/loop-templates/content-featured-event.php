<?php
wp_reset_postdata();
$args = array(
    "post_type"=>"event",
    "posts_per_page"=>-1,
);

$query = new WP_Query($args);
?>
<?php if ( have_posts() ) : ?>

    <?php
    while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php $var = get_uf('featured_event'); ?>
        <?php if ($var == 'yes') : ?>

            <!-- Add just the featured event -->
                <div class="row">
                    <div class="img-bkg hidden-xs-down col-sm-6 col-md-6" style="background: url('<?php echo the_post_thumbnail_url('large') ?>') center right/cover no-repeat"></div>
                    <div class="event-info col-xs-12 col-sm-6 col-md-6">
                        <?php echo (is_front_page()? "<h3 class='red-font'>" : "<h1 class='red-font'>"); ?>
                            <?php the_title() ?>
                        <?php echo (is_front_page()? "</h3>" : "</h1>"); ?>
                        <p><?php the_excerpt() ?></p>
                    </div>
                </div>
                <?php return; ?> <!-- only let one event be featured -->

        <?php endif; ?>
    <?php endwhile; ?>


<?php endif; ?>


<?php wp_reset_query(); ?>