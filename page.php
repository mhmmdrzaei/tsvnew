<?php get_header();  ?>

<main>
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

  <?php endwhile; // end the loop?>
  
</main>



<?php get_footer(); ?>