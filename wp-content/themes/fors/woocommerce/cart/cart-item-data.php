<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-item-data.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?/*<dl class="variation">*/?>
	<?php foreach ( $item_data as $data ) : ?>
		<? if ($data['key'] == 'theurl') { ?>
			<div class="product_variation">
			<?/*<span class="product_variation-name <?php echo sanitize_html_class( 'variation-theurl' ); ?>">Ваш бадлон:</span>*/ ?>
			<span class="product_variation-value <?php echo sanitize_html_class( 'variation-theurl' ); ?>"><a href="http://<? echo $data['value']; ?>">Ссылка на ваш кастом</a></span>
			</div>
			<? //print_r($data);?>
		<? } else { ?>
			<div class="product_variation">
			<span class="product_variation-name <?php echo sanitize_html_class( 'variation-' . $data['key'] ); ?>"><?php echo wp_kses_post( $data['key'] ); ?>:</span>
			<span class="product_variation-value <?php echo sanitize_html_class( 'variation-' . $data['key'] ); ?>"><?php echo strip_tags(wp_kses_post( wpautop( $data['display'] ) )); ?></span>
			</div>
	<? } ?>
	<?php endforeach; ?>
<? /*</dl> */ ?>
