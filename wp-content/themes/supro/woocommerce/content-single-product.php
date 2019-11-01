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
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$product_layout = supro_get_option( 'single_product_layout' );
?>




<div id="product-<?php the_ID(); ?>" <?php wc_product_class('product type-product status-publish has-post-thumbnail product_cat-bags product_cat-women product_tag-bag product_tag-cotton first instock taxable shipping-taxable purchasable product-type-simple supro-single-product supro-product-layout-1 supro-product-slider'); ?>>

	<div class="supro-single-product-detail">
		<div class="container product-detail_top ">
			<? 					do_action( 'woocommerce_single_product_summary_mod' ); //zrx ?>

		</div>
		<?php if ( ! in_array( $product_layout, array( '5', '6' ) ) ) : ?>
			<div class="container">
		<?php endif; ?>
			<?php
			do_action( 'supro_before_single_product' );
			?>
			<div class="product-images-wrapper">
				<?php
				/**
				 * woocommerce_before_single_product_summary hook.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>
			<div class="product-summary">
				<div class="summary entry-summary">

					<?php
					/**
					 * woocommerce_single_product_summary hook.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action( 'woocommerce_single_product_summary' );
					?>

				</div>
			</div>
		<?php if ( ! in_array( $product_layout, array( '5', '6' ) ) ) : ?>
			</div>
		<?php endif; ?>
		<!-- .summary -->
	</div>
	<div class="clear"></div>
	<div class="container product-detail_bottom margin-block margin-top block-bg-grey container-760">
		<div class="block-content">
		<? 	do_action( 'woocommerce_single_product_summary_bottom' ); //zrx ?>
		<p class="cart-note"><i class="ion-android-time"></i> Изготовим в течение 7 дней <br>и бесплатно доставим по России</p>
		</div>
	</div>
	<div class="container">
		<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
		?>

		<meta content="<?php the_permalink(); ?>" />
	</div>

</div><!-- #product-<?php the_ID(); ?> -->


<?php
		//moved from header.php //zrx
		function getButt($mass){

			$gfoMass = get_field_object($mass);

			if($gfoMass['value']){
				$cccstr= '[';
				foreach($gfoMass['value'] as $k1 => $v1){
					if (is_array($v1)){
						$cccstr.= "1, ";
					} else $cccstr.= "0, ";
				}
				$cccstr.= ']';

				return str_replace(', ]',']',$cccstr);

			}
		}

	?>

	<script type="text/javascript">

		var cprices = {
			cstart :	'<?php the_field('cstart'); ?>',
			ccc :		[<?php the_field('cccolor'); ?>],
			ct :		[<?php the_field('ctext'); ?>],
			cfc :		[<?php the_field('cfcolor'); ?>],
			cf :		[<?php the_field('cfont'); ?>],
			cp :		[<?php the_field('cpos'); ?>],
			cs :		[<?php the_field('csize'); ?>],

			<?php echo "cccb: ".getButt('cccolorb').",\r\n"; ?>
			<?php echo "ctb:  ".getButt('ctextb').",\r\n"; ?>
			<?php echo "cfcb: ".getButt('cfcolorb').",\r\n"; ?>
			<?php echo "cfb:  ".getButt('cfontb').",\r\n"; ?>
			<?php echo "cpb:  ".getButt('cposb').",\r\n"; ?>
			<?php echo "csb:  ".getButt('csizeb')."\r\n"; ?>

		}

	</script>


<?php do_action( 'woocommerce_after_single_product' ); ?>
