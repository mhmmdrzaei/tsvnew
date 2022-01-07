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