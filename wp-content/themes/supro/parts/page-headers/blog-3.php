<?php
$css = '';
$image = supro_get_option( 'blog_page_header_background' );
$parallax = supro_get_option( 'blog_page_header_parallax' );
$text_color = supro_get_option( 'blog_page_header_text_color' );

if ( ! $image ) {
	$css .= ' no-bg';
} else {
	if ( intval( $parallax ) ) {
		$css .= ' parallax';
	}
}

$css .= ' text-' . $text_color;

?>
<div class="page-header blog-page-header layout-3 text-center <?php echo esc_attr( $css ); ?>">
	<div class="feature-image" style="background-image:url( <?php echo esc_url( $image ) ?> );"></div>
	<div class="container">
		<div class="page-header-wrapper">
			<?php
			the_archive_title( '<h1>', '</h1>' );
			supro_get_breadcrumbs();
			?>
		</div>
	</div>
</div>