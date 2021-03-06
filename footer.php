<footer>    
  
  <main class="footerContainer">
    <section class="contact" aria-label="Gallery Contact Information Container">
      <h2>Contact</h2>
      <section class="galleryAddress" aria-label="Gallery Address">
        <?php the_field('gallery_address', 'options'); ?>
        <br>
        <a href="mailto:<?php the_field('footer_email', 'options'); ?>" aria-label="Gallery Email Address"><?php the_field('footer_email', 'options'); ?></a>
      </section>
      <section class="officeHours" aria-label="TSV Office Hours">
        <?php the_field('office_hours', 'options'); ?>
      </section>
      <section class="galleryHours" aria-label="Gallery Open Hours">
        <?php the_field('gallery_hours', 'options'); ?>
      </section>
      <section class="socialLinks" aria-label="Social Medial Links">
        <?php if( have_rows('social_links' , 'options') ): ?>
            <ul class="linksEach">
            <?php while( have_rows('social_links', 'options') ): the_row(); 
                ?>
                <li>
                  <a href="<?php the_sub_field('social_link_each', 'options') ;?>" target="_blank"><?php the_sub_field('social_icon_code' , 'options') ;?></a>
                </li>
            <?php endwhile; ?>
            </ul>
        <?php endif; ?>
      </section>
    </section>
    
    <section class="landAcknowledgement" aria-label="Gallery Land acknowledgement ">
      <a href="<?php the_field('land_acknowledgement_page_links_to', 'options'); ?>">
      <h2>land acknowledgement</h2>
      <section class="acknowledgementInner">
        <?php  the_field('land_acknowledgement', 'options') ;?>
      </section>
      </a>
    </section>
    
    <nav class="footermenu" aria-label="Secondary Footer Menu">
      <h2>get involved</h2>
      <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'footer'
        )); ?>
    </nav>
    <section class="mainlingList" aria-label="mailing list sign up form Container">
      <!-- Begin Mailchimp Signup Form -->
      <div id="mc_embed_signup">
      <form action="https://trinitysquarevideo.us5.list-manage.com/subscribe/post?u=6aa6475d61f473ec259544c43&amp;id=ca73fb1b05" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <div id="mc_embed_signup_scroll">
            <h2>Newsletter</h2>
  
      <div class="mc-field-group">
        <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
      </label>
        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
      </div>
      <div class="mc-field-group">
        <label for="mce-FNAME">First Name </label>
        <input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="First Name">
      </div>
      <div class="mc-field-group">
        <label for="mce-LNAME">Last Name </label>
        <input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="Last Name">
      </div>
        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6aa6475d61f473ec259544c43_ca73fb1b05" tabindex="-1" value=""></div>
          <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
          </div>
      </form>
      </div>

      <!--End mc_embed_signup-->

    </section>
    <?php if(get_field('funder_logos','options')): ?>
    <section class="funders" aria-label="Gallery Funders">
      <h2>funders</h2>
      <section class="funderImages">
             <?php
          $slides = get_field('funder_logos','options');
          $slide_amount = count($slides);
          foreach($slides as $slide):

          ?>

          <img class="funderLogo" src="<?php echo $slide['sizes']['large']; ?>" alt="<?php echo $slide['alt'];?>" id="<?php echo $slide['id'];?>"/>

          <?php endforeach; ?>
      </section>
   
          
    </section>
    <?php endif; ?>
  </main>
</footer>

<script>
// scripts.js, plugins.js and jquery are enqueued in functions.php
/* Google Analytics! */
</script>

<?php wp_footer(); ?>
</body>
</html>