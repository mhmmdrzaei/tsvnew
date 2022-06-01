<?php get_header();  ?>
<?php $today = current_time('Ymd'); ?>
<main>
  <h1 class="pageTitle"><?php the_title(); ?></h1>
  <?php // Start the loop ?>

    <?php $args = array( 
      'post_type' => array('workshops'),
          'meta_query' => array(
            'relation' => 'AND',
          'start_clause' => array(
                'key'   => 'date_start_workshop',
                'compare' => '<=',
                'value'   => $today
            ),
            'end_clause' => array(
                'key'   => 'date_end_workshop',
                'compare' => '>=',
                'value'   => $today
            )
          ),
          'orderby' => array(
              'meta_value_num' => 'asc',
              'post_date' => 'desc'
          ),
          'posts_per_page' => -1
          // 'orderby' => 'meta_value_num',
          // 'order' => 'asc'
 );
      query_posts( $args ); // hijack the main loop

      if ( ! have_posts() ) : ?>

  <article id="post-0" class="fullwidthpost" aria-label="no workshops listed at this time">
    <h2 class="entry-title">Not Found</h2>
     <section class="excerptPosts fullwidthexcerpts">
      <p>Apologies, there are no workshops planned at this time.</p>
    </section><!-- .entry-content -->
  </article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>
<?php // if there are posts, Start the Loop. ?>

<?php while ( have_posts() ) : the_post(); ?>
  <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
    <article id="post-<?php the_ID(); ?>" class="currentWorkshop" aria-label="workshop information container">
      <h2 class="entry-title" aria-label="workshop name">
          <?php the_title(); ?>
      </h2>
      <section class="DescWSHome" aria-label="workshop description">
        <?php the_field('brief_description_workshop'); ?>
      </section>
      <section class="instructorWSHome" aria-label="instructor name">
        <?php the_field('instructor_workshops'); ?>
      </section>
      <section class="locationWSHome" aria-label="location of workshop">
        <?php if( have_rows('location_workshps' ) ): ?>
            <?php while( have_rows('location_workshps') ): the_row();  ?>
            <?php the_sub_field('location_name') ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </section>
      <section class="dateTimeWSHome" aria-label="workshop date and time">
        <?php 
            $startDate = get_field('date_start_workshop');
            $endDate = get_field('date_end_workshop');
            if( !empty( $startDate ) ): ?>
               <?php the_field('date_start_workshop');?> - <?php the_field('date_end_workshop'); ?><br>
            <?php else: ; ?>
             <?php the_field('date_end_workshop');?></br>
            <?php endif; ?>
              <?php the_field('time_start_workshop'); ?> - <?php the_field('time_end_workshop'); ?>
      </section>
     
        <?php
        $field = get_field_object('registration_open_or_closed');
        $value = $field['value'];
        if( $value === 'Open' ): ?>
       <section class="openWSHome" aria-label="workshop open for registration">
        <?php the_field('registration_open_or_closed'); ?>
      </section>
       <?php else: ; ?>
      <section class="fullWSHome" aria-label="you can no longer register for this workshop">
        <?php the_field('registration_open_or_closed'); ?>
      </section>
      <?php endif; ?>
    </article>
   </a>
<?php endwhile; // End the loop. Whew. ?>

<?php // Display navigation to next/previous pages when applicable ?>
<!-- <?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <p class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></p>
  <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></p>
<?php endif; ?>
 -->   <?php wp_reset_query();?> 
</main>



<?php get_footer(); ?>