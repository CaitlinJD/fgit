<?php
wp_reset_postdata();
// Init a variable to store the values of the original WP Query
$temp_query = $wp_query;

$paged = get_query_var( 'paged' );
$page = ( !$paged ? 1 : $paged );

$args = array(
    "post_type"=>"event",
    "posts_per_page"=>4,
    "paged" => $page,
    'tax_query' => array(
        array(
            'taxonomy' => 'eventcategory',
            'terms' => 'past-events',
            'field' => 'slug',
            'compare' => 'ignore'
        )
    )
);


// Instantiate a new query
$wp_query = new WP_Query($args);
?>

<?php if ( have_posts() ) : ?>

    <div class="past-events">
        <!--  Event post type heading -->
        <?php
        $category = get_term_by( 'term_taxonomy_id', 3, get_query_var('taxonomy') );
        echo "<div class='col-xs-12 col-sm-12'><p class='second-title'><b>".$category->name."</b></p></div>"; ?>

        <div class="row">

        <?php
        while (have_posts()) : the_post(); ?>
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
            <div class="col-xs-12 text-xs-center col-sm-6 push-sm-6 text-sm-left">
                <?php custom_pagination($wp_query); ?>
            </div>
    </div>

<?php
// Restore the $wp_query back to its original state
    $wp_query = $temp_query;
endif; ?>

<?php// wp_reset_query(); ?>


