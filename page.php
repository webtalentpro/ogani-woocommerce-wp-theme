<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>



<div class="container">
    <div class="row">
        <div class="col-12">
        
        <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'ogani'),
                    'after'  => '</div>',
                )
            );
            ?>

        </div>
    </div>
</div>


get_footer();
