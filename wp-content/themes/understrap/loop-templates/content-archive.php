<?php
/**
 * Archive template.
 *
 * @package understrap
 */
?>
<div class="col-xs-12 col-sm-6 col-md-4 no-padding">

        <div class="card card-block card-inverse text-xs-center no-padding">
            <?php the_post_thumbnail('square-thumb'); ?>
            <div class="card-img-overlay align-bottom member">
               <p class="card-text name"><b><?php the_title() ?></b></p>
                <p class="card-text"><?php echo get_post_meta( get_the_ID(), 'bio_position', true ); ?></p>
                <a class="board-member" href="<?php the_permalink(); ?>">MEMBER PROFILE</a>
            </div>
        </div>

</div>

