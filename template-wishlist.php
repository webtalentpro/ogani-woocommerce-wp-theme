<?php
/* Template Name: wishlist */

get_header(); ?>


<?php get_template_part('lib/bread', 'cam'); ?>

<section id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php echo do_shortcode('[yith_wcwl_wishlist]'); ?>
            </div>
        </div>
    </div>
</section>



<?php get_footer() ?>