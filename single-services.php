<?php get_header(); ?>
<main>
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <h1 class="pageTitle"><?php the_title() ;?></h1>
    <?php if( have_rows('services_content') ): ?>
        <?php while( have_rows('services_content') ): the_row(); ?>
          <?php if( get_row_layout() == 'text_box_no_headings_services' ): ?>
            <section class="serviceTextBox">
              <?php the_sub_field('text_box_no_headings_service_box'); ?>
            </section>
    
    

            <?php elseif( get_row_layout() == 'text_box_with_heading_services' ): ?>
              <?php if( have_rows('text_box_with_heading_content') ): ?>
                  <?php while( have_rows('text_box_with_heading_content') ): the_row(); 

                      ?>
                      <section class="serviceTextBoxH2">
                        <h2><?php the_sub_field('text_box_header_services'); ?></h2>
                        <section class="serviceTextBoxH2Content">
                          <?php the_sub_field('text_box_content_services'); ?>
                        </section>
                      </section>

                  <?php endwhile; ?>
              <?php endif; ?> 

              <?php elseif( get_row_layout() == 'heading_seperator_services' ): ?>
                <h1 class="servicehHeadingSeperator">
                  <?php the_sub_field('heading_separator_text_services'); ?>
                </h1>

              

            <?php elseif( get_row_layout() == 'table_services' ): ?>
              <section class="servicePriceTable" aria-label="table with prices and details related to service">
                <?php

                $table = get_sub_field( 'services_information_table' );

                if ( ! empty ( $table ) ) {

                    echo '<table border="0">';

                        if ( ! empty( $table['caption'] ) ) {

                            echo '<caption>' . $table['caption'] . '</caption>';
                        }

                        if ( ! empty( $table['header'] ) ) {

                            echo '<thead>';

                                echo '<tr>';

                                    foreach ( $table['header'] as $th ) {

                                        echo '<th>';
                                            echo $th['c'];
                                        echo '</th>';
                                    }

                                echo '</tr>';

                            echo '</thead>';
                        }

                        echo '<tbody>';

                            foreach ( $table['body'] as $tr ) {

                                echo '<tr>';

                                    foreach ( $tr as $td ) {

                                        echo '<td>';
                                            echo $td['c'];
                                        echo '</td>';
                                    }

                                echo '</tr>';
                            }

                        echo '</tbody>';

                    echo '</table>';
                }

               ?>
              </section>
                
            <?php elseif( get_row_layout() == 'text_image_and_header_box' ): ?>
              <?php if( have_rows('text_image_header_content_services') ): ?>
                  <?php while( have_rows('text_image_header_content_services') ): the_row(); 

                      ?>
                      <article class="fullwidthpost" >
                        <h2 class="entry-title"><?php the_sub_field('box_header_text_services_TIH'); ?></h2>
                      <figure class="sideImagePosts">
                        <img src="<?php the_sub_field('box_image_TIH_services'); ?>" alt="<?php the_sub_field('box_header_text_services_TIH'); ?>">
                      </figure>
                      <section class="excerptPosts">
                        <?php the_sub_field('box_content_TIH_serivces'); ?>
                      </section>
                    </article>
                  <?php endwhile; ?>
              <?php endif; ?> 
<?php endif; ?>  

        <?php endwhile; ?>
    <?php endif; ?>


  <?php endwhile; // end the loop?>
      
</main>


<?php get_footer(); ?>