<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>
<main>
  <section class="newsMain">
    <?php get_template_part( 'loop', 'index' ); ?>
  </section>
</main>
<?php get_footer(); ?>