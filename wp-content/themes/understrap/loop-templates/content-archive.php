<?php
/**
 * Archive template.
 *
 * @package understrap
 */
?>
<div class="col-xs-12 col-sm-6 col-md-4 no-padding">
        <div class="card card-block card-inverse text-xs-center no-padding">
            <div class="img-replacement"></div>
            <a class="board-member-pic" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('square-thumb'); ?>
                <div class="card-img-overlay align-bottom member">
                   <p class="card-text name"><b><?php the_title() ?></b></p>
                    <p class="card-text"><?php echo uf('bio_position'); ?></p>
                    <hr>
                    <button class="member-btn">MEMBER PROFILE</button>
                </div>
            </a>
        </div>


</div>

