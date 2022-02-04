<?php get_header();  ?>

<main class="pagePublications">
  <h1 class="pageTitle"><?php the_title(); ?></h1>
  <?php // Start the loop ?>

    <?php $args = array( 'post_type' => 'publications', 
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

  <article id="post-0" class="fullwidthpost" >
    <h2 class="entry-title">Not Found</h2>
     <section class="excerptPosts fullwidthexcerpts">
      <p>Apologies, but no results were found!</p>
    </section><!-- .entry-content -->
  </article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>
<?php // if there are posts, Start the Loop. ?>

<?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" class="PublicationPost">
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
          <?php the_title(); ?>
        </a>
      </h2>

      <figure class="PubImagePosts">
        <?php the_post_thumbnail('large');?>
      </figure>

    </article><!-- #post-## -->


<?php endwhile; // End the loop. Whew. ?>

<?php // Display navigation to next/previous pages when applicable ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
  <p class="alignleft"><?php next_posts_link('&laquo; Older Entries'); ?></p>
  <p class="alignright"><?php previous_posts_link('Newer Entries &raquo;'); ?></p>
<?php endif; ?>
   <?php wp_reset_query();?> 
</main>



<?php get_footer(); ?>