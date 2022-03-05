<?php get_header();?>

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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo esc_url(get_template_directory_uri());?>/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php single_post_title(); ?></h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo esc_url(home_url())?>">Home</a>
                            <span><?php single_post_title(); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="<?php echo esc_url(home_url()); ?>" method="get">
                                <input type="text" placeholder="Search..." name="s" value="<?php echo get_search_query(); ?>">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <?php dynamic_sidebar('blog_sidebar'); ?>
                       
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                    <?php if (have_posts()): ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?php echo the_post_thumbnail_url() ?>" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i><?php the_time('F j, Y');  ?></li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <p> <?php the_excerpt(); ?> </p>
                                    <a href="<?php the_permalink(); ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; wp_reset_postdata(); ?>
                       

                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                
                                <?php the_posts_pagination(array(
                                    'screen_reader_text'=> '',
                                    'prev_text'=> '<i class="fa fa-long-arrow-left"></i>',
                                    'next_text'=> '<i class="fa fa-long-arrow-right"></i>'
                                )); ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
<?php get_footer();?>