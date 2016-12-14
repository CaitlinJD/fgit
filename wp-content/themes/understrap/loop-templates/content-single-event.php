<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */
$eventID = get_uf('events_meta_id');
$eventTitle = get_the_title();
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <!-- Mobile -->
    <div class="mobile hidden-sm-up col-xs-12">
        <div class="black-bkg">
            <header class="entry-header">
                <?php $ev_date = get_uf('events_meta_start_date');
                echo date('l, F d, Y', strtotime($ev_date)); ?>
                <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                <hr>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <div class="ticket-btn">
                    <?php echo '<a href="http://www.eventbrite.com/event/' . $eventID . '?ref=ebtn" class="white-font" target="_blank"><img border="0" src="http://www.eventbrite.com/custombutton?eid=' . $eventID . '" alt="Register for ' . $eventTitle . ' on Eventbrite" />Buy Tickets</a>'; ?>
                </div>
                <?php the_content(); ?>
                <div class="ticket-btn">
                    <?php echo '<a href="http://www.eventbrite.com/event/' . $eventID . '?ref=ebtn" class="white-font" target="_blank"><img border="0" src="http://www.eventbrite.com/custombutton?eid=' . $eventID . '" alt="Register for ' . $eventTitle . ' on Eventbrite" />Buy Tickets</a>'; ?>
                </div>
            </div><!-- .entry-content -->
        </div>

        <div class="event-img">
            <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
        </div><!-- .event-img -->

        <div class="additional-info">
                <div class="info-wording">
                    <?php if (get_uf('events_meta_ticket_price_member') || get_uf('events_meta_ticket_price_nonmember')) : ?>
                        <p class="detail-title"><b>Ticket Price</b></p>
                        <?php if (get_uf('events_meta_ticket_price_member') ): ?>
                            <p class="details">FGI Members - <span class="price-mem">$<?php echo uf('events_meta_ticket_price_member'); ?></span></p>
                        <?php endif; ?>
                        <?php if (get_uf('events_meta_ticket_price_nonmember') ): ?>
                            <p class="details">Non-Members - <span class="price-nonmem">$<?php echo uf('events_meta_ticket_price_nonmember'); ?></span></p>
                        <?php endif; ?>
                    <?php endif; ?>

                    <p class="detail-title"><b>Location</b></p>
                    <p class="details"><?php echo uf('events_meta_venue_name'); ?><?php echo ( ( get_uf('events_meta_venue_name') && get_uf('events_meta_venue_address') )? ', ' : '' ); ?>
                        <?php echo uf('events_meta_venue_address'); ?></p>
                </div>
        </div>
        <div class="event-map">
            <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo uf('events_meta_venue_lat') ?>,<?php echo uf('events_meta_venue_long') ?>&hl=es;z=14&amp;output=embed"></iframe>

        </div>

        <div class="ticket-btn last-btn">
            <?php echo '<a href="http://www.eventbrite.com/event/' . $eventID . '?ref=ebtn" class="white-font" target="_blank"><img border="0" src="http://www.eventbrite.com/custombutton?eid=' . $eventID . '" alt="Register for ' . $eventTitle . ' on Eventbrite" />Buy Tickets</a>'; ?>
        </div>


    </div>

    <!-- DESKTOP -->
    <div class="desktop hidden-xs-down col-sm-12">
        <div class="row custom-padding">
        <div class="event-content col-sm-6 col-md-7">
            <div class="event-wording">
                <header class="entry-header">
                    <?php
                    $ev_date = get_uf('events_meta_start_date');
                    echo date('l, F d, Y', strtotime($ev_date));
                    ?>

                    <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                    <hr>
                </header><!-- .entry-header -->
                <div class="entry-content">
                    <div class="ticket-btn">
                        <?php echo '<a href="http://www.eventbrite.com/event/' . $eventID . '?ref=ebtn" class="white-font" target="_blank"><img border="0" src="http://www.eventbrite.com/custombutton?eid=' . $eventID . '" alt="Register for ' . $eventTitle . ' on Eventbrite" />Buy Tickets</a>'; ?>
                    </div>
                    <?php the_content(); ?>
                    <div class="ticket-btn">
                        <?php echo '<a href="http://www.eventbrite.com/event/' . $eventID . '?ref=ebtn" class="white-font" target="_blank"><img border="0" src="http://www.eventbrite.com/custombutton?eid=' . $eventID . '" alt="Register for ' . $eventTitle . ' on Eventbrite" />Buy Tickets</a>'; ?>
                    </div>
                </div><!-- .entry-content -->
                <div class="info-wording">
                    <p class="detail-title"><b>Ticket Price</b></p>
                    <?php if (get_uf('events_meta_ticket_price_member') ): ?>
                        <p class="details">FGI Members - <span class="price-mem">$<?php echo uf('events_meta_ticket_price_member'); ?></span></p>
                    <?php endif; ?>
                    <?php if (get_uf('events_meta_ticket_price_nonmember') ): ?>
                        <p class="details">Non-Members - <span class="price-nonmem">$<?php echo uf('events_meta_ticket_price_nonmember'); ?></span></p>
                    <?php endif; ?>

                    <p class="detail-title"><b>Location</b></p>
                    <p class="details"><?php echo uf('events_meta_venue_name'); ?><?php echo ( ( get_uf('events_meta_venue_name') && get_uf('events_meta_venue_address') )? ', ' : '' ); ?>
                        <?php echo uf('events_meta_venue_address'); ?></p>

                    <div class="ticket-btn">
                        <?php echo '<a href="http://www.eventbrite.com/event/' . $eventID . '?ref=ebtn" class="white-font" target="_blank"><img border="0" src="http://www.eventbrite.com/custombutton?eid=' . $eventID . '" alt="Register for ' . $eventTitle . ' on Eventbrite" />Buy Tickets</a>'; ?>
                    </div>
                </div><!-- .info-wording -->
            </div>

        </div><!-- .event-content -->

        <div class="images col-sm-6 col-md-5">
            <div class="event-img ">
                <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
            </div><!-- .event-img -->

            <div class="location-map">
                <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo uf('events_meta_venue_lat') ?>,<?php echo uf('events_meta_venue_long') ?>&hl=es;z=14&amp;output=embed"></iframe>
            </div> <!-- .location-map -->
        </div><!-- .additional-info -->
        </div>
    </div>


</article><!-- #post-## -->