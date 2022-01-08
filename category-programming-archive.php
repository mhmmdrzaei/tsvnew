<?php get_header();  ?>

<main>
  
  <?php // Start the loop ?>

    <?php $args = array( 'post_type' => 'programming', 
          'category_name' => 'programming-archive',
          // 'meta_key'      => 'start_date',
          // 'orderby'      => 'meta_value',
           'order'       => 'DESC',
          // 'orderby' => array(
          //    'meta_value_num' => 'desc',
          //    'post_date' => 'desc'
          'orderby'    => array(
                'start_date' => 'DSC',
                'post_date' => 'desc'
              ),
          'posts_per_page' => -1 );
      query_posts( $args ); // hijack the main loop

      if ( ! have_posts() ) : ?>

        <article id="post-0" class="post error404 not-found">
          <h1 class="entry-title">Not Found</h1>
          <section class="entry-content">
            <p>Apologies, but no results were found!</p>
          </section><!-- .entry-content -->
        </article><!-- #post-0 -->

      <?php endif; // end if there are no posts 
      while ( have_posts() ) : the_post();
        ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="entry-title">
           <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
             <?php the_title(); ?>
           </a>
         </h2>

        <section class="entry-content">
    
          <img src="<?php the_post_thumbnail('large') ?>" alt="<?php the_title(); ?>">
          <?php the_excerpt('Continue Reading'); ?>
          <?php wp_link_pages( array(
             'before' => '<div class="page-link"> Pages:',
             'after' => '</div>'
           )); ?>
        </section><!-- .entry-content -->

      </article>



  <?php endwhile; // end the loop?>
   <?php wp_reset_query();?> 
</main>



<?php get_footer(); ?>