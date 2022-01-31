<?php get_header();  ?>
<main class="rentalsPage" id="rentalsPage">
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <h1 class="pageTitle RentalPageTitle"><?php the_title(); ?></h1>
  <h1 class="pageTitle RentalPageTitle" id="page-title">Cameras</h1>

  <form class="gearSelection" action="">
      <h3><label for="gearOptions">Gear Category:</label></h3>
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
    <section class="output">
          <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </section>
  </main>
  </section> 

  <?php endwhile; // end the loop?>
  
</main>

<?php get_footer(); ?>