<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'membership_option-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'membership_option';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php
    $hero = get_field('membership_option');
    if( $hero ): ?>
    	<h3><?php the_sub_field('membership_header'); ?></h3>
    	<section class="membership_option_info">
    		<?php the_sub_field('membership_option_info'); ?>
    	</section>
    	<section class="membership_price">
    		<?php the_sub_field('membership_price'); ?>
    	</section>
 
	<?php endif; ?>
</div>

