<?php
function ogani_theme_register_required_plugins()
{
    $plugins = array(
        array(
            'name'=>__('Contact Form 7', 'ogani'),
            'slug'=> 'contact-form-7',
            'required'=> true,
        ),

        array(
            'name'=>__('Widget Import & Export', 'ogani'),
            'slug'=> 'widget-importer-exporter',
            'required'=> true,
        ),

        array(
           'name'=>__('Advanced Custom Fields: Font Awesome Field', 'ogani'),
           'slug'=> 'advanced-custom-fields-font-awesome',
           'required'=> true,
        ),

         
        array(
            'name'=>__('Advanced Custom Fields', 'ogani'),
            'slug'=> 'advanced-custom-fields',
            'required'=> true,
         ),
         array(
            'name'=>__('Woocommerce', 'ogani'),
            'slug'=> 'woocommerce',
            'required'=> true,
         ),
         array(
            'name'=>__('YITH WooCommerce Wishlist', 'ogani'),
            'slug'=> 'yith-woocommerce-wishlist',
            'required'=> true,
         ),
         array(
            'name'=>__('YITH WooCommerce Compare', 'ogani'),
            'slug'=> 'yith-woocommerce-compare',
            'required'=> true,
         ),
         array(
            'name'=>__('Classic Widgets', 'ogani'),
            'slug'=> 'classic-widgets',
            'required'=> true,
         ),

         array(
            'name'=>__('Advanced Custom Fields PRO', 'ogani'),
            'slug'=> 'advanced-custom-fields-pro',
            'source'=> get_template_directory().'/plugins-pre/advanced-custom-fields-pro.zip',
            'required'=> true,
         ),
    );

    $config= array(
        'id'=> 'ogani-plugin-active',
        'menu'=> 'Ogani Plugins Activation',
        'parent_slug'=> 'themes.php',
        'has_notices'=> true,

    );
    tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'ogani_theme_register_required_plugins');
