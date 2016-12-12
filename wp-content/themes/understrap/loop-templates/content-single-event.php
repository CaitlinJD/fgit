<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <!-- Mobile -->
    <div class="mobile hidden-sm-up col-xs-12">
        <header class="entry-header">
            <?php $ev_date = get_uf('events_meta_start_date');
            echo date('l, F d, Y', strtotime($ev_date)); ?>
            <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
            <hr>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <a href="#" class="buy-tickets-btn">Buy Tickets</a>
            <?php the_content(); ?>
            <a href="#" class="buy-tickets-btn">Buy Tickets</a>
        </div><!-- .entry-content -->

        <div class="event-img">
            <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
        </div><!-- .event-img -->

        <div class="additional-info">
            <p>Ticket Price</p>
            <?php if (get_uf('events_meta_ticket_price_member') ): ?>
                <p>FGI Members - <span class="price-mem">$<?php echo uf('events_meta_ticket_price_member'); ?></span></p>
            <?php endif; ?>
            <?php if (get_uf('events_meta_ticket_price_nonmember') ): ?>
                <p>Non-Members - <span class="price-nonmem">$<?php echo uf('events_meta_ticket_price_nonmember'); ?></span></p>
            <?php endif; ?>

            <p>Location</p>
            <p><?php echo uf('events_meta_venue_address'); ?></p>

            <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo uf('events_meta_venue_lat') ?>,<?php echo uf('events_meta_venue_long') ?>&hl=es;z=14&amp;output=embed"></iframe>
        </div>

        <a href="#" class="buy-tickets-btn">Buy Tickets</a>


    </div>

    <!-- DESKTOP -->
    <div class="desktop hidden-xs-down col-sm-12">
        <div class="<?php echo esc_html( $container );?>">
        <div class="event-content">
            <div class="event-wording">
                <header class="entry-header">
                    <?php
                    $ev_date = get_uf('events_meta_start_date');
                    echo date('l, F d, Y', strtotime($ev_date));
                    ?>

                    <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                </header><!-- .entry-header -->
                <div class="entry-content">
                    <a href="#" class="buy-tickets-btn">Buy Tickets</a>
                    <?php the_content(); ?>
                    <a href="#" class="buy-tickets-btn">Buy Tickets</a>
                </div><!-- .entry-content -->
            </div>
            <div class="event-img">
                <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
            </div><!-- .event-img -->
        </div><!-- .event-content -->

        <div class="additional-info">
           <div class="info-wording">
               <p>Ticket Price</p>
               <?php if (get_uf('events_meta_ticket_price_member') ): ?>
                   <p>FGI Members - <span class="price-mem">$<?php echo uf('events_meta_ticket_price_member'); ?></span></p>
               <?php endif; ?>
               <?php if (get_uf('events_meta_ticket_price_nonmember') ): ?>
                   <p>Non-Members - <span class="price-nonmem">$<?php echo uf('events_meta_ticket_price_nonmember'); ?></span></p>
               <?php endif; ?>

               <p>Location</p>
               <p><?php echo uf('events_meta_venue_address'); ?></p>
           </div><!-- .info-wording -->
            <div class="location-map">
                <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo uf('events_meta_venue_lat') ?>,<?php echo uf('events_meta_venue_long') ?>&hl=es;z=14&amp;output=embed"></iframe>
            </div> <!-- .location-map -->
        </div><!-- .additional-info -->

    </div>


</article><!-- #post-## -->