<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="checkout-shipping" id="customer_details">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>

				<?php //do_action( 'woocommerce_checkout_shipping' ); //zrx ?>

				<div class="woocommerce-shipping-methods-wrap">
				<h3 class="title-muted">Доставка</h3>

				<?php /*if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

					<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

					<?php wc_cart_totals_shipping_html(); ?>

					<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

				<?php endif; */ //zrx shipping part from review-order.php. Not working with ajax ?>

				</div>

				<!-- </div> -->
				<!-- </div> <? // zrx closing divs from form-billing.php ?> -->

		</div>

	<?php endif; ?>




	<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>


	<h3 id="order_review_heading">Оплата<?php //esc_html_e( 'Your order', 'woocommerce' ); ?></h3>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
