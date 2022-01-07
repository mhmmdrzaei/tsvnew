<?php get_header(); ?>
<main>
  <section class="postmain">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <section class="postMainContent">
      <figure class="postImage">
        <?php the_post_thumbnail('large'); ?>
      </figure>
      <section class="postMainInnerContent">
        <?php the_content(); ?>
      </section>
    </section>
    <section class="tags">
      <?php tsv_tags(); ?>
    </section>
  </section>
  <div id="nav-below" class="navigation">
    <p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
    <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
  </div><!-- #nav-below -->

  <?php endwhile; // end of the loop. ?>
</main>


<?php get_footer(); ?>