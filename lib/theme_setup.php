<?php
function ogani_setup()
{
    add_theme_support('title-tag');
    add_theme_support('woocommerce');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnail', array('post', 'page'));
    load_theme_textdomain('ogani', get_template_part('/languages'));
    register_nav_menus(array(
        'main_menu'=>__('Main Menu', 'ogani'),
    ));
}
add_action('after_setup_theme', 'ogani_setup');




function ogani_excerpt_more($more)
{
    global $post;
    return '<br>';
}
add_action('excerpt_more', 'ogani_excerpt_more');



function ogani_excerpt_length($length)
{
    return 15;
}
add_action('excerpt_length', 'ogani_excerpt_length');
