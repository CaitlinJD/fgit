<?php /* Template Name: Get Involved */ ?>


<?php get_header(); ?>

<<<<<<< HEAD

    <div id="content" tabindex="-1">

    <main class="site-main" id="main">	
            
             
                <div class="row flex-items-xs-center">
                    <div class="col-xs-10 col-lg-9">
                        <div class="row">
                            <div class="col-xs-12 col-md-9 col-lg-8 page-intro membership-main-content">
                            <?php while ( have_posts() ) : the_post(); ?>	
                                <h2 class="page-title"><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                            <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row flex-items-xs-center">
                    <div class="col-xs-11 col-md-9 sponsor-logo-section">                        
                        <div class="row flex-items-xs-center space-between">
                        
                        <?php $get_involved_data = get_post_meta( get_the_ID(), 'get_involved_data', true );

                            foreach($get_involved_data as $get_involved_section){     
                                
                                $get_involved_title = $get_involved_section['get_involved_title'];
                                $get_involved_content = $get_involved_section['get_involved_content'];
                                $get_involved_link = $get_involved_section['get_involved_link'];
                                $get_involved_link_title = $get_involved_section['get_involved_link_title'];
                                $get_involved_image = $get_involved_section['get_involved_image'];
                                $get_involved_img_url = (wp_get_attachment_image_src($get_involved_image, 'medium'));
                                
                                echo "<div class='card-columns'><div class='card'>"; 
                                echo "<div class='article-container'>"; 
                                  if( !$get_involved_image ==''){echo "<img src='".$get_involved_img_url[0]."' />";};
                                echo "<h3>".$get_involved_title."</h3>";
                                echo "<hr>";
                                echo "<p>".$get_involved_content."</p>";
                                if( !$get_involved_link==''){echo "<a class='article-button' href='".$get_involved_link."'>".$get_involved_link_title."</a>";};
                                echo "</div></div></div>"; 
=======
<?php $container   = get_theme_mod( 'understrap_container_type' ); ?>

<div id="content" tabindex="-1">

        <main class="site-main" id="main">
>>>>>>> remotes/CaitlinJD/master


<<<<<<< HEAD
                            }
                        ?>

                    </div>       
                </div>
            </div>

        

                <div class="row flex-items-xs-center membership-benefits-container">
                    <div class="col-lg-11 article-container">
                        <div class="row">
                        <div class="col-lg-5">
                        <h3 class="event-title red-font"><?php uf('membership_benefits_title'); ?></h3>
                        <ul>
                            <?php 
                             $membership_benefits = get_post_meta( get_the_ID(), 'membership_benefits', true );

                                foreach($membership_benefits as $membership_benefit){  
                                echo "<li>".$membership_benefit['membership_benefit_item']."</li>";
                                }
                            ?>
                        </ul>
                        </div>

                        <div class="col-lg-7">
                        <h3 class="event-title red-font"><?php uf('membership_secondary_benefits_title'); ?></h3>
                        <ul>
                            <?php 
                             $secondary_benefits = get_post_meta( get_the_ID(), 'membership_secondary_benefits', true );

                                foreach($secondary_benefits as $secondary_benefit){  
                                echo "<li>".$secondary_benefit['membership_secondary_benefit_item']."</li>";
                                }
                            ?>
                        </ul>
                        </div>
                     </div>
                    </div>
                </div>    
=======
                <div class="row head">
                    <div class="col-xs-10 col-lg-9">
                        <div class="row">
                            <div class="col-xs-12 col-md-9 col-lg-8 page-intro membership-main-content">
                                    <h1 class="page-title red-font"><?php the_title(); ?></h1>
                                    <?php if (get_the_content()) : ?>
                                    <p><?php the_content(); ?></p>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row cards-container">
                    <div class="col-xs-12">
                        <div class="card-columns">
                            <?php $get_involved_data = get_post_meta( get_the_ID(), 'get_involved_data', true );

                            foreach($get_involved_data as $get_involved_section){

                                $get_involved_title = $get_involved_section['get_involved_title'];
                                $get_involved_content = $get_involved_section['get_involved_content'];
                                $get_involved_link = $get_involved_section['get_involved_link'];
                                $get_involved_link_title = $get_involved_section['get_involved_link_title'];
                                $get_involved_image = $get_involved_section['get_involved_image'];
                                $get_involved_img_url = (wp_get_attachment_image_src($get_involved_image, 'medium'));

                                echo "<div class='card'>";
                                if( !$get_involved_image ==''){echo "<img class='card-img-top' src='".$get_involved_img_url[0]."' />";};
                                echo "<div class='card-block'>";
                                echo "<h3 class='card-title'>".$get_involved_title."</h3>";
                                echo "<hr>";
                                echo "<p class='card-content'>".$get_involved_content."</p>";
                                if( !$get_involved_link==''){echo "<a class='article-button' href='".$get_involved_link."'>".$get_involved_link_title."</a>";};
                                echo "</div></div>";


                            }
                            ?>

                        </div> <!-- end of card-columns -->
                    </div>
                </div>

            <?php endwhile; // end of the loop. ?>
>>>>>>> remotes/CaitlinJD/master
                         

     </main><!-- #main -->

</div><!-- content end -->



<?php get_footer(); ?>

