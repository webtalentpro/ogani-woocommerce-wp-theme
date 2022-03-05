<?php
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Ogani options',
        'menu_slug' 	=> 'ogani-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
    
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'ogani-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Home Page',
        'menu_title'	=> 'Home page',
        'parent_slug'	=> 'ogani-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'ogani-general-settings',
    ));
}
