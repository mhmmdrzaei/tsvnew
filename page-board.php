<?php get_header();  ?>

<main>
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
   <h1 class="pageTitle"><?php the_title(); ?></h1>
    <?php if( have_rows('staff_&_board') ): ?>
        <?php while( have_rows('staff_&_board') ): the_row(); 
            ?>
        <section class="sbEach">
        <h2><?php the_sub_field('person_name') ;
          $title = get_sub_field('person_title');
          if(!empty  ( $title)) :?> | <?php the_sub_field('person_title') ;endif ;?>
        </h2>
          
            <?php 
            $image = get_sub_field('person_image');
            if( !empty( $image ) ): ?>
              <section class="sbImage">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              </section><section class="sbBio">
                <?php the_sub_field('person_bio'); ?>
              </section>
          <?php else: ; ?>
          <section class="sbBioFull">
            <?php the_sub_field('person_bio'); ?>
          </section>

        <?php endif; ?>
         </section>
        <?php endwhile; ?>
      
    <?php endif; ?>
  <section class="bodyText">
     <?php the_content(); ?>
  </section>
 

  <?php endwhile; // end the loop?>
  
</main>


<?php get_footer(); ?>