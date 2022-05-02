<?php

/**
 * Template part for displaying contact info
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fetch
 */

?>
<h2>Hours of Operation:</h2>
<?php if (function_exists('get_field')) : ?>
    <?php if (get_field("hours_of_operation", 19)) : ?>
        <p><?php the_field("hours_of_operation", 19) ;?></p>
    <?php endif; ?>
    <?php if (get_field('phone_field', 19)) : ?>
        <?php echo wp_get_attachment_image(432, 'full'); ?>
        <p class="phone-num"><?php the_field('phone_field', 19); ?></p>
    <?php endif; ?>
    <?php if (get_field('email_field', 19)) : ?>
        <?php echo wp_get_attachment_image(430, 'full'); ?>
        <p class="email"><?php the_field('email_field', 19); ?></p>
    <?php endif; ?>
<?php endif; ?>