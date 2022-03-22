<?php get_header();  ?>
<main class="rentalsPage" id="rentalsPage">
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <h1 id="gearRental" class="pageTitle RentalPageTitle"><?php the_title(); ?></h1>
  <!-- <h1 class="pageTitle RentalPageTitle" id="page-title">Cameras</h1> -->
  <section class="gearRequestForm">
    <h2 >Gear Rental Request Form <span>╲╱</span></h2>
    <section class="gearRequestFields">
       <?php echo do_shortcode('[advanced_form form="form_622787ff68915"]'); ?>
    </section>
   
  </section>
  <form class="gearSelection" action="" aria-label="select gear type from drop down menu to see the listed gear items">
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