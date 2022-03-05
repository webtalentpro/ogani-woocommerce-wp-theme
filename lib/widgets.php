<?php

function ogani_widget_register()
{
    register_sidebar(array(
        'name'=> 'Footer Column one',
        'id'=> 'footer_one',
        'before_widget'=> ' <div class="footer__about">',
        'after_widget'=> '</div>',
        'before_title'=> '<h6>',
        'after_title'=> '</h6>',
    ));
    register_sidebar(array(
        'name'=> 'Footer Column Two',
        'id'=> 'footer_two',
        'before_widget'=> ' <div class="footer__widget">',
        'after_widget'=> '</div>',
        'before_title'=> '<h6>',
        'after_title'=> '</h6>',
    ));

    register_sidebar(array(
        'name'=> 'Blog Sidebar',
        'id'=> 'blog_sidebar',
        'before_widget'=> '<div class="blog__sidebar"> <div class="blog__sidebar__item">',
        'after_widget'=> '</div></div>',
        'before_title'=> '<h4>',
        'after_title'=> '</h4>',
    ));
    register_sidebar(array(
        'name'=> 'Shop Sidebar',
        'id'=> 'shop_sidebar',
        'before_widget'=> '<div class="sidebar__item"> <div class="latest-product__text">',
        'after_widget'=> '</div></div>',
        'before_title'=> '<h4>',
        'after_title'=> '</h4>',
    ));
}
add_action('widgets_init', 'ogani_widget_register');
