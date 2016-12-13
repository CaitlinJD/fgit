<?php
/**
 * Custom post queries.
 *
 */

function pre_events_query($query) {
//global $query;
    if (!isset($query->query["tax_query"][0]["compare"])) {
        if (is_archive() && is_post_type_archive('event') && !is_admin()) {
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'eventcategory',
                    'terms' => 'upcoming-events',
                    'field' => 'slug'
                )
            ));
            $query->set('posts_per_page', -1);

        }

        if (is_front_page()) {
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'eventcategory',
                    'terms' => 'upcoming-events',
                    'field' => 'slug'
                )
            ));
            $query->set('posts_per_page', 1);

        }
    }

}

add_action( 'pre_get_posts', 'pre_events_query' );

