<?php get_header();  ?>

<main>
  <h1 class="pageTitle"><?php the_title(); ?></h1>
  <?php // Start the loop ?>

    <?php $args = array( 'post_type' => 'production', 
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
          'posts_per_page' => 20 );
      query_posts( $args ); // hijack the main loop

      if ( ! have_posts() ) : ?>

  <article id="post-0" class="fullwidthpost" aria-label="no enteries found within production label">
    <h2 class="entry-title">Not Found</h2>
     <section class="excerptPosts fullwidthexcerpts">
      <p>Apologies, but no results were found!</p>
    </section><!-- .entry-content -->
  </article><!-- #post-0 -->

<?php endif; // end if there are no posts ?>
<?php // if there are posts, Start the Loop. ?>

<?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" class="fullwidthpost" aria-label="production item container">
      <h2 class="entry-title" aria-label="production item title">
        <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
          <?php the_title(); ?>
        </a>
      </h2>
     <?php if ( has_post_thumbnail() ) { ?>

      <figure class="sideImagePosts" aria-label="production item image">
        <?php the_post_thumbnail('large');?>
      </figure>
      <section class="excerptPosts">
    <?php }else {; ?>
    <section class="excerptPosts fullwidthexcerpts" aria-label="production item excerpt">
   <?php  };?>
     <?php the_excerpt('Continue Reading'); ?>
     <section class="ctaInternal" aria-label="prudction item additional links">
       <?php if( have_rows('cta_links' ) ): ?>
           <?php while( have_rows('cta_links') ): the_row(); 

               ?>
               <?php $linkLable = get_sub_field('link_label_Programming'); ?>
               <?php if( have_rows('link_package_programming') ): ?>
                   <?php while( have_rows('link_package_programming') ): the_row();
                  $externalLink = get_sub_field('external_link_programming');
                   $internalLink = get_sub_field('internal_link_programming');
                     ?>
                    <a class="ctaLink" href="<?php the_sub_field('internal_link_programming') ?><?php the_sub_field('external_link_programming') ?>"><?php echo $linkLable ;?></a>
    

                  <?php endwhile; ?>
              <?php endif; ?> 
            <?php endwhile; ?>
          <?php endif; ?>     
     </section>
    </section>

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