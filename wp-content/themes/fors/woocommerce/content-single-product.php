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
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('product-detail'); ?>>

	<div class="container product-detail_top ">
		<? //do_action( 'woocommerce_single_product_summary_mod' ); //zrx admin product field?>

		<div class="main-screen">
			<h1 class="main-screen__title" data-scroll >Создай <br>свой <br>бадлон</h1><!-- uk-scrollspy="cls: uk-animation-scale-down; delay: 200"  -->
			<div class="main-screen__columns">
				<div class="main-screen__left">
					<div class="main-screen__subtitle">Качественный бадлон&nbsp;&mdash; нестареющая база для десятков стильных луков</div>
					<div class="main-screen__steps-title">Все просто:</div>
					<div class="main-screen__steps">
						<div class="main-screen__step">
							<div class="main-screen__step-number">1</div>
							<div class="main-screen__step-text">Выбери цвет и&nbsp;размер</div>
						</div>
						<div class="main-screen__step">
							<div class="main-screen__step-number">2</div>
							<div class="main-screen__step-text">Добавь надпись</div>
						</div>
					</div>
				</div>
				<div class="main-screen__right">
					<div class="main-screen__advantages">
						<div class="main-screen__advantage">
							<div class="main-screen__advantage-image"><img src="/wp-content/themes/supro/img/icon-badlon.svg" width="80" height="80" alt=""></div>
							<div class="main-screen__advantage-text">Материал — 100% вискоза</div>
						</div>
						<div class="main-screen__advantage">
							<div class="main-screen__advantage-image"><img src="/wp-content/themes/supro/img/icon-shipping.svg" width="80" height="80" alt=""></div>
							<div class="main-screen__advantage-text">Изготовим в&nbsp;течении недели и&nbsp;бесплатно доставим по&nbsp;России</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>



	<div class="product-summary entry-summary product-detail_middle">
		<?php
			/**
			 * Hook: woocommerce_single_product_summary.
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
		<calc>

		</calc>
		<div class="product-images-wrapper">
			<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>
	</div>

	<div class="container product-detail_bottom margin-block margin-top block-bg-grey container-760">
		<div class="block-content">
			<div class="header-summary">
				<? 	do_action( 'woocommerce_single_product_summary_bottom' ); //zrx ?>
			</div>
		<p class="cart-note"><i class="" uk-icon="future"></i> Изготовим в течение 7 дней <br>и бесплатно доставим по России</p>
		</div>
	</div>


	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>


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

<div class="product-one-page-checkout-wrap">
<?php do_action( 'woocommerce_after_single_product' ); ?>
</div>