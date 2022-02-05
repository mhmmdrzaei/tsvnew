<?php get_header();  ?>

<main>
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <h1 class="pageTitle"><?php the_title(); ?></h1>
  <section class="pageSingleContentBox">
  <?php if ( has_post_thumbnail() ) { ?>
   <figure class="pageSignleImage">
     <?php the_post_thumbnail('large');?>
   </figure>
   <section class="pageSingleContentHalf">
  <?php }else {; ?>
    <section class="pageSingleContent">
  <?php  };?>
    <?php the_content(); ?>
    </section>
  </section> 

  <?php endwhile; // end the loop?>
  
</main>



<?php get_footer(); ?>