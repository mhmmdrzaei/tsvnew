<?php get_header(); ?>

<main>
  <h1 class="pageTitle">Tag Archives: <?php single_tag_title(); ?></h1>
  <?php  $tag = get_query_var('tag');?>
   <?php $args = array( 'post_type' => array('post','programming','workshops', 'publications','production'),
          'tag' => $tag,
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
      query_posts( $args ); // hijack the main loop ;?>
  <?php get_template_part( 'loop', 'tag' ); ?>

</main>


<?php get_footer(); ?>