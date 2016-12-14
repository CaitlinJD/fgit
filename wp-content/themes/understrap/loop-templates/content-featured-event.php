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
            <!-- Add btn to buy tickets for featured event on Mentors Archive -->
            <?php if (is_tax('partnercategory', 'mentors')) : ?>
                <?php
                $eventID = get_uf('events_meta_id');
                $eventTitle = get_the_title();
                ?>

                    <div class="ticket-btn col-xs-12">
                        <?php echo '<a href="http://www.eventbrite.com/event/' . $eventID . '?ref=ebtn" class="white-font" target="_blank"><img border="0" src="http://www.eventbrite.com/custombutton?eid=' . $eventID . '" alt="Register for ' . $eventTitle . ' on Eventbrite" />Buy Tickets</a>'; ?>
                    </div>
                <?php return; ?><!-- only let one event be featured -->
            <?php endif; ?>

            <!-- Add just the featured event -->
            <?php if (is_front_page()) : ?>
                <div class="row">
                    <div class="img-bkg hidden-xs-down col-sm-6 col-md-6" style="background: url('<?php echo the_post_thumbnail_url('large') ?>') center right/cover no-repeat"></div>
                    <div class="event-info col-xs-12 col-sm-6 col-md-6">
                        <h3><?php the_title() ?></h3>
                        <p><?php the_excerpt() ?></p>
                    </div>
                </div>
                <?php return; ?> <!-- only let one event be featured -->
            <?php endif; ?>

        <?php endif; ?>
    <?php endwhile; ?>


<?php endif; ?>


<?php wp_reset_query(); ?>