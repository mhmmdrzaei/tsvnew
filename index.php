<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>
<main>
  <h1 class="pageTitle">News</h1>
  <section class="newsMain" aria-label="News items container">
    <?php get_template_part( 'loop', 'index' ); ?>
  </section>
</main>
<?php get_footer(); ?>