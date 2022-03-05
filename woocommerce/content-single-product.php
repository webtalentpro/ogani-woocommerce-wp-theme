<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */


if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<section class="breadcrumb-section set-bg" data-setbg="<?php echo esc_url(get_template_directory_uri()); ?>/img/breadcrumb.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2><?php the_title(); ?></h2>
						<div class="breadcrumb__option">
							<a href="<?php echo esc_url(home_url()); ?>">Home</a>
							<?php $categ = $product->get_categories(','); echo $categ;?>
							<span><?php the_title(); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
            do_action('woocommerce_before_single_product');
        ?>
			</div>
		</div>
	</div>

	<!-- Product Details Section Begin -->
<section class="product-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="product__details__pic">
					<div class="product__details__pic__item">
					<img class="product__details__pic__item--large" src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>">
							
					</div>
					<div class="product__details__pic__slider owl-carousel">
						<?php
                          $attachment_ids = $product->get_gallery_image_ids();

                        foreach ($attachment_ids as $attachment_id) {
                            $image_link = wp_get_attachment_url($attachment_id); ?>
							<img data-imgbigurl="<?php echo $image_link; ?>"
	                         src="<?php echo $image_link; ?>" alt="">
                          
                       <?php
                        }
                        ?>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="product__details__text">
				<?php woocommerce_template_single_title()?>
					<div class="product__details__rating">
						<?php woocommerce_template_single_rating(); ?>
					</div>
					<?php woocommerce_template_single_price('<div calss="product__details__price">', '</div>'); ?>
					<?php woocommerce_template_single_excerpt() ?> 
					<?php woocommerce_template_single_add_to_cart(); ?>
				   
					<ul>
						<li><b>Availability</b> <span><?php echo $product->get_stock_quantity() ?></span></li>
						<li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>

						<li><b>Weight</b> <span><?php echo $product->get_weight(); ?><?php echo get_option('woocommerce_weight_unit');  ?>
                        </span></li>

						<li><b>Share on</b>
							<div class="share">
						        <?php get_template_part('socialshare', 'links')?>                                                                              
							</div>
						</li>
					</ul>
				</div>
			</div>	
		</div>
	</div>
</section>
<!-- Product Details Section End -->


<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>



	<?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action('woocommerce_after_single_product_summary');
    ?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>
