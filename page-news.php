<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>
<?php $args = array( 'post_type' => 'post', 
      'posts_per_page' => 20 );
  query_posts( $args ); // hijack the main loop

  if ( ! have_posts() ) : ?>
<main>
  <section class="newsMain">
    <?php get_template_part( 'loop', 'index' ); ?>
  </section>
</main>
<?php get_footer(); ?>