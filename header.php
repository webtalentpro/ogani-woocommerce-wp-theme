<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php global $woocommerce; ?>
        <?php global $current_user; ?>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Humberger Begin -->
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo">
                <?php $logo=get_field('header_logo', 'options'); ?>
                <?php if ($logo) {?>
                <a href="<?php echo esc_url(home_url()) ?>"><img src="<?php echo $logo['url'] ?>"></a>
                <?php } ?>
            </div>
            <div class="humberger__menu__cart">
                <ul>
                    <li>

                        <a href="<?php echo get_page_link(99); ?>">
                            <i class="fa fa-heart"></i>
                            <span><?php $count = 0; if (function_exists('yith_wcwl_count_products')) {
    echo
                                $count = yith_wcwl_count_products();
} ?></span>
                        </a>

                    </li>
                    <li>
                        <a href="<?php echo wc_get_cart_url();?>">
                            <i class="fa fa-shopping-bag"></i>

                            <span>

                            <?php
                                $total_itmes=$woocommerce->cart->cart_contents_count;
                            if ($total_itmes) {
                                echo $total_itmes;
                            } else {
                                echo '0';
                            } ?>
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="header__cart__price">item:
                    <span>
                    <?php
                     $total_amount=$woocommerce->cart->get_cart_total();
                   if ($total_amount) {
                       echo $total_amount;
                   } else {
                       echo '0';
                   } ?>

                    </span>
                </div>
            </div>
            <div class="humberger__menu__widget">
                <div class="header__top__right__auth">

                <?php
      if (is_user_logged_in()) {
          $current_user= wp_get_current_user();
          echo $current_user->display_name;
      } else {?>
                    <a href="<?php echo esc_url(wp_login_url()); ?>">
                        <?php _e('Login', 'ogani'); ?>
                        <?php }
      ?>

                    </div>
                </div>
                <nav class="humberger__menu__nav mobile-menu">
                    <?php wp_nav_menu(array( 'theme_location'=> 'main_menu', )); ?>
                </nav>
                <div id="mobile-menu-wrap"></div>
                <div class="header__top__right__social">
                    <?php if ($header_icons = get_field('header_social', 'options')) {
          foreach ($header_icons as $icon) {?>
                    <a href="<?php echo $icon['icon_link']; ?>">
                        <i class="fa <?php echo $icon['select_icon']; ?>"></i>
                    </a>
                    <?php }
      } ?>

                </div>
                <div class="humberger__menu__contact">
                    <ul>
                        <?php if ($email=get_field('header_email', 'options')) {?>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <?php echo $email; ?></li>
                        <?php } ?>
                        <?php if ($header_notice=get_field('header__shipping_notice', 'options')) {?>
                        <li><?php echo $header_notice; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- Humberger End -->

            <!-- Header Section Begin -->
            <header class="header">
                <div class="header__top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="header__top__left">
                                    <ul>
                                        <?php if ($email=get_field('header_email', 'options')) {?>
                                        <li>
                                            <i class="fa fa-envelope"></i>
                                            <?php echo $email; ?></li>
                                        <?php } ?>

                                        <?php if ($header_notice=get_field('header__shipping_notice', 'options')) {?>
                                        <li><?php echo $header_notice; ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="header__top__right">
                                    <div class="header__top__right__social">
                                        <?php if ($header_icons = get_field('header_social', 'options')) {
          foreach ($header_icons as $icon) {?>
                                        <a href="<?php echo $icon['icon_link']; ?>">
                                            <i class="fa <?php echo $icon['select_icon']; ?>"></i>
                                        </a>
                                        <?php }
      } ?>
                                    </div>
                                    <div class="header__top__right__auth">
                                    <?php
                                    if (is_user_logged_in()) {
                                        $current_user= wp_get_current_user();
                                        echo $current_user->display_name;
                                    } else {?>
                                        <a href="<?php echo esc_url(wp_login_url()); ?>">
                                            <?php _e('Login', 'ogani'); ?>
                                            <?php }
                                    ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="header__logo">
                                    <?php $logo=get_field('header_logo', 'options'); ?>
                                    <?php if ($logo) {?>
                                    <a href="<?php echo esc_url(home_url()) ?>"><img src="<?php echo $logo['url'] ?>"></a>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <nav class="header__menu">
                                    <?php wp_nav_menu(array( 'theme_location'=> 'main_menu', )); ?>
                                </nav>
                            </div>
                            <div class="col-lg-3">
                                <div class="header__cart">
                                    <ul>
                                        <li>
                                            <a href="<?php echo get_page_link(99); ?>">
                                                <i class="fa fa-heart"></i>
                                                <span><?php $count = 0; if (function_exists('yith_wcwl_count_products')) {
                                        echo
                                                    $count = yith_wcwl_count_products();
                                    } ?></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo wc_get_cart_url(); ?>">
                                                <i class="fa fa-shopping-bag"></i>
                                                <span>
                                                <?php
                                         $total_itmes=$woocommerce->cart->cart_contents_count;
                                        if ($total_itmes) {
                                            echo $total_itmes;
                                        } else {
                                            echo '0';
                                        } ?>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="header__cart__price">item:
                                        <span>
                                        <?php
                                $total_amount=$woocommerce->cart->get_cart_total();
                                if ($total_amount) {
                                    echo $total_amount;
                                } else {
                                    echo '0';
                                } ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="humberger__open">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                </header>
                <!-- Header Section End -->