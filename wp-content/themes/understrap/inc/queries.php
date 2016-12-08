<?php

/**

 * Custom post queries.

 *

 */



function pre_events_query($query) {

//global $query;



    if (is_archive() && is_post_type_archive( 'event' ) ) {

        $query -> set ('tax_query', array(

            array(

                'taxonomy' => 'eventcategory',

                'terms' => 'upcoming-events',

                'field' => 'slug'

            )

        ) );

    }



    if (is_front_page()) {

        $query -> set ('tax_query', array(

            array(

                'taxonomy' => 'eventcategory',

                'terms' => 'upcoming-events',

                'field' => 'slug'

            )

        ) );

        $query -> set ( 'posts_per_page', 1 );



    }



}



add_action( 'pre_get_posts', 'pre_events_query' );