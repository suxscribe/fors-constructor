<?php
/**
 * Load and register widgets
 *
 * @package Supro
 */

require_once get_template_directory() . '/inc/widgets/product-sort-by.php';
require_once get_template_directory() . '/inc/widgets/filter-price-list.php';
require_once get_template_directory() . '/inc/widgets/popular-posts.php';
require_once get_template_directory() . '/inc/widgets/socials.php';
require_once get_template_directory() . '/inc/widgets/language-currency.php';

/**
 * Register widgets
 *
 * @since  1.0
 *
 * @return void
 */
if ( ! function_exists( 'supro_register_widgets' ) ) :

	function supro_register_widgets() {
		if ( class_exists( 'WC_Widget' ) ) {
			require_once get_template_directory() . '/inc/widgets/woo-attributes-filter.php';
			require_once get_template_directory() . '/inc/widgets/product-tag.php';
			require_once get_template_directory() . '/inc/widgets/product-cat.php';
			require_once get_template_directory() . '/inc/widgets/widget-layered-nav-filters.php';

			$wc_widgets = array(
				'Supro_Widget_Attributes_Filter',
				'Supro_Widget_Product_Tag_Cloud',
				'Supro_Widget_Product_Cat',
				'Supro_Widget_Layered_Nav_Filters'
			);

			foreach ( $wc_widgets as $widget ) {
				if ( class_exists( $widget ) ) {
					register_widget( $widget );
				}
			}
		}

		$widgets = array(
			'Supro_Product_SortBy_Widget',
			'Supro_Price_Filter_List_Widget',
			'Supro_PopularPost_Widget',
			'Supro_Social_Links_Widget',
			'Supro_Language_Currency_Widget'
		);

		foreach ( $widgets as $widget ) {
			if ( class_exists( $widget ) ) {
				register_widget( $widget );
			}
		}
	}

	add_action( 'widgets_init', 'supro_register_widgets' );

endif;

/**
 * Change markup of archive and category widget to include .count for post count
 *
 * @param string $output
 *
 * @return string
 */
if ( ! function_exists( 'supro_widget_archive_count' ) ) :

	function supro_widget_archive_count( $output ) {
		$output = preg_replace( '|\((\d+)\)|', '<span class="count">(\\1)</span>', $output );

		return $output;
	}

	add_filter( 'wp_list_categories', 'supro_widget_archive_count' );
	add_filter( 'get_archives_link', 'supro_widget_archive_count' );

endif;
