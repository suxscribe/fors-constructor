<?php
/**
 * fors functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fors
 */

if ( ! function_exists( 'fors_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fors_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fors, use a find and replace
		 * to change 'fors' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fors', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'fors' ),
			'menu-2' => esc_html__( 'Secondary', 'fors' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fors_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'fors_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */


function fors_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fors_content_width', 640 );
}
add_action( 'after_setup_theme', 'fors_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function fors_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'fors' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'fors' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fors_widgets_init' );

/* Отключить админ-панель для всех пользователей */
show_admin_bar(false);

/**
 * Enqueue scripts and styles.
 */
function fors_scripts() {
	wp_enqueue_style( 'uikit', get_template_directory_uri() . '/css/uikit.min.css?201912041', array());
	// wp_enqueue_style( 'micromodal', get_template_directory_uri() . '/css/micromodal.css', array());
	// wp_enqueue_style( 'linearicons', get_template_directory_uri() . '/css/linearicons.min.css', array());

	wp_enqueue_style( 'woocommerce-mod', get_template_directory_uri() . '/css/woocommerce.css', array());
	wp_enqueue_style( 'woocommerce-layout-mod', get_template_directory_uri() . '/css/woocommerce-layout.css', array());
	// wp_enqueue_style( 'woocommerce-smallscreen-mod', get_template_directory_uri() . '/css/woocommerce-smallscreen.css', array());

	wp_enqueue_style( 'fors-style', get_stylesheet_uri() );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css?20200303', array());


//	wp_enqueue_script( 'fors-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20191010', true ); // todo what for?

	// wp_enqueue_script( 'fors-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20191010', true ); // to do what for?

	wp_enqueue_script( 'uikit', get_template_directory_uri() . '/js/uikit.min.js', array(), '20191010', true );
	wp_enqueue_script( 'uikit-icons', get_template_directory_uri() . '/js/uikit-icons.min.js', array(), '20191010', true );

	// wp_enqueue_script( 'micromodal', get_template_directory_uri() . '/js/micromodal.min.js', array(), '20191010', true );

	wp_enqueue_script( 'scrollmagic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array(), '20191010', true );
	// wp_enqueue_script( 'debug.addIndicators', get_template_directory_uri() . '/js/debug.addIndicators.min.js', array(), '20191010', true );
	wp_enqueue_script( 'animation.gsap', get_template_directory_uri() . '/js/animation.gsap.min.js', array(), '20191010', true );
	wp_enqueue_script( 'TweenLite', get_template_directory_uri() . '/js/TweenLite.min.js', array(), '20191010', true );
	wp_enqueue_script( 'TimelineLite', get_template_directory_uri() . '/js/TimelineMax.min.js', array(), '20191010', true );
	wp_enqueue_script( 'CSSPlugin', get_template_directory_uri() . '/js/CSSPlugin.min.js', array(), '20191010', true );
	wp_enqueue_script( 'ScrollToPlugin', get_template_directory_uri() . '/js/ScrollToPlugin.min.js', array(), '20191010', true );
	wp_enqueue_script( 'CustomEase', get_template_directory_uri() . '/js/CustomEase.min.js', array(), '20191010', true );



	// wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '20191010', true );
	wp_enqueue_script( 'js', get_template_directory_uri() . '/js/js.js', array(), '20200303', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fors_scripts' );


add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	wp_dequeue_style( 'wp-block-library' );
	 wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wp-block-library-css' );
	wp_dequeue_style( 'wc-block-style-css' );
	wp_dequeue_style( 'wc-block-style' ); // WooCommerce
	wp_deregister_style( 'woocommerce_one_page_shopping_tiptip_styles-css' ); //

	if ( class_exists( 'woocommerce' ) ) {
	        wp_dequeue_style( 'select2' );
	        wp_deregister_style( 'select2' );

	        wp_dequeue_script( 'select2');
	        wp_deregister_script('select2');

	    }

	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function isa_remove_jquery_migrate( &$scripts ) {
 if( !is_admin() ) {
 $scripts->remove( 'jquery' );
 $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
 }
}
add_filter( 'wp_default_scripts', 'isa_remove_jquery_migrate' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//ZRX top block
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

// add_action( 'woocommerce_single_product_summary_mod', 'woocommerce_template_single_title', 4 );
add_action( 'woocommerce_single_product_summary_mod', 'woocommerce_template_single_excerpt', 10 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary_bottom', 'woocommerce_template_single_price', 1 );

//add_action( 'woocommerce_single_product_summary_bottom', 'woocommerce_template_single_price ', 10 );
// add_action( 'woocommerce_single_product_summary_bottom', array( $this, 'product_header_summary' ), 10 );
add_action( 'woocommerce_single_product_summary_bottom', 'woocommerce_template_single_add_to_cart', 30 );

// Remove the product description Title
add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
function remove_product_description_heading() {
 return '';
}


add_action( 'after_setup_theme', 'remove_pgz_theme_support', 100 );
function remove_pgz_theme_support() {
remove_theme_support( 'wc-product-gallery-zoom' );
remove_theme_support( 'wc-product-gallery-lightbox' );
}

// Theme Settings
locate_template( '/inc/theme-settings/options.php', true );

add_filter( 'woocommerce_terms_is_checked_default', '__return_true' );

if ( ! function_exists( 'woocommerce_form_field' ) ) {

	/**
	 * Outputs a checkout/address form field.
	 *
	 * @param string $key Key.
	 * @param mixed  $args Arguments.
	 * @param string $value (default: null).
	 * @return string
	 */
	function woocommerce_form_field( $key, $args, $value = null ) {
		$defaults = array(
			'type'              => 'text',
			'label'             => '',
			'description'       => '',
			'placeholder'       => '',
			'maxlength'         => false,
			'required'          => false,
			'autocomplete'      => false,
			'id'                => $key,
			'class'             => array(),
			'label_class'       => array(),
			'input_class'       => array(),
			'return'            => false,
			'options'           => array(),
			'custom_attributes' => array(),
			'validate'          => array(),
			'default'           => '',
			'autofocus'         => '',
			'priority'          => '',
		);

		$args = wp_parse_args( $args, $defaults );
		$args = apply_filters( 'woocommerce_form_field_args', $args, $key, $value );

		if ( $args['required'] ) {
			$args['class'][] = 'validate-required';
			$required        = '&nbsp;<abbr class="required" title="' . esc_attr__( 'required', 'woocommerce' ) . '">*</abbr>';
		} else {
			$required = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'woocommerce' ) . ')</span>';
		}

		if ( is_string( $args['label_class'] ) ) {
			$args['label_class'] = array( $args['label_class'] );
		}

		if ( is_null( $value ) ) {
			$value = $args['default'];
		}

		// Custom attribute handling.
		$custom_attributes         = array();
		$args['custom_attributes'] = array_filter( (array) $args['custom_attributes'], 'strlen' );

		if ( $args['maxlength'] ) {
			$args['custom_attributes']['maxlength'] = absint( $args['maxlength'] );
		}

		if ( ! empty( $args['autocomplete'] ) ) {
			$args['custom_attributes']['autocomplete'] = $args['autocomplete'];
		}

		if ( true === $args['autofocus'] ) {
			$args['custom_attributes']['autofocus'] = 'autofocus';
		}

		if ( $args['description'] ) {
			$args['custom_attributes']['aria-describedby'] = $args['id'] . '-description';
		}

		if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
			foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
				$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
			}
		}

		if ( ! empty( $args['validate'] ) ) {
			foreach ( $args['validate'] as $validate ) {
				$args['class'][] = 'validate-' . $validate;
			}
		}

		$field           = '';
		$label_id        = $args['id'];
		$sort            = $args['priority'] ? $args['priority'] : '';
		$field_container = '<div class="form-row-mod %1$s" id="%2$s" data-priority="' . esc_attr( $sort ) . '">%3$s</div>';

		switch ( $args['type'] ) {
			case 'country':
				$countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

				if ( 1 === count( $countries ) ) {

					$field .= '<strong>' . current( array_values( $countries ) ) . '</strong>';

					$field .= '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . current( array_keys( $countries ) ) . '" ' . implode( ' ', $custom_attributes ) . ' class="country_to_state" readonly="readonly" />';

				} else {

					$field = '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="country_to_state country_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . '><option value="">' . esc_html__( 'Select a country&hellip;', 'woocommerce' ) . '</option>';

					foreach ( $countries as $ckey => $cvalue ) {
						$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
					}

					$field .= '</select>';

					$field .= '<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__( 'Update country', 'woocommerce' ) . '">' . esc_html__( 'Update country', 'woocommerce' ) . '</button></noscript>';

				}

				break;
			case 'state':
				/* Get country this state field is representing */
				$for_country = isset( $args['country'] ) ? $args['country'] : WC()->checkout->get_value( 'billing_state' === $key ? 'billing_country' : 'shipping_country' );
				$states      = WC()->countries->get_states( $for_country );

				if ( is_array( $states ) && empty( $states ) ) {

					$field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';

					$field .= '<input type="hidden" class="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="" ' . implode( ' ', $custom_attributes ) . ' placeholder="' . esc_attr( $args['placeholder'] ) . '" readonly="readonly" />';

				} elseif ( ! is_null( $for_country ) && is_array( $states ) ) {

					$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="state_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ? $args['placeholder'] : esc_html__( 'Select an option&hellip;', 'woocommerce' ) ) . '">
						<option value="">' . esc_html__( 'Select an option&hellip;', 'woocommerce' ) . '</option>';

					foreach ( $states as $ckey => $cvalue ) {
						$field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
					}

					$field .= '</select>';

				} else {

					$field .= '<input type="text" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $value ) . '"  placeholder="' . esc_attr( $args['placeholder'] ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

				}

				break;
			case 'textarea':
				$field .= '<textarea name="' . esc_attr( $key ) . '" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="2"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' cols="5"' : '' ) . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $value ) . '</textarea>';

				break;
			case 'checkbox':
				$field = '<label class="checkbox ' . implode( ' ', $args['label_class'] ) . '" ' . implode( ' ', $custom_attributes ) . '>
						<input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="1" ' . checked( $value, 1, false ) . ' /> ' . $args['label'] . $required . '</label>';

				break;
			case 'text':
			case 'password':
			case 'datetime':
			case 'datetime-local':
			case 'date':
			case 'month':
			case 'time':
			case 'week':
			case 'number':
			case 'email':
			case 'url':
			case 'tel':
				$field .= '<input type="' . esc_attr( $args['type'] ) . '" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '"  value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

				break;
			case 'select':
				$field   = '';
				$options = '';

				if ( ! empty( $args['options'] ) ) {
					foreach ( $args['options'] as $option_key => $option_text ) {
						if ( '' === $option_key ) {
							// If we have a blank option, select2 needs a placeholder.
							if ( empty( $args['placeholder'] ) ) {
								$args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', 'woocommerce' );
							}
							$custom_attributes[] = 'data-allow_clear="true"';
						}
						$options .= '<option value="' . esc_attr( $option_key ) . '" ' . selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) . '</option>';
					}

					$field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
							' . $options . '
						</select>';
				}

				break;
			case 'radio':
				$label_id .= '_' . current( array_keys( $args['options'] ) );

				if ( ! empty( $args['options'] ) ) {
					foreach ( $args['options'] as $option_key => $option_text ) {
						$field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" ' . implode( ' ', $custom_attributes ) . ' id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />';
						$field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="radio ' . implode( ' ', $args['label_class'] ) . '">' . $option_text . '</label>';
					}
				}

				break;
		}

		if ( ! empty( $field ) ) {
			$field_html = '';

			if ( $args['label'] && 'checkbox' !== $args['type'] ) {
				$field_html .= '<label for="' . esc_attr( $label_id ) . '" class="' . esc_attr( implode( ' ', $args['label_class'] ) ) . '">' . $args['label'] . $required . '</label>';
			}

			$field_html .= '<span class="woocommerce-input-wrapper">' . $field;

			if ( $args['description'] ) {
				$field_html .= '<span class="description" id="' . esc_attr( $args['id'] ) . '-description" aria-hidden="true">' . wp_kses_post( $args['description'] ) . '</span>';
			}

			$field_html .= '</span>';

			$container_class = esc_attr( implode( ' ', $args['class'] ) );
			$container_id    = esc_attr( $args['id'] ) . '_field';
			$field           = sprintf( $field_container, $container_class, $container_id, $field_html );
		}

		/**
		 * Filter by type.
		 */
		$field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value );

		/**
		 * General filter on form fields.
		 *
		 * @since 3.4.0
		 */
		$field = apply_filters( 'woocommerce_form_field', $field, $key, $args, $value );

		if ( $args['return'] ) {
			return $field;
		} else {
			echo $field; // WPCS: XSS ok.
		}
	}
}


/*
 * Добавляем часть формы к фрагменту
 */
// add_filter( 'woocommerce_update_order_review_fragments', 'awoohc_add_update_form_billing', 99 );
function awoohc_add_update_form_billing( $fragments ) {

	$checkout = WC()->checkout();
	ob_start();

	echo '<div class="woocommerce-billing-fields__field-wrapper uk-grid">';

	$fields = $checkout->get_checkout_fields( 'billing' );
	foreach ( $fields as $key => $field ) {
		if ( isset( $field['country_field'], $fields[ $field['country_field'] ] ) ) {
			$field['country'] = $checkout->get_value( $field['country_field'] );
		}
		woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
	}

	echo '</div>';



	$art_add_update_form_billing              = ob_get_clean();
	$fragments['.woocommerce-billing-fields'] = $art_add_update_form_billing;

	return $fragments;
}

/*
 * Убираем поля для конкретного способа доставки
 */
// add_filter( 'woocommerce_checkout_fields', 'awoohc_override_checkout_fields' );
function awoohc_override_checkout_fields( $fields ) {
   // получаем выбранные метод доставки
   $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
   // проверяем текущий метод и убираем не ненужные поля
   if ( 'local_pickup:2' === $chosen_methods[0] ) {
      unset( $fields['billing']['billing_company'] );
      unset( $fields['billing']['billing_address_1'] );
      unset( $fields['billing']['billing_address_2'] );
      unset( $fields['billing']['billing_city'] );
      unset( $fields['billing']['billing_postcode'] );
      unset( $fields['billing']['billing_country'] );
      unset( $fields['billing']['billing_state'] );
      // unset( $fields['billing']['billing_phone'] );
      // unset( $fields['billing']['billing_email'] );
   }

   return $fields;
}


// add_action( 'wp_footer', 'awoohc_add_script_update_shipping_method' );
function awoohc_add_script_update_shipping_method() {
	if ( is_checkout() ) {
		?>
<!--Выполняем обновление полей при переключении доставки-->
		<script>
            jQuery(document).ready(function ($) {

                $(document.body).on('updated_checkout updated_shipping_method', function (event, xhr, data) {
                    $('input[name^="shipping_method"]').on('change', function () {
                        $('.woocommerce-billing-fields__field-wrapper').block({
                            message: null,
                            overlayCSS: {
                                background: '#fff',
                                'z-index': 1000000,
                                opacity: 0.3
                            }
                        });
                    });
                    var first_name = $('#billing_first_name').val(),
                        last_name = $('#billing_last_name').val(),
                        phone = $('#billing_phone').val(),
                        email = $('#billing_email').val();

                    $(".woocommerce-billing-fields__field-wrapper").html(xhr.fragments[".woocommerce-billing-fields"]);
                    $(".woocommerce-billing-fields__field-wrapper").find('input[name="billing_first_name"]').val(first_name);
                    $(".woocommerce-billing-fields__field-wrapper").find('input[name="billing_last_name"]').val(last_name);
                    $(".woocommerce-billing-fields__field-wrapper").find('input[name="billing_phone"]').val(phone);
                    $(".woocommerce-billing-fields__field-wrapper").find('input[name="billing_email"]').val(email);
                    $('.woocommerce-billing-fields__field-wrapper').unblock();
                });
            });

		</script>
		<?php
	}
}



// TEST CHECKOUT MOD


remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
add_action( 'woocommerce_checkout_billing', 'woocommerce_order_review', 20 );


// MENU ATTRS

// UK SCROLL MENU LINKS
add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
    if ( $item->classes[0] === 'product-scroll' ) {
        //$atts['uk-scroll'] = 'offset: 300; duration: 200';
    }

    return $atts;
}, 10, 3 );
add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
    if ( $item->classes[0] === 'feedback-scroll' ) {
        $atts['uk-scroll'] = 'offset: 100; duration: 300';
    }

    return $atts;
}, 10, 3 );
add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
    if ( $item->classes[0] === 'payment-scroll' ) {
        $atts['uk-scroll'] = 'offset: 100; duration: 300';
    }

    return $atts;
}, 10, 3 );


