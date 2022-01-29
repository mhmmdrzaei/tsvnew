<?php get_header();  ?>
<main class="rentalsPage" id="rentalsPage">
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <h1 class="pageTitle RentalPageTitle"><?php the_title(); ?></h1>
  <h1 class="pageTitle RentalPageTitle" id="page-title">Cameras</h1>
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
    <label for="gearOptions">Choose your Rental Option:</label>
    <select name="gearOptions" id="gearOptions">
      <option value="Cameras">Cameras</option>
      <option value="Lights">Lights</option>
      <option value="Lens">Lens</option>
      <option value="Audio">Audio</option>
      <option value="Tripods">Tripods</option>
      <option value="Monitors">Monitors</option>
      <option value="Grip">Grip</option>
      <option value="Presentation">Presentation</option>
      <option value="Mobile Computers">Mobile Computers</option>
      <option value="Virtual Reality">Virtual Reality</option>
      <option value="Shared Facilities">Shared Facilities</option>

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