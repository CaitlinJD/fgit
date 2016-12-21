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
            <?php if (get_uf('buy_tickets') == 'yes') : ?>
            <!-- Add btn to buy tickets for featured event on Mentors Archive -->
                <?php
                $eventID = get_uf('events_meta_id');
                $eventTitle = get_the_title();
                ?>

                <div class="ticket-btn col-xs-12">
                    <?php echo '<a href="http://www.eventbrite.com/event/' . $eventID . '?ref=ebtn" class="white-font" target="_blank"><img border="0" src="http://www.eventbrite.com/custombutton?eid=' . $eventID . '" alt="Register for ' . $eventTitle . ' on Eventbrite" />Buy Tickets</a>'; ?>
                </div>
                <?php return; ?><!-- only let one event be featured -->
            <?php endif; ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query(); ?>
