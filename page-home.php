<?php get_header();  ?>

<main class="homepageMain" aria-label="home page container">
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php if( have_rows('home_page_layout') ): ?>
        <?php while( have_rows('home_page_layout') ): the_row(); ?>
            <?php if( get_row_layout() == 'message_banner' ): ?>
               <?php if( have_rows('message_banner_info') ): ?>
                   <?php while( have_rows('message_banner_info') ): the_row(); ?>

                       
                       <section class="homePageBanner" aria-label="special message information">
                        <a  href="<?php the_sub_field('page_link_message_banner'); ?>">
                         <?php the_sub_field('message_banner_text'); ?>
                          </a>
                       </section>
                      

                   <?php endwhile; ?>
               <?php endif; ?> 


            <?php elseif( get_row_layout() == 'full_width_header_content' ): ;?>
              <?php $featured_posts = get_sub_field('link_to_page_content');
              ?>
                <?php   if( $featured_posts ) {
                    $post = $featured_posts;
                    setup_postdata($post);
                 ?>
                  <section class="fullwidthpost" aria-label="featured information container">
                    <h2 class="entry-title" aria-label="featured item title">
                      <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
                        <?php the_title(); ?>
                      </a>
                    </h2>
                    <figure class="sideImagePosts" aria-label="featured item image">
                      <?php the_post_thumbnail('large');?>
                    </figure>
                    <section class="excerptPosts" aria-label="excerpt information on featured item">
                     <?php the_excerpt('Continue Reading'); ?>
                     <section class="ctaInternal" aria-label="additional links attached to the item">
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
                  </section>
                  <?php  wp_reset_postdata(); ?> 
                <?php  } ?>
            <?php elseif( get_row_layout() == 'small_width_content' ): ;?>
               <?php if( have_rows('programming_content_details') ): ?>
                   <?php while( have_rows('programming_content_details') ): the_row(); ?>
                        <?php $featured_posts = get_sub_field('link_to_page_small_home');
                        ?>
                          <?php   if( $featured_posts ) {
                              $post = $featured_posts;
                              setup_postdata($post);
                           ?>
                            <section class="smallWidthContent" aria-label="featured item container">
                              <h2 class="entry-title" aria-label="featured item title">
                                <a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
                                  <?php the_title(); ?>
                                </a>
                              </h2>
                              <figure class="sideImagePostsSM" aria-label="featured information image">
                                <?php the_post_thumbnail('large');?>
                              </figure>
                              <section class="excerptPostsSM" aria-label="featured information excerpt">
                               <?php the_excerpt('Continue Reading'); ?>
                               <section class="ctaInternal">
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

                            <?php  wp_reset_postdata(); ?> 
                          <?php  } ?>
                          <?php if( have_rows('additional_home_page_ctas') ): ?>
                              <?php while( have_rows('additional_home_page_ctas') ): the_row(); ?>

                                <?php $linkLableExtraSmall = get_sub_field('link_label_small_home_content'); ?>

                                 <?php if( have_rows('link_to_page_home_small') ): ?>
                                     <?php while( have_rows('link_to_page_home_small') ): the_row();
                                       ?>
                                      <a class="ctaLink" href="<?php the_sub_field('page_link_home_small') ?><?php the_sub_field('external_site_link_url') ?>"><?php echo $linkLableExtraSmall ;?></a>
                                

                                    <?php endwhile; ?>
                                <?php endif; ?> 

                              <?php endwhile; ?>
                          <?php endif; ?> 
                             </section>
                            </section>
                          </section>

                   <?php endwhile; ?>
               <?php endif; ?> 
        <?php elseif( get_row_layout() == 'small_width_custom_content' ): ;?>
            <?php if( have_rows('custom_content_info') ): ?>
                <?php while( have_rows('custom_content_info') ): the_row(); ?>
                  <section class="smallWidthContent" aria-label="featured information container">
                  <h2 aria-label="featured information title"><?php the_sub_field('custom_content_header'); ?></h2>
                  <figure class="sideImagePostsSM" aria-label="featured information image">
                    <?php 
                    $image = get_sub_field('custom_content_image');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                  </figure>
                  <section class="customContentInfo excerptPostsSM" aria-label="featured information excerpt">
                    <?php the_sub_field('custom_content_info'); ?>
                    <section class="customContentCTAs ctaInternal">
                        <?php if( have_rows('content_ctas_custom_small') ): ?>
                            <?php while( have_rows('content_ctas_custom_small') ): the_row(); ?>

                              <?php $linkLableCusSmall = get_sub_field('link_label_custom_home'); ?>

                               <?php if( have_rows('link_location_custom_home') ): ?>
                                   <?php while( have_rows('link_location_custom_home') ): the_row();
                                     ?>
                                    <a class="ctaLink" class="ctaLink" href="<?php the_sub_field('link_url_custom_home') ?><?php the_sub_field('link_location_custom_home') ?>"><?php echo $linkLableCusSmall ;?></a>
                              

                                  <?php endwhile; ?>
                              <?php endif; ?> 

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </section>
                  </section>                  
                  </section>

                <?php endwhile; ?>
            <?php endif; ?> 
             
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

  <?php endwhile; // end the loop?>
  
</main>



<?php get_footer(); ?>