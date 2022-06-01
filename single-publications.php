<?php get_header(); ?>
<main>
  <section class="postmain">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <h1 class="pageTitle">Publications</h1>
    
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
  <section class="bios" aria-label="Biographies of workshop organizers">
    <?php if( have_rows('biographies_copy2' ) ): ?>
      <h3>Biographies:</h3>
        <?php while( have_rows('biographies_copy2') ): the_row();  ?>
        <section class="bioEach">
          <h4><?php the_sub_field('artist__participant_name_pub'); ?></h4>
          <section class="participantBio">
            <?php the_sub_field('artist__participant_bio_pub'); ?>
          </section>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>

  <?php endwhile; // end of the loop. ?>
</main>


<?php get_footer(); ?>