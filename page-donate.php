<?php get_header();  ?>

<main class="donationspage">
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <h1 class="pageTitle">Donate</h1>
  <section class="donations">
   <button class="donateButton">
    <a href="<?php the_field('donate_now_button') ?>" target="_blank">Donate Now</a>
  </button>
  </section>
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