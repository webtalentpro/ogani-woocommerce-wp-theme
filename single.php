<?php get_header();

global $post;
$author_id = $post->post_author;

?>

<!-- Hero Section Begin -->

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        <?php $args=array( 'taxonomy'=> 'product_cat', 'hide_empty'=> true, );
                        $all_categories = get_categories($args); foreach ($all_categories as
                        $categories) {?>
                        <li>
                            <a href="<?php echo get_term_link($categories->slug, 'product_cat'); ?>"><?php echo $categories->cat_name; ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        
                                             
  <div class="hero__search__phone__text">
   <?php if ($phone=get_field('header_phone', 'options')) {?>
   <h5><?php echo $phone; ?>
   </h5>
   <?php } ?>
   <?php if ($support=get_field('phone_support_text', 'options')) {?>
   <span><?php echo $support; ?></span>
   <?php } ?>
   </div>
      
                     
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Blog Details Hero Begin -->
<section
    class="blog-details-hero set-bg"
    data-setbg="<?php echo esc_url(get_template_directory_uri()); ?>/img/blog/details/details-hero.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2><?php the_title(); ?></h2>
                    <ul>
                        <li>By
                            <?php echo get_the_author(); ?></li>
                        <li>
                            <?php the_time('F j, Y'); ?></li>
                        <li><?php comments_number() ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">

                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="<?php echo esc_url(home_url()); ?>" method="get">
                            <input
                                type="text"
                                placeholder="Search..."
                                name="s"
                                value="<?php echo get_search_query(); ?>">
                            <button type="submit">
                                <span class="icon_search"></span>
                            </button>
                        </form>
                    </div>
                    <?php dynamic_sidebar('blog_sidebar'); ?>
                </div>
            </div>
        
        <div class="col-lg-8 col-md-7 order-md-1 order-1">
            <div class="blog__details__text">
                <img src="<?php echo the_post_thumbnail_url(); ?>">
                <?php the_content(); ?>
            </div>
            <div class="blog__details__content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="blog__details__author">
                            <div class="blog__details__author__pic">

                             <img src="<?php echo get_avatar_url($author_id); ?>" ?>

                            </div>
                            <div class="blog__details__author__text">
                                <h6><?php echo get_the_author_meta('display_name', $author_id) ?></h6>
                                <span>Admin</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog__details__widget">
                            <ul>
                                <li>
                                  Categories: <?php the_category(); ?></li>
                                   
                                <li>
                                    
                                    <?php the_tags(); ?></li>
                            </ul>
                            <div class="blog__details__social">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
<div class="container">
    <div class="row">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="col-lg-12">
            <div class="section-title related-blog-title">
                <h2>Post You May Like</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <?php $related=get_posts(array('category__in'=>wp_get_post_categories($post->ID), 'numberposts'=> 3, 'post__not_in'=> array($post->ID)));
        if ($related) {
            foreach ($related as $post) {
                setup_postdata($post); ?>       
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog__item">
                <div class="blog__item__pic">
                    <img
                        src="<?php echo the_post_thumbnail_url() ?>"
                        >
                </div>
                <div class="blog__item__text">
                    <ul>
                        <li>
                            <i class="fa fa-calendar-o"></i>
                            <?php the_time('F j, Y') ?></li>
                        <li>
                            <i class="fa fa-comment-o"></i>
                            <?php comments_number(); ?></li>
                    </ul>
                    <h5>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h5>
                    <p>
                       <?php the_excerpt(); ?>
                    </p>
                </div>
            </div>
        </div>  
        
        <?php
            }
        } ?>

    </div>
</div>
</section>
<!-- Related Blog Section End -->
<?php get_footer(); ?>