<?php query_posts(array("post_type"=>"event", 'tax_query' => array(
    array(
        'taxonomy' => 'eventcategory',
        'terms' => 'past-events',
        'field' => 'slug'
    )
), "posts_per_page"=>4)) ?>
<?php while ( have_posts() ) : the_post(); ?>

    <?php the_title(); ?>

<?php endwhile; ?>

<?php wp_reset_query(); ?>