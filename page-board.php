<?php get_header();  ?>

<main>
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <section class="SBMain">
    <?php if( have_rows('staff_&_board') ): ?>
        <?php while( have_rows('staff_&_board') ): the_row(); 
            ?>
        <section class="SBImage">
          <?php 
          $image = get_sub_field('person_image');
          if( !empty( $image ) ): ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          <?php endif; ?>
        </section>    
        <section class="SBBio">
          <?php the_sub_field('person_bio'); ?>
        </section>
        <?php endwhile; ?>

    <?php endif; ?>
  </section>
  <?php the_content(); ?>

  <?php endwhile; // end the loop?>
  
</main>



<?php get_footer(); ?>