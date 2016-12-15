<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function understrap_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'understrap_body_classes' );

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter( 'body_class', 'adjust_body_class' );

if ( ! function_exists( 'adjust_body_class' ) ) {
	/**
	 * Setup body classes.
	 *
	 * @param string $classes CSS classes.
	 *
	 * @return mixed
	 */
	function adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( $value == 'tag' ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;

	}
}

// Filter custom logo with correct classes.
add_filter( 'get_custom_logo', 'change_logo_class' );

if ( ! function_exists( 'change_logo_class' ) ) {
	/**
	 * Replaces logo CSS class.
	 *
	 * @param string $html Markup.
	 *
	 * @return mixed
	 */
	function change_logo_class( $html ) {
		$html = str_replace( 'class="custom-logo"', 'class="img-responsive"', $html );
		$html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );

		return $html;
	}
}


if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'rectangle-thumb', 380, 320, true );
    add_image_size('square-thumb', 400, 400, true);
}

add_filter( 'wp_nav_menu_items','add_search_box', 1, 2 );
function add_search_box( $items, $args ) {
    $items = '<li>' . get_search_form( false ) . '</li>'.$items;
    return $items;
}

// Limit the number of words in the_excerpt
function custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



// Add Quote part way through the content
add_filter('the_content','prepend_this');

function prepend_this($content) {
    $term = wp_get_post_terms( get_the_ID(), "partnercategory" );
    if ($term[0]->taxonomy == "partnercategory" && is_single() && !is_admin() ) {
        if (get_uf('bio_quote')) {
            $quote = "<h2 class='quote'>&ldquo;" . get_uf('bio_quote') . "&rdquo;</h2>";
        } else {
            $quote = '';
        }
        $ad_code = $quote;
        if (is_single() && !is_admin()) {
            return prefix_insert_after_paragraph($ad_code, 3, $content);
        }
    }
    return $content;
}

// Parent Function that makes the magic happen
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    $par_num = count($paragraphs);
    // Check if number of paragraph is less than 3
    if ($par_num < $paragraph_id ) {
        $paragraph_id = $par_num;
    }
    foreach ($paragraphs as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    return implode( '', $paragraphs );
}




// Custom pagination for load more
function custom_pagination($wp_query) {
    $past_evt_query = $wp_query->query_vars;
    $total_posts = $wp_query->found_posts;
    $posts_per_page = $past_evt_query['posts_per_page'];
    $current_page = $past_evt_query['paged'];

    $total_pages = ceil ($total_posts / $posts_per_page );

    // return if only 1 page
    if ($total_pages == 1 || $total_pages < 0) {
        return;
    }

    // Load more
    if ( $current_page < $total_pages ) {
        $url = home_url(add_query_arg(array(),$wp->request));
        $url .= '/event/page/';
        $url .= $current_page + 1;
        echo "<div class='load-more'><a href='".$url."'>LOAD MORE</a></div>";
    }
}


// Cron job
// Run Facebook, Twitter, Eventbrite, Instagram plugins once daily

add_action('my_hourly_event', 'do_this_hourly');

function my_activation() {
    if ( !wp_next_scheduled( 'my_daily_event' ) ) {
        wp_schedule_event( current_time( 'timestamp' ), 'daily', 'my_daily_event');
    }
}

add_action('wp', 'my_activation');

function do_this_daily() {
    // Eventbrite
    if (class_exists('build_event')) {
        $var = new event_build;
        $var->build_event();
    }

    // Twitter
    if (class_exists('build_tweet')) {
        $var = new raw_twitter_build;
        $var->build_tweet();
    }

    // Instagram
    if ( class_exists('build_insta_post')) {
        $var = new raw_insta_build;
        $var->build_insta_post();
    }

    // Facebook
    if (class_exists('build_facebook_post')) {
        $var = new raw_facebook_build;
        $var->build_facebook_post();
    }
}

