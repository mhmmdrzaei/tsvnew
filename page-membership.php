<?php get_header();  ?>

<main class="membershipPage">
  
  <?php // Start the loop ?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <h1 class="pageTitle"><?php the_title() ;?></h1>
    <?php if( have_rows('membership_page_layout_options') ): ?>
        <?php while( have_rows('membership_page_layout_options') ): the_row(); ?>
          <?php if( get_row_layout() == 'info_text_box' ): ?>
            <section class="membershipInfoBox">
              <?php the_sub_field('membership_info_text_box'); ?>
            </section>
            
    

            <?php elseif( get_row_layout() == 'membership_options_box' ): ?>
              <?php if( have_rows('membership_option') ): ?>
                  <?php while( have_rows('membership_option') ): the_row(); 

                      ?>
                      <section class="membershipOptionBox">
                        <h2><?php the_sub_field('membership_header'); ?></h2>
                        <section class="membershipBoxInfo">
                          <?php the_sub_field('membership_option_info'); ?>
                        </section>
                        <a href="<?php the_sub_field('membership_option_attachment'); ?>" target="_blank">
                        <section class="membershipBoxPrice">
                        
                          <?php the_sub_field('membership_price'); ?>  
                        
                        </section>
                        </a>
                      </section>

                  <?php endwhile; ?>
              <?php endif; ?> 
              

            <?php elseif( get_row_layout() == 'membership_benefits_table' ): ?>
              <section class="membershipOptionsTable">
                <?php

                $table = get_sub_field( 'membership_benefits_table_table' );

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
                
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

  <?php endwhile; // end the loop?>
  
</main>



<?php get_footer(); ?>