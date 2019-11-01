<?php
/**
 * This template renders just a checkout
 */
$checkout = WC()->checkout();

wc_get_template( 'checkout/form-checkout.php', array( 'checkout' => $checkout ) );
