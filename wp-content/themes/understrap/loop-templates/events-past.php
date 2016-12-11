<?php

$args = array(
    "post_type"=>"event",
    "posts_per_page"=>4,
    'tax_query' => array(
        array(
            'taxonomy' => 'eventcategory',
            'terms' => 'past-events',
            'field' => 'slug',
            'compare' => 'ignore'
        )
    )
);

$query = new WP_Query($args);
?>

<?php if ( have_posts() ) : ?>
    <!--  Event post type heading -->
    <?php
    $category = get_term_by( 'term_taxonomy_id', 3, get_query_var('taxonomy') );
    echo "<div class='col-xs-12 col-sm-12'><p class='second-title'><b>".$category->name."</b></p></div>";


    while ( $query->have_posts() ) : $query->the_post(); ?>

        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

            <header class="entry-header col-xs-12 col-sm-6">

                <div>
                    <div class="red-block inline-block"></div>
                    <div class="inline-block">
                        <?php
                        $ev_date = get_uf('events_meta_start_date');
                        echo date('l, F d, Y', strtotime($ev_date));
                        ?>
                    </div>
                </div>

                <h2><?php the_title() ?></h2>

                <a href="<?php the_permalink() ?>" class="event-link">Learn more</a>


            </header><!-- .entry-header -->

        </article><!-- #post-## -->


    <?php endwhile; ?>

    <!-- The pagination component -->
    <?php understrap_pagination(); ?>

<?php endif; ?>

<?php wp_reset_query(); ?>


