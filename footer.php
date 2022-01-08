<footer>
  <section class="footerContainer">
    <section class="contact">
      <section class="galleryAddress">
        <?php the_field('gallery_address', 'options'); ?>
      </section>
      <section class="officeHours">
        <?php the_field('office_hours', 'options'); ?>
      </section>
      <section class="galleryHours">
        <?php the_field('office_hours', 'options'); ?>
      </section>
      <section class="socialLinks">
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
    <section class="landAcknowledgement">
      <?php  the_field('land_acknowledgement', 'options') ;?>
    </section>
    <section class="footermenu">
    </section>
    <section class="mainlingList">
      <div id="mc_embed_signup">
      <form action="https://trinitysquarevideo.us5.list-manage.com/subscribe/post?u=6aa6475d61f473ec259544c43&amp;id=190c4f15d8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <div id="mc_embed_signup_scroll">
        <h2>Newsletter</h2>
      <div class="mc-field-group">
        <label for="mce-EMAIL">Email Address </label>
        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
      </div>
      <div class="mc-field-group">
        <label for="mce-FNAME">First Name </label>
        <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
      </div>
      <div class="mc-field-group">
        <label for="mce-LNAME">Last Name </label>
        <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
      </div>
        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6aa6475d61f473ec259544c43_190c4f15d8" tabindex="-1" value=""></div>
          <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
          </div>
      </form>
      </div>

    </section>
    <?php if(get_field('funder_logos','options')): ?>
    <section class="funders">

        <?php
          $slides = get_field('funder_logos','options');
          $slide_amount = count($slides);
          foreach($slides as $slide):

          ?>

          <img class="funderLogo" src="<?php echo $slide['sizes']['large']; ?>" alt="<?php echo $slide['alt'];?>" id="<?php echo $slide['id'];?>"/>

          <?php endforeach; ?>
          
    </section>
    <?php endif; ?>
  </section>
</footer>

<script>
// scripts.js, plugins.js and jquery are enqueued in functions.php
/* Google Analytics! */
</script>

<?php wp_footer(); ?>
</body>
</html>