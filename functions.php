<?php

require_once('lib/theme_setup.php');
require_once('lib/theme_scripts.php');
require_once('lib/acf-options.php');
require_once('lib/widgets.php');
require_once('lib/class-tgm-plugin-activation.php');
require_once('lib/plugins-activation.php');


/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 3; // 3 products per row
    }
}


// Display the Woocommerce Discount Percentage on the Sale Badge for variable products and single products

function display_percentage_on_sale_badge($html, $post, $product)
{
    if ($product->is_type('variable')) {
        $percentages = array();

        // This will get all the variation prices and loop throughout them
        $prices = $product->get_variation_prices();

        foreach ($prices['price'] as $key => $price) {
            // Only on sale variations
            if ($prices['regular_price'][$key] !== $price) {
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round(100 - (floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100));
            }
        }
        // Displays maximum discount value
        $percentage = max($percentages) . '%';
    } elseif ($product->is_type('grouped')) {
        $percentages = array();

        // This will get all the variation prices and loop throughout them
        $children_ids = $product->get_children();

        foreach ($children_ids as $child_id) {
            $child_product = wc_get_product($child_id);

            $regular_price = (float) $child_product->get_regular_price();
            $sale_price    = (float) $child_product->get_sale_price();

            if ($sale_price != 0 || ! empty($sale_price)) {
                // Calculate and set in the array the percentage for each child on sale
                $percentages[] = round(100 - ($sale_price / $regular_price * 100));
            }
        }
        // Displays maximum discount value
        $percentage = max($percentages) . '%';
    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();

        if ($sale_price != 0 || ! empty($sale_price)) {
            $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
        } else {
            return $html;
        }
    }
    return '<span class="product__discount__percent">' . esc_html__('-', 'woocommerce'). $percentage . '</span>'; // If needed then change or remove "up to -" text
}
add_filter('woocommerce_sale_flash', 'display_percentage_on_sale_badge', 20, 3);



// woocommerce plus minus button
 
function ts_quantity_plus_sign()
{
    echo '<button type="button" class="plus" >+</button>';
}
add_action('woocommerce_after_add_to_cart_quantity', 'ts_quantity_plus_sign');


function ts_quantity_minus_sign()
{
    echo '<button type="button" class="minus" >-</button>';
}
add_action('woocommerce_before_add_to_cart_quantity', 'ts_quantity_minus_sign');

 
function ts_quantity_plus_minus()
{
    // To run this on the single product page
    if (! is_product()) {
        return;
    } ?>
   <script type="text/javascript">
          
      jQuery(document).ready(function($){   
          
            $('form.cart').on( 'click', 'button.plus, button.minus', function() {
 
            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
 
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } 
            else {
               qty.val( val + step );
                 }
            } 
            else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } 
               else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
             
         });
          
      });
          
   </script>
   <?php
}
add_action('wp_footer', 'ts_quantity_plus_minus');
