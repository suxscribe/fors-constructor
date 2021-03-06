<?php
/**
 * Template name: CONTENT
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fors
 */

get_header();
?>

	<!-- <div id="primary" class="content-area"> -->
		<main id="main" class="main__content site-main uk-container">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	<!-- </div> --><!-- #primary -->

<?php
// get_sidebar();
get_footer();
