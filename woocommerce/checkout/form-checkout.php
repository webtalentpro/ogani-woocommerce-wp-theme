<?php /** * Checkout Form * * This template can be overridden by copying it to *
* @see https://docs.woocommerce.com/document/template-structure/
* @package WooCommerce\Templates * * @version 3.5.0 */
if (! defined('ABSPATH')) {
    exit;
}
do_action('woocommerce_before_checkout_form', $checkout);
// If checkoutregistration is disabled and not logged in, the user cannot checkout.
 if (!$checkout->is_registration_enabled() && $checkout->is_registration_required()
&& ! is_user_logged_in()) {
     echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You
must be logged in to checkout.', 'woocommerce')));
     return;
 } ?>

<form
    name="checkout"
    method="post"
    class="checkout woocommerce-checkout"
    action="<?php echo esc_url(wc_get_checkout_url()); ?>"
    enctype="multipart/form-data">

    <?php if ($checkout->get_checkout_fields()) : ?>

    <?php do_action('woocommerce_checkout_before_customer_details'); ?>

    <div class="row">
        <div class="col-md-7">
            <div class="woocommerce-billing-fields">
                <?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()) :
                ?>

                <h3><?php esc_html_e('Billing &amp; Shipping', 'woocommerce'); ?></h3>

            <?php else : ?>

                <h3><?php esc_html_e('Billing details', 'woocommerce'); ?></h3>

                <?php endif; ?>

                <?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>

                <div class="woocommerce-billing-fields__field-wrapper">
                    <?php $fields = $checkout->get_checkout_fields('billing'); foreach ($fields as
                    $key => $field) {
                    woocommerce_form_field(
                        $key,
                        $field,
                        $checkout->get_value($key)
                    );
                } ?>
                </div>

                <?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>
            </div>

            <?php do_action('woocommerce_checkout_billing'); ?>
            <?php do_action('woocommerce_checkout_shipping'); ?>
        </div>
        <div class="col-md-5 checkout__order">
           <div class="checkout_bg">
            <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

            <h4 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h4>

            <?php do_action('woocommerce_checkout_before_order_review'); ?>
            <div id="order_review" class="woocommerce-checkout-review-order">
                <?php do_action('woocommerce_checkout_order_review'); ?>
            </div>
            <?php do_action('woocommerce_checkout_after_order_review'); ?>

        </div>
		</div>
    </div>

    <?php do_action('woocommerce_checkout_after_customer_details'); ?>

    <?php endif; ?>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>