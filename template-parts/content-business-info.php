<?php

/**
 * Template part for displaying contact info
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fetch
 */

?>
<div class="business-info">
    <div class="hours-operation-container">
        <h2>Hours of Operation:</h2>
        <?php if (function_exists('get_field')) : ?>
            <?php if (get_field("hours_of_operation", 'option')) : ?>
                <p><?php the_field("hours_of_operation", 'option') ;?></p>
            <?php endif; ?>
    </div>

    <div class="icons-container">
        <h2>Contact Us</h2>
        <div class="icons-container footer-icon-container">
            <div class="phone-container">
                <?php if (get_field('phone_field', 19)) : ?>
                    <?php echo wp_get_attachment_image(432, 'full'); ?>
                    <p class="phone-num"><?php the_field('phone_field', 'option'); ?></p>
                <?php endif; ?>
            </div>
            <div class="email-container">
                <?php if (get_field('email_field', 19)) : ?>
                    <?php echo wp_get_attachment_image(430, 'full'); ?>
                    <p class="email"><?php the_field('email_field', 'option'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php endif; ?>
</div>