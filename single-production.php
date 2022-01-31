<?php get_header(); ?>
<main>
  <section class="postmain">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <h1 class="pageTitle">PRODUCTION RESIDENCIES & MENTORSHIP</h1>
    
    <section class="postMainContent">
      <h2 class="entry-title"><?php the_title(); ?></h2>
      <?php if ( has_post_thumbnail() ) { ?>
        <figure class="sideImagePostsSingle">
          <?php the_post_thumbnail('large');?>
        </figure>
        <section class="postMainInnerContent">
      <?php }else {; ?>
        <section class="postMainInnerContentFull">
      <?php  };?>
       <?php the_content(); ?>
       <section class="tags">
         <?php project_posted_in(); ?>
       </section>
        </section>
    </section>

  </section>

  <?php endwhile; // end of the loop. ?>
</main>


<?php get_footer(); ?>