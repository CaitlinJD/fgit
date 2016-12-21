<?php
/**
 * Custom post queries.
 *
 */

function pre_events_query($query) {
//global $query;
    $paged = get_query_var( 'paged' );
    $page = ( !$paged ? 1 : $paged );
    $query->set('paged', $page );

    if( ! $query->is_main_query()) return;
    if (!isset($query->query["tax_query"][0]["compare"])) {
        // Second query for events archive
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
    }

}

add_action( 'pre_get_posts', 'pre_events_query' );



//
add_filter( 'pre_get_posts', 'check_for_tax' );
function check_for_tax( $query ) {
    if ( $query->is_tax( 'membercategory', 'board-member' )  ) {
        $query->set("posts_per_page",-1);
    }
    if ( $query->is_tax( 'membercategory', 'success-stories' )  ) {
        $query->set("posts_per_page",-1);
    }
    if ( $query->is_tax( 'partnercategory', 'mentors' )  ) {
        $query->set("posts_per_page",-1);
    }
    if ( $query->is_tax( 'partnercategory', 'speakers' )  ) {
        $query->set("posts_per_page",-1);
    }

    // Instagram / Gallery query
    if (is_archive() && is_category('instagram') && !is_admin()) {
        $query->set('posts_per_page', 12);

    }
}
