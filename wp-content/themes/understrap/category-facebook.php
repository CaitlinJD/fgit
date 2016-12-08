<?php /* Template Name: Get Involved */ ?>

<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>




                <div class="container">

                  <div class="row" >
                    <div class="col-md-4 card"><img  src="http://media.vogue.com/r/pass/2016/02/19/15-street-style-phil-oh-day-8-fw16.jpg">
                    <p class="card-text">New York Fashion Week is over, but the street style lives on. Here are some of our favorite moments from outside the shows.</p>
                    <a href="https://www.facebook.com/fgi.toronto/?fref=ts class="card-link">Read More +</a>

                    </div>
                    <div class="col-md-4 card">
                    <img src="https://media.timeout.com/images/102862539/image.jpg">
                    <p class="card-text">Check back daily for the latest looks on the street during New York Fashion Week.</p>
                  <a href="https://www.facebook.com/fgi.toronto/?fref=ts" class="card-link">Read More +</a>
                 </div>

                      <div class="col-md-4 card">
                      <img src="http://blog.trucco.es/wp-content/uploads/2011/09/IMG_2618.jpg">
                      <p class="card-text">Note to bloggers who change head-to-toe, paid-to-wear outfits every hour: Please stop. Find another business. You are heralding the death of style.”</p>
                    <a href="https://www.facebook.com/fgi.toronto/?fref=ts" class="card-link">Read More +</a>
                   </div>
                    </div>
              </div>
                <div class="row">
                   <div class="col-md-4 card">
                   <img src="http://blog.trucco.es/wp-content/uploads/2011/09/IMG_2747.jpg">
                    <p class="card-text">As Milan Fashion Week drew to a close, Vogue‘s editorial team penned a roundtable discussion looking back on the week’s events. </p>
                  <a href="https://www.facebook.com/fgi.toronto/?fref=ts" class="card-link">Read More +</a></div>

                <div class="col-md-4 card">
                <img src="http://images1.miaminewtimes.com/imager/the-cast-of-miami-social-sorah-d/u/original/6527876/miamisociallouis.jpg">
                 <p class="card-text">The cast of Miami Social (Sorah Daiha, Ariel Stein, Katrina Campins, George French, Maria Lankina, Michael Cohen, and Hardy Hill) celebrated at the series-premiere party at Louis Bar-Lounge at the Gansevoort South this past July 9.</p>
                 <a href="https://www.facebook.com/fgi.toronto/?fref=ts" class="card-link">Read More +</a>
                </div>
             <div class="col-md-4 card">
             <img src="http://chicstylista.com/wp-content/uploads/2013/11/MG_6696-1024x785.jpg">
              <p class="card-text">Miami Fashion Network Launch Event Fashion Blogger </p>
              <a href="https://www.facebook.com/fgi.toronto/?fref=ts" class="card-link">Read More +</a>
          </div>
      </div>

  </div>







                <?php //the_post_navigation(); ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