// fix checkout error "enter address"
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
  unset($fields['billing']['billing_country']);  //удаляем! тут хранится значение страны оплаты
  unset($fields['shipping']['shipping_country']); ////удаляем! тут хранится значение страны доставки

  return $fields;
}


// IMAGES

// function shapeSpace_customize_image_sizes($sizes) {
	// unset($sizes['thumbnail']);
	// unset($sizes['medium']);
// 	return $sizes;
// }
// add_filter('intermediate_image_sizes_advanced', 'shapeSpace_customize_image_sizes');

// add_image_size( 'medium', 400, 0 );
// add_image_size( 'homepage-thumb size', 220, 180 );

function aw_custom_declare_custom_image_responsive_sizes($attr, $attachment, $size) {
  // Full width header images
  if ($size === 'full') {
    // $attr['sizes'] = '(min-width: 668px) 667px';
    $attr['sizes'] = '(max-width: 500px) 400px, (max-width: 800px) 667px, 1000px';
  }
  return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'aw_custom_declare_custom_image_responsive_sizes', 10 , 3);



function shapeSpace_customize_image_sizes($sizes) {
	// unset($sizes['thumbnail']);
	// unset($sizes['medium']);
	unset($sizes['medium_large']);
	// unset($sizes['large']);
	return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'shapeSpace_customize_image_sizes');