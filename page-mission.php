<?php get_header();  ?>

<main>
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <section class="pageMainContent">
    <section class="imageSide">
      <?php the_post_thumbnail('large'); ?>
    </section>
    <section class="pageContent">
       <?php the_content(); ?>

    </section>
  </section>

   
  <?php endwhile; // end the loop?>
  
</main>



<?php get_footer(); ?>