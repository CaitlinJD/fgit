<?php
wp_reset_postdata();
$args = array(
    "post_type"=>"event",
    "posts_per_page"=>4,
    "paged" => 1,
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
    <div class="past-events">
        <!--  Event post type heading -->
        <?php
        $category = get_term_by( 'term_taxonomy_id', 3, get_query_var('taxonomy') );
        echo "<div class='col-xs-12 col-sm-12'><p class='second-title'><b>".$category->name."</b></p></div>"; ?>

        <div class="row">

        <?php
        while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="article-wrapper col-xs-12 col-sm-6">

            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                <header class="entry-header">

                    <div>
                        <div class="red-block inline-block"></div>
                        <div class="event-date inline-block">
                            <?php
                            $ev_date = get_uf('events_meta_start_date');
                            echo date('l, F d, Y', strtotime($ev_date));
                            ?>
                        </div>
                    </div>

                    <h3><?php the_title() ?></h3>

                    <a href="<?php the_permalink() ?>" class="event-link"><?php echo ( get_uf("read_more_text")? get_uf("read_more_text") : "Learn More"); ?></a>


                </header><!-- .entry-header -->

            </article><!-- #post-## -->

            </div>
        <?php endwhile; ?>

        <!-- The pagination component -->
        <?php understrap_pagination(); ?>
    </div>

<?php endif; ?>

<?php wp_reset_query(); ?>


