<?php get_header();  ?>
<main class="rentalsPage" id="rentalsPage">
  
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
  <form action="">
    <label for="animal">Choose your animal:</label>
    <select name="animal" id="animal">
      <option value="monkey">Monkeys</option>
      <option value="eagle">Eagles</option>
      <option value="dragon">Dragons</option>
      <option value="elephant">Elephants</option>
      <option value="centaur">Centaur</option>
    </select>
  </form>
  <main>
    <div class="output">
      
    </div>
    <div class="container" id="gearList"></div>
  </main>
  </section> 

  <?php endwhile; // end the loop?>
  
</main>

<?php get_footer(); ?>