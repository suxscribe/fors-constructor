<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
?>

<div class="product-images-slideshow" uk-slideshow="animation: fade; ratio: 1000:1549">
  <ul class="uk-slideshow-items">
		<?php
		// OLD IMAGE GALLERY CODE //zrx
		// if ( $product->get_image_id() ) {
		// 	$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		// } else {
		// 	$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
		// 	$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
		// 	$html .= '</div>';
		// }

		// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		// add_filter( 'woocommerce_gallery_thumbnail_size', function( $size ) {
		// return 'full'; //zrx full size instead of thumbnails
		// });

		// do_action( 'woocommerce_product_thumbnails' );
		?>

		<?php

		// show product images

		$attachment_ids = $product->get_gallery_image_ids();

		foreach( $attachment_ids as $attachment_id ) {
      // Display the image URL
      //echo $Original_image_url = wp_get_attachment_url( $attachment_id ); ?>
      <div class="woocommerce-product-gallery__image ">
      	<? // Display Image with lazyload
      	echo wp_get_attachment_image($attachment_id, 'full', false, array(
      		'src' => '',
  		    'srcset' => '/',
  		    'uk-img' => 'dataSrcset:'.wp_get_attachment_image_srcset( $attachment_id, 'full' ),

      	));
      	// 'data-flickity-lazyload-srcset' => wp_get_attachment_image_srcset( $attachment_id, 'full' ),
      	// wp_get_attachment_image_url( $attachment_id, 'full' )
      	//  ?>
      </div>
    <? } ?>
  </ul>

</div>






