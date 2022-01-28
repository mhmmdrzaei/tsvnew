<?php get_header(); ?>
<main>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <h1 class="pageTitle">Workshops</h1>
    
    <section class="postMainContent">
      <h2 class="entry-title"><?php the_title(); ?></h2>
      <?php if ( has_post_thumbnail() ) { ?>
        <figure class="sideImagePostsSingle">
          <?php the_post_thumbnail('large');?>
        </figure>
        <section class="postMainInnerContent">
      <?php }else {; ?>
        <section class="postMainInnerContentFull">
      <?php  };?>
       <?php the_content(); ?>
       <section class="tags">
         <?php project_posted_in(); ?>
       </section>
        </section>
    </section>

  </section>
  <section class="workshopDetails">
    <section class="titleWSSingle">
      <section class="wsSingleTitle">Workshop</section>
      <section class="titleWorkshop"><?php the_title(); ?></section>
    </section>
    <section class="InsturctorName">
      <section class="wsSingleTitle">Instructor</section>
      <section class="instructorNameFull"><?php the_field('instructor_workshops'); ?></section>
    </section>
    <section class="dateWSSingle">
      <section class="wsSingleTitle">Date</section>
      <section class="dateWSSingleInner">
        <?php 
            $startDate = get_field('date_start_workshop');
            $endDate = get_field('date_end_workshop');
            if( !empty( $endDate ) ): ?>
               <?php the_field('date_start_workshop');?> - <?php the_field('date_end_workshop'); ?><br>
            <?php else: ; ?>
             <?php the_field('date_start_workshop');?></br>
            <?php endif; ?>
      </section>
    </section>
    <section class="timeWSSingle">
      <section class="wsSingleTitle">Time</section>
      <section class="wsSingleTime">
        <?php the_field('time_start_workshop'); ?> - <?php the_field('time_end_workshop'); ?>
      </section>
    </section>
    <section class="locationWSSingle">
      <section class="wsSingleTitle">Location</section>
      <section class="wsSingleLoca">
        <?php if( have_rows('location_workshps' ) ): ?>
            <?php while( have_rows('location_workshps') ): the_row(); 
              $locaLink = get_sub_field('location_linked_to_maps');
              if( !empty( $locaLink ) ): ;?>
            <a href="<?php the_sub_field('location_linked_to_maps'); ?>" target="_blank"><?php the_sub_field('location_name'); ?></a>
             <?php else: ; ?>
              <?php the_sub_field('location_name'); ?>
            <?php endif; ?>
            
          <?php endwhile; ?>
        <?php endif; ?>
      </section>
    </section>
      
    <?php
    $field = get_field_object('registration_open_or_closed');
    $value = $field['value'];
    if( $value === 'Open' ): ?>
      <?php if( have_rows('registeration_workshops' ) ): ?>
          <?php while( have_rows('registeration_workshops') ): the_row();?>
          <section class="registerLink">
          <a href="<?php the_sub_field('registration_link'); ?>" target="_blank"><?php the_sub_field('registration_button_label'); ?></a>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>
   <?php else: ; ?>
    <p class="wsSingleFull">Sorry! You can no longer register.</p>
  <?php endif; ?>
      
  </section>
      
  </section>
  <section class="bios">
    <?php if( have_rows('biographies_copy' ) ): ?>
      <h3>Biographies:</h3>
        <?php while( have_rows('biographies_copy') ): the_row();  ?>
        <section class="bioEach">
          <h4><?php the_sub_field('artist__participant_name_workshop'); ?></h4>
          <section class="participantBio">
            <?php the_sub_field('artist__participant_bio_workshop'); ?>
          </section>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>
  <?php endwhile; // end of the loop. ?>
</main>


<?php get_footer(); ?>