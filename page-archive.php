<?php get_header();  ?>

<main class="archiveMain">
  <h1 class="pageTitle"><?php the_title(); ?></h1>
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

   <?php $list = ''; 
   $tags = get_tags(); 
   // echo '<ul id="portfolio-filter">'; 
   // echo'<li><a href="#all" title="">All</a></li>';
   $groups = array();
   if( $tags && is_array( $tags ) ) {
   foreach( $tags as $tag ) {
   $first_letter = strtoupper( $tag->name[0] );
   $groups[ $first_letter ][] = $tag;}
   if( !empty( $groups ) ) {
   foreach( $groups as $letter => $tags ) {
   $list .= "\n\t" . '</ul><h2>' . apply_filters( 'the_title', $letter ) .'</h2>';
   $list .= "\n\t" . '</ul><ul id="archiveEach">';
   foreach( $tags as $tag ) {
   $lower = strtolower($tag->name);
   $name = str_replace(' ', ' ', $tag->name);
   $naam = str_replace(' ', '-', $lower);
   $link = $tag->link;
   $list .= "\n\t\t" . '<li><a href="'.esc_attr( get_tag_link( $tag->term_id ) ).'">'.$name.'</a></li>';
   }}}}else $list .= "\n\t" . '<p>Sorry, but no tags were found</p>';print $list;
   ?>

  <?php endwhile; // end the loop?>
  
</main>



<?php get_footer(); ?>