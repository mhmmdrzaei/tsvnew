<?php get_header();  ?>

<main>
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
   <h1 class="pageTitle"><?php the_title(); ?></h1>
    <?php if( have_rows('staff_&_board') ): ?>
        <?php while( have_rows('staff_&_board') ): the_row(); 
            ?>
        <section class="sbEach" aria-label="staff information container">
        <h2 aria-label="staff name"><?php the_sub_field('person_name') ;
          $title = get_sub_field('person_title');
          if(!empty  ( $title)) :?> | <?php the_sub_field('person_title') ;endif ;?>
        </h2>
          
            <?php 
            $image = get_sub_field('person_image');
            if( !empty( $image ) ): ?>
              <section class="sbImage" aria-label="image of staff memeber">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              </section><section class="sbBio" aria-label="staff member bio and contact information">
                <?php the_sub_field('person_bio'); ?>
              </section>
          <?php else: ; ?>
          <section class="sbBioFull" aria-label="staff member bio and contact information">
            <?php the_sub_field('person_bio'); ?>
          </section>

        <?php endif; ?>
         </section>
        <?php endwhile; ?>
      
    <?php endif; ?>
    <?php if ( !empty( get_the_content() ) ){ ;?>
      <section class="bodyText" aria-label="additional information">
         <?php the_content(); ?>
      </section>
    <?php };  ?>
  

  <?php endwhile; // end the loop?>
  
</main>



<?php get_footer(); ?>