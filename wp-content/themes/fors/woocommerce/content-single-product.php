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

	<? //do_action( 'woocommerce_single_product_summary_mod' ); //zrx disabled admin product field?>
	<div class="product-detail_top container  ">

		<div class="main-bg"></div>

		<div class="main-circles">

			<div class="main__circle main__circle--1"></div>
			<div class="main__circle main__circle--2"></div>
			<div class="main__circle main__circle--3"></div>


		</div>
		<div class="uk-container">
			<div class="main-screen ">

				<div class="main-screen__top">
					<h1 class="main-screen__title ">Создай <br>свой <br>бадлон</h1>
					<div class="main-bg__lines">
						<div class="main-bg__line"></div>
						<div class="main-bg__line"></div>
						<div class="main-bg__line"></div>
						<div class="main-bg__line"></div>
						<div class="main-bg__line"></div>
						<div class="main-bg__line"></div>
						<div class="main-bg__line"></div>
					</div>
					<div class="main-screen__subtitle">Качественный бадлон&nbsp;— нестареющая база для&nbsp;десятков стильных луков</div>

				</div>


				<div class="main-screen__columns">
					<div class="main-screen__left">

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
					<div class="main-screen__center">
						<a href="#product-anchor" class="main-screen__scroller">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 20.7 81" style="enable-background:new 0 0 20.7 81;" xml:space="preserve">
							<style type="text/css">
								.st0{fill:none;stroke:#000000;}
							</style>
							<g id="arrow" transform="translate(-673.236 -527.5)">
								<line id="Line_6" class="st0" x1="683.6" y1="527.5" x2="683.6" y2="607.5"/>
								<g id="Component_1_1" transform="translate(673.609 596.526)">
									<path id="Path_62" class="st0" d="M0,0l10,11.2L20,0"/>
								</g>
							</g>
							</svg>



						</a>
					</div>
					<div class="main-screen__right">
						<div class="main-screen__advantages">
							<div class="main-screen__advantage">
								<div class="main-screen__advantage-image"><img src="http://constructor.fors-official.com/wp-content/themes/fors/images/icon-badlon.svg" alt="" width="80" height="80"></div>
								<div class="main-screen__advantage-text">Материал — 100% вискоза</div>
							</div>
							<div class="main-screen__advantage">
								<div class="main-screen__advantage-image"><img src="http://constructor.fors-official.com/wp-content/themes/fors/images/icon-shipping.svg" alt="" width="80" height="80"></div>
								<div class="main-screen__advantage-text">Бесплатно доставим по&nbsp;России</div>
							</div>
						</div>
					</div>
					<div class="main-screen__bottom">
						<a href="#product-anchor" class="button-rounded button-primary">Начать</a>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div id="product-anchor" class="product-detail_middle product-summary entry-summary uk-container">

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
			<div class="product-bar uk-hidden@s" >  <!-- uk-sticky="bottom:true;" -->
				<div class="product-bar__inner">
					<a class="product-bar__link product-bar__link_left" href="#" uk-toggle="target: #constructor-bar-left"><i uk-icon="chevron-left"></i>ЦВЕТ, РАЗМЕР</a>
					<a class="product-bar__link product-bar__link_right" href="#" uk-toggle="target: #constructor-bar-right">НАДПИСЬ<i uk-icon="chevron-right"></i></a>
				</div>
			</div>

			<calc>
				<?php //the_field('calc_left'); ?>
				<div id="calc-section-column-left" class="calc-section-column uk-visible@s view ">
					<div class="calc-section-wrap calc-section-wrap_left">
						<section class="calc-section_ccolor" ccolor="">
							<div class="calc-section-title">Цвет пряжи</div>
							<labels class="calc-radio calc-colors" tabindex="1">
								<label class="calc-color-f3e03b"><input type="radio" name="ccolor" data-value="Цинково-жёлтый" val="13" checked="checked" /><span></span><div>Цинково-жёлтый</div></label>
								<label class="calc-color-e9e5ce"><input type="radio" name="ccolor" data-value="Жемчужно-белый" val="2" /><span></span><div>Жемчужно-белый</div></label>
								<label class="calc-color-756f61"><input type="radio" name="ccolor" data-value="Бежево-серый" val="1"/><span></span><div>Бежево-серый</div></label>
								<label class="calc-color-0f4336"><input type="radio" name="ccolor" data-value="Зелёный" val="3"/><span></span><div>Зелёный</div></label>
								<label class="calc-color-f70000"><input type="radio" name="ccolor" data-value="Красный" val="4"/><span></span><div>Красный</div></label>
								<label class="calc-color-b42041"><input type="radio" name="ccolor" data-value="Малиновый" val="5"/><span></span><div>Малиновый</div></label>
								<label class="calc-color-478a84"><input type="radio" name="ccolor" data-value="Мятно-бирюзовый" val="6"/><span></span><div>Мятно-бирюзовый</div></label>
								<label class="calc-color-e75b12"><input type="radio" name="ccolor" data-value="Оранжевый" val="7"/><span></span><div>Оранжевый</div></label>
								<label class="calc-color-6a93b0"><input type="radio" name="ccolor" data-value="Пастельно-синий" val="8"/><span></span><div>Пастельно-синий</div></label>
								<label class="calc-color-e1a6ad"><input type="radio" name="ccolor" data-value="Светло-розовый" val="9"/><span></span><div>Светло-розовый</div></label>
								<label class="calc-color-d47479"><input type="radio" name="ccolor" data-value="Розовый антик" val="10"/><span></span><div>Розовый антик</div></label>
								<label class="calc-color-154889"><input type="radio" name="ccolor" data-value="Синий" val="11"/><span></span><div>Синий</div></label>
								<label class="calc-color-232c3f"><input type="radio" name="ccolor" data-value="Темно-синий" val="12"/><span></span><div>Темно-синий</div></label>

								<label class="calc-color-0a0a0d"><input type="radio" name="ccolor" data-value="Чёрный янтарь" val="14"/><span></span><div>Чёрный янтарь</div></label>
							</labels>
						</section>
						<section class="calc-section_size" size="">
							<div class="calc-section-title">Размер бадлона </div>
							<labels class="calc-radio calc-size" >
								<label><input type="radio" name="size" data-value="XS" val="XS" checked="checked" tabindex="2" /><span>XS</span></label>
								<label><input type="radio" name="size" data-value="S" val="S" /><span>S</span></label>
								<label><input type="radio" name="size" data-value="M" val="M" /><span>M</span></label>
								<label><input type="radio" name="size" data-value="L" val="L" /><span>L</span></label>

							</labels>
							<div class="calc-section-text">
								<a id="link_size-chart" class="link_size-chart link_modal" href="#modal-size-chart" uk-toggle>Таблица размеров</a>
							</div>

						</section>
					</div>
				</div>

				<div id="calc-section-image" class="calc-section_image" > <!-- uk-scrollspy="cls: uk-animation-scale-down; delay: 1600" -->

					<!-- <div class="preloader preloader--active">
					  <div class="preloader__logo-wrap">
					    <div class="preloader__logo"></div>
					  </div>
					</div> -->

					<div class="product-images-wrapper "> <!-- product-images-wrapper--hidden -->
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


				<?php //the_field('calc_right'); ?>
				<div id="calc-section-column-right" class="calc-section-column uk-visible@s view ">
					<div class="calc-section-wrap calc-section-wrap_right">


						<div class="calc-section-row">
							<div class="calc-section-title ">Надпись</div>

							<section class="calc-section_align" pos>
								<labels class="calc-radio calc-align" >
									<label><input type="radio" name="pos" data-value="Надпись по центру" checked tabindex=5 /><span class="text-align text-align__center"  title="Текст по центру"></span></label>
									<label><input type="radio" name="pos" data-value="Надпись слева" /><span class="text-align text-align__right"  title="Текст слева"></span></label>
								</labels>
							</section>
						</div>

						<section class="calc-section_text" text>
							<labels class="calc-text" >
								<label><input type="search" name="text0" maxlength="12" placeholder="Первая строка" tabindex=3 /><span></span></label>
								<label><input type="search" name="text1" maxlength="12" placeholder="Вторая строка" tabindex=4 /><span></span></label>
							</labels>
						</section>

						<section class="calc-section_font" font>
							<div class="calc-section_font-title calc-section-title ">Шрифт</div>
							<labels class="calc-section_font-controls calc-radio calc-fonts">
								<!-- <label><input type="radio" name="font" data-value="Docker One" title="Docker One" val="docker-one" checked tabindex=6 /><span>Tt</span></label> -->
								<!-- <label><input type="radio" name="font" data-value="Droid Serif" title="Droid Serif" val="droid-serif" /><span>Tt</span></label> -->
								<label><input type="radio" name="font" data-value="Circe" title="Circe" val="circe" /><span>Tt</span></label>
								<label><input type="radio" name="font" data-value="Oranienbaum" title="Oranienbaum" val="oranienbaum" /><span>Tt</span></label>
								<label><input type="radio" name="font" data-value="Roboto Regular" title="Roboto Regular" val="robotoregular" /><span>Tt</span></label>
								<label><input type="radio" name="font" data-value="Journalism" title="Journalism" val="journalismregular" /><span>Tt</span></label>

								<!-- <label><input type="radio" name="font" data-value="Comic Sans MS pixel" title="Comic Sans MS pixel" val="ComicSansMSpixel" checked tabindex=6 /><span>Tt</span></label>
								<label><input type="radio" name="font" data-value="EFN Mac Style" title="EFN Mac Style" val="EFNMacStyle8px" /><span>Tt</span></label>
								<label><input type="radio" name="font" data-value="VCR OSD Mono" title="VCR OSD Mono" val="VCROSDMono" /><span>Tt</span></label> -->
							</labels>
						</section>


						<section class="calc-secton_fcolor" fcolor>
							<div class="calc-section-title">Цвет надписи</div>
							<labels class="calc-radio calc-colors">
								<label class="calc-color-f70000"><input type="radio" name="fcolor" data-value="Красный" val="#F70000" /><span></span><div>Красный</div></label>
								<label class="calc-color-6a93b0"><input type="radio" name="fcolor" data-value="Пастельно-синий" val="#6A93B0" /><span></span><div>Пастельно-синий</div></label>
								<label class="calc-color-756f61"><input type="radio" name="fcolor" data-value="Бежево-серый" val="#756f61" /><span></span><div>Бежево-серый</div></label>
								<label class="calc-color-e9e5ce"><input type="radio" name="fcolor" data-value="Жемчужно-белый" val="#f9f8f3" /><span></span><div>Жемчужно-белый</div></label>
								<label class="calc-color-0f4336"><input type="radio" name="fcolor" data-value="Зелёный" val="#0F4336" /><span></span><div>Зелёный</div></label>
								<label class="calc-color-b42041"><input type="radio" name="fcolor" data-value="Малиновый" val="#B42041" /><span></span><div>Малиновый</div></label>
								<label class="calc-color-478a84"><input type="radio" name="fcolor" data-value="Мятно-бирюзовый" val="#478A84" /><span></span><div>Мятно-бирюзовый</div></label>
								<label class="calc-color-e75b12"><input type="radio" name="fcolor" data-value="Оранжевый" val="#E75B12" /><span></span><div>Оранжевый</div></label>
								<label class="calc-color-d47479"><input type="radio" name="fcolor" data-value="Розовый антик" val="#D47479" /><span></span><div>Розовый антик</div></label>
								<label class="calc-color-e1a6ad"><input type="radio" name="fcolor" data-value="Светло-розовый" val="#E1A6AD" /><span></span><div>Светло-розовый</div></label>
								<label class="calc-color-154889"><input type="radio" name="fcolor" data-value="Синий" val="#154889" /><span></span><div>Синий</div></label>
								<label class="calc-color-232c3f"><input type="radio" name="fcolor" data-value="Темно-синий" val="#232C3F" /><span></span><div>Темно-синий</div></label>
								<label class="calc-color-f3e03b"><input type="radio" name="fcolor" data-value="Цинково-жёлтый" val="#F3E03B" /><span></span><div>Цинково-жёлтый</div></label>
								<label class="calc-color-0a0a0d"><input type="radio" name="fcolor" data-value="Чёрный янтарь" val="#0A0A0D" /><span></span><div>Чёрный янтарь</div></label>
							</labels>
						</section>


					</div>
				</div>
				<div class="product-images__swipe-icon icon-hand-swipe"></div>


			</calc>





		</div>

		<div id="constructor-bar-left" uk-offcanvas="mode: push; overlay: true;" class="constructor-offcanvas">
			<div class="constructor-offcanvas__bar uk-offcanvas-bar">

				<button class="uk-offcanvas-close" type="button" uk-close></button>

				<h3>Выбери цвет и&nbsp;размер</h3>

				<div id="constructor-bar-controls-left" class="product-constructor-bar__controls"></div>

				<a href="#" class="constructor-offcanvas__close-button button-rounded uk-offcanvas-close">Готово</a>
			</div>
		</div>


		<div id="constructor-bar-right" uk-offcanvas="mode: push; flip: true; overlay: true;" class="constructor-offcanvas">
			<div class="constructor-offcanvas__bar uk-offcanvas-bar">

				<button class="uk-offcanvas-close" type="button" uk-close></button>

				<h3>Добавь надпись</h3>

				<div id="constructor-bar-controls-right" class="product-constructor-bar__controls">
				</div>

				<a href="#" class="constructor-offcanvas__close-button button-rounded uk-offcanvas-close">Готово</a>

			</div>
		</div>





		<div class="product-detail_bottom container margin-block  block-bg-grey container-760">
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

	<div class="uk-container">
	<!-- new about section -->
	<section class="about ">
		<div class="margin-block  uk-text-center">
			<h2  class="title-muted uk-text-center">О&nbsp; конструкторе</h2>
			<p class="uk-text-lead container-760">Мы&nbsp;разработали для Вас свой персональный кастомайзинг&nbsp;&mdash; <br>вещь которую&nbsp;Вы сможете создать сами, индивидуально в&nbsp;единственном экземпляре.<p>

				<p>Вам нужно только выбрать любимый цвет и&nbsp;добавить желаемую надпись на&nbsp;русском или английском, а&nbsp;с&nbsp;нас все остальное&nbsp;&mdash; <br>приятный к&nbsp;телу состав из&nbsp;100% вискозы, изготовление в&nbsp;течении недели и&nbsp;бесплатная доставка.</p>
				<p>Такая вещь станет индивидуальностью вашего гардероба или необычным интересным подарком.</p>

			</div>
			<div class="about__image">

				<picture>
					<source srcset="/wp-content/themes/fors/images/badlon-wide-01.webp 1000w" media="(min-width: 960px)" sizes="100vw">
					<source srcset="/wp-content/themes/fors/images/badlon-wide-01-s.jpg 600w" media="(min-width: 600px)" sizes="100vw">
					<source srcset="/wp-content/themes/fors/images/badlon-wide-01-xs.jpg 400w" media="(min-width: 320px)" sizes="100vw">
			    <img src="/wp-content/themes/fors/images/badlon-wide-01.jpg" />
				</picture>

			</div>
		</section>

		<div class="block_about-advantages margin-block">
			<h3 class="title-muted uk-text-center uk-margin-large-bottom">Почему наши бадлоны особенные</h3>
			<div class="uk-grid about-advantages uk-child-width-1-2@s uk-child-width-1-4@m" uk-grid>
				<div class="about-advantage">
					<div class="about-icon"><img src="/wp-content/uploads/2019/04/icon-fabric.svg" alt="" width="80" /></div>
					<div class="about-text">100% вискоза<br>Мягкая, дышащая, легкая и&nbsp;приятная телу ткань</div>
				</div>
				<div class="about-advantage">
					<div class="about-icon"><img src="/wp-content/uploads/2019/04/icon-lekalo.svg" alt="" width="80" /></div>
					<div class="about-text">Мы&nbsp;разработали свои лекала, чтобы вещи лучше сидели</div>
				</div>
				<div class="about-advantage">
					<div class="about-icon"><img src="/wp-content/uploads/2019/04/icon-embroidery.svg" alt="" width="80" /></div>
					<div class="about-text">Надпись ввязывается в&nbsp;ткань и&nbsp;придает бадлону уникальный вид</div>
				</div>
				<div class="about-advantage">
					<div class="about-icon"><img src="/wp-content/uploads/2019/04/icon-machine.svg" alt="" width="80" /></div>
					<div class="about-text">Мы&nbsp;делаем всю одежду на&nbsp;нашей фабрике в&nbsp;Нижегородской области</div>
				</div>
			</div>
		</div>

		<div class="margin-block block-fullwidth uk-margin-large-bottom">
			<div class="badlon-slider uk-position-relative uk-light" tabindex="-1" uk-slider="finite:true">
				<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-3@m uk-child-width-1-4@xl">
					<li class=""><img uk-img="target: !.uk-slider-items" data-width data-height data-src="/wp-content/uploads/2019/08/badlon-on-models-02.jpg" alt=""></li>
					<li class=""><img uk-img="target: !.uk-slider-items" data-src="/wp-content/uploads/2019/08/badlon-on-models-03.jpg" alt=""></li>
					<li class=""><img uk-img="target: !.uk-slider-items" data-src="/wp-content/uploads/2019/08/badlon-on-models-04.jpg" alt=""></li>
					<li class=""><img uk-img="target: !.uk-slider-items" data-src="/wp-content/uploads/2019/08/badlon-on-models-05.jpg" alt=""></li>
					<li class=""><img uk-img="target: !.uk-slider-items" data-src="/wp-content/uploads/2019/08/badlon-on-models-06.jpg" alt=""></li>
					<li class=""><img uk-img="target: !.uk-slider-items" data-src="/wp-content/uploads/2019/08/badlon-on-models-07.jpg" alt=""></li>
					<!-- <li class=""><img uk-img="target: !.uk-slider-items" data-src="/wp-content/uploads/2019/08/badlon-on-models-08.jpg" alt=""></li> -->
					<li class=""><img uk-img="target: !.uk-slider-items" data-src="/wp-content/uploads/2019/08/badlon-on-models-10.jpg" alt=""></li>
					<li class=""><img uk-img="target: !.uk-slider-items" data-src="/wp-content/uploads/2019/08/badlon-on-models-11.jpg" alt=""></li>
					<li class=""><img uk-img="target: !.uk-slider-items" data-src="/wp-content/uploads/2019/08/badlon-on-models-12.jpg" alt=""></li>
				</ul>
				<div><a class="uk-position-center-left uk-position-small uk-hidden-hover uk-slidenav-large" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
					<a class="uk-position-center-right uk-position-small uk-hidden-hover uk-slidenav-large" href="#" uk-slidenav-next uk-slider-item="next"></a>
				</div>
			</div>
		</div>

		<div id="payment" class="margin-block" >
			<div class="">
				<div class="shipping">
					<div class="panel panel__grey">
						<h3 class="list-icon__title title-muted uk-text-center">Как получить свой заказ</h3>
						<ul class="list-icon">
							<li class="list-icon__item">
								<div class="list-icon__item-icon"><img src="/wp-content/themes/fors/images/icon-bag.svg" alt=""></div>
								<div class="list-icon__item-text"><strong>Забрать в&nbsp;FORSELF </strong> <br>В&nbsp;Нижнем Новгороде на&nbsp;Зеленском съезде 4</div>
							</li>
							<li class="list-icon__item">
								<div class="list-icon__item-icon"><img src="/wp-content/themes/fors/images/icon-shipping.svg" alt=""></div>
								<div class="list-icon__item-text"><strong>Или доставим до&nbsp;двери бесплатно</strong> <br>Доставка курьерской службой СДЭК по&nbsp;всей России</div>
							</li>
						</ul>

					</div>
				</div>
				<div class="payment">
					<div class="panel panel__blank">
						<h3 class="list-icon__title title-muted uk-text-center">Как оплатить</h3>
						<ul class="list-icon ">
							<li class="list-icon__item list-icon__payment__item">
								<div class="list-icon__item-icon list-icon__item-icon__payment"><img src="/wp-content/themes/fors/images/icon-money.svg" alt=""></div>
								<div class="list-icon__item-text"><strong>Наличными</strong></div>
							</li>
							<li class="list-icon__item list-icon__payment__item">
								<div class="list-icon__item-icon list-icon__item-icon__payment"><img src="/wp-content/themes/fors/images/icon-card.svg" alt=""></div>
								<div class="list-icon__item-text"><strong>Банковской картой</strong></div>
							</li>
							<li class="list-icon__item list-icon__payment__item">
								<div class="list-icon__item-icon list-icon__item-icon__payment"><img src="/wp-content/themes/fors/images/icon-yandex.svg" alt=""></div>
								<div class="list-icon__item-text"><strong>Яндекс Деньгами</strong></div>
							</li>
						</ul>
					</div>
				</div>

			</div>
			<p class="uk-text-center"><a class="payment__link link" href="/payment-and-delivery">Подробнее о доставке <i uk-icon="chevron-right"></i></a></p>
		</div>


<!--<div class="margin-block container-980">
	<h2 class="title-muted">Возвраты и&nbsp;гарантия</h2>
	<p>В случае произодственного брака напишите или позвоните нам и&nbsp;мы&nbsp;вместе решим проблему. Вернем деньги или заменим бракованную вещь. <a href="/payment-and-delivery/#return">Подробнее...</a> </p>
</div>-->






<section id="feedback" class="feedback">
	<div class="block-fullwidth block-bg-grey">
		<div class="container-760 margin-block block-content uk-text-center">
			<h3  class="feedback__subtitle title-muted uk-text-center">Задать вопрос</h3>
			<h1 class="feedback__title">Ответим на&nbsp;любой ваш вопрос</h1>
			<p>С&nbsp;радостью ответим на&nbsp;любые вопросы по&nbsp;поводу бадлона, спрашивайте :-)</p>

			<form class="form form__feedback">

				<?php echo do_shortcode('[contact-form-7 id="476" title="Контактная форма 1"]'); ?>

				<p class="form__text">Нажимая на&nbsp;кнопку, вы&nbsp;соглашаетесь на&nbsp;<a href="/privacy-policy">обработку персональных данных</a>.</p>
				<p class="form__text">На&nbsp;сайте используется Google ReCaptcha.
					<a href="https://policies.google.com/privacy">Политика конфиденциальности</a> и&nbsp;<a href="https://policies.google.com/terms">Условия использования</a>.</p>
				</form>
			</div>
		</div>
		<div class="contacts margin-block container-760 uk-text-center">
			<h3  class="contacts__subtitle title-muted uk-text-center">Контакты</h3>
			<div class="contacts__title"><a href="tel:+79107950006">+7 910 795-00-06</a></div>
			<div class="contacts__email"><a href="mailto:info@fors-official.com">info@fors-official.com</a></div>
			<div class="contacts__address"><a href="/contacts">Нижний Новгород, Зеленский съезд,&nbsp;4</a></div>
			<div class="contacts__socials">
				<a href="https://www.instagram.com/fors_official/" class=" social social_instagram" target="_blank"></a>
				<a href="https://vk.com/forself_official" class=" social social_vk" target="_blank"></a>
			</div>
		</div>
	</section>


<!--       <ul class="list-how">
		<li>
<h4>Выбираете цвет и размер бадлона</h4>
<div class="list-how__text">Если вы&nbsp;живете в&nbsp;Нижнем Новгороде&nbsp;&mdash; заходите к&nbsp;нам в&nbsp;шоурум. Угостим вас кофе, покажем и&nbsp;дадим примерить бадлон в&nbsp;разных цветах и&nbsp;размерах.</div></li>
		<li>
<h4>Вводите текст надписи</h4>
<div class="list-how__text">Мы&nbsp;вышиваем надпись на&nbsp;ткани нитью. Никаких принтов. Только хардкор.
Можно сделать крупную надпись по&nbsp;центру или надпись поменьше, слева.</div></li>
		<li>
<h4>Выбираете цвет и шрифт надписи</h4>
<div class="list-how__text">На&nbsp;выбор доступно 4&nbsp;самых модных шрифта и&nbsp;специально подобранные цвета.</div></li>
		<li>
<h4>PROFIT!</h4>
<div class="list-how__text">Оформляете заказ и&nbsp;через несколько дней к&nbsp;вам приедет ваш собственный уникальный бадлон! Ни&nbsp;у&nbsp;кого такого нет ;)</div></li>
</ul> -->



<!-- end new about section -->



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

</div> <!-- uk container -->

<div id="modal-size-chart" uk-modal>
	<div class="modal-size-chart__body uk-modal-dialog uk-modal-body">
		<h2 id="modal-1-title" class="modal__title title-muted">Таблица размеров</h2>
		<div class="">
			<p>Мерки необходимо снимать непосредственно по&nbsp;вашей фигуре.</p>

			<ol>
				<li>Измерьте грудную клетку по&nbsp;самой высокой линии вашего бюста</li>
				<li>Измерьте талию в&nbsp;самой узкой части.</li>
				<li>Мерки необходимо снимать по&nbsp;точкам максимальной ширины бедер.</li>
			</ol>
			<div class="uk-overflow-auto table-scrollable">
				<table class="size-guide uk-table uk-table-small">
					<tbody>
						<tr>
							<th> </th>
							<th>XS</th>
							<th>S</th>
							<th>M</th>
							<th> </th>
							<th>L</th>
							<th>XL</th>
						</tr>
						<tr>
							<th>Грудь (см)</th>
							<td>80</td>
							<td>86</td>
							<td>94</td>
							<td>96</td>
							<td>102</td>
							<td>113</td>
						</tr>
						<tr>
							<th>Талия (см)</th>
							<td>64</td>
							<td>70</td>
							<td>78</td>
							<td>80</td>
							<td>86</td>
							<td>97</td>
						</tr>
						<tr>
							<th>Вырез горловины (см)</th>
							<td>35,5</td>
							<td>37</td>
							<td>39</td>
							<td>39</td>
							<td>40</td>
							<td>42</td>
						</tr>
						<tr>
							<th>Длина рукава (см)</th>
							<td>59,6</td>
							<td>59,8</td>
							<td>60,2</td>
							<td>60,4</td>
							<td>60,6</td>
							<td>61</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<p class="uk-text-right">
			<button class="uk-button button-rounded uk-modal-close" type="button">OK</button>

		</p>
	</div>
</div>