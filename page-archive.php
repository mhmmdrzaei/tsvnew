<?php get_header();  ?>

<main class="archiveMain">
  <h1 class="pageTitle"><?php the_title(); ?></h1>
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

   <?php $list = ''; 
   $tags = get_tags(); 
   // $tags = get_tags(array(
   //   // 'taxonomy' => 'post_tag',
   //   // 'name__like' => "a", 'order' => 'ASC'
   //   // 'meta_value' => 'name',
   //  'order' => 'asc',
   //   'orderby' => 'title',

   //   // 'meta_key'     => 'myComparison'
   //   // 'orderby'     => 'meta_value',
   //   // 'orderby'    => array(
   //   //      'name' => 'ASC',
   //   //      'post_date' => 'desc'
   //   //    ),
   //   // 'hide_empty' => false // for development,
   // ));
   // $array = array();
   // foreach ($tags as $tag) { 
   //  $firstLetter = $tag->name[0];
   //  $array[$firstLetter][] = $sort;
   //  usort($sort, 'myComparison');
   // }
    // usort($tags, 'myComparison');



   $groups = array();
   
   if( $tags && is_array( $tags ) ) {
    // $tagName = $tags->name
    // usort($tags, 'myComparison');

   foreach ($tags as $tag) {

    // $tagName = usort($tag->name,'myComparison');
    usort(($firstLetter = $tag->name[0]),'myComparison');
    
   $first_letter = strtoupper( $firstLetter );
   $groups[ $first_letter ][] = $tag;
  
 
 }

 // usort($groups, 'myComparison');
   if( !empty( $groups ) ) {
   foreach( $groups as $letter => $tags ) {
       usort($letter, 'myComparison');
   $list .= "\n\t" . '</ul><h2>' . apply_filters( 'the_title', $letter ) .'</h2>';

   $list .= "\n\t" . '</ul><ul id="archiveEach">';
   foreach( $tags as $tag ) {
   $lower = strtolower($tag->name);
   $name = str_replace(' ', ' ', $tag->name);
   $naam = str_replace(' ', '-', $lower);
   $link = $tag->link;
   $list .= "\n\t\t" . '<li><a href="'.esc_attr( get_tag_link( $tag->term_id ) ).'">'.$name.'</a></li>';
   }}}}else $list .= "\n\t" . '<p>Sorry, but no tags were found</p>';
   // $list = intval($list);

  
   print_r( $list);
   ?>

  <?php endwhile; // end the loop?>
  
</main>



<?php get_footer(); ?>