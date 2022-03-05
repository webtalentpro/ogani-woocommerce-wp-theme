<?php
get_header();
global $wp_query;
?>

<section class="breadcrumb-section set-bg" data-setbg="<?php echo esc_url(get_template_directory_uri()); ?>/img/breadcrumb.jpg">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 text-center">
                 <div class="breadcrumb__text">
                     <h2>Search Results:<?php the_search_query(); ?></h2>
                     <div class="breadcrumb__option">
                         <a href="<?php echo esc_url(home_url()); ?>">Home</a>
                         <span><?php the_search_query(); ?></span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <section id="search_results" class="py-5">
     <div class="container">
         <div class="row">

         <?php if (have_posts()) { ?>
          <?php while (have_posts()) {
    the_post(); ?>


            <div class="col-md-4">      
                <?php echo wc_get_template_part('content', 'product') ?>
            </div>
         
          <?php
} ?>


       <div class="product__pagination blog__pagination">
        
        <?php the_posts_pagination(array(
            'screen_reader_text'=> '',
            'prev_text'=> '<i class="fa fa-long-arrow-left"></i>',
            'next_text'=> '<i class="fa fa-long-arrow-right"></i>'
        )); ?>
        
        
        </div>

           <?php } ?>


     </div>
     </div>
 </section>
<?php get_footer(); ?>