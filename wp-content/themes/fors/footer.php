<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fors
 */

$options = get_option( 'theme_settings' );

?>

	</div><!-- #content -->

	<footer id="colophon" class="">
		<div class="uk-container">

            <div class="footer-grid ">
                <div class="footer-contacts">
                    <a href="tel:<? echo str_replace([' ', '(', ')', '-'], '', "{$options['phone']}")?>" class="footer-contacts__phone"><?echo "{$options['phone']}";?></a>
                    <a href="mailto:<?echo "{$options['email']}";?>"><?echo "{$options['email']}";?></a></div>
                <div class="footer-socials">
                    <a href="<?echo "{$options['instagram']}";?>" class="header-social social social_instagram" target="_blank"></a>
                    <a href="<?echo "{$options['vk']}";?>" class="header-social social social_vk" target="_blank"></a>
              </div>
            </div>
            <div class="footer-copyright">
                © FORS 2019. <a class="footer-copyright__link" href="/privacy-policy">Политика обработки персональных данных</a>
            </div>

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>
			    <?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<!--MODAL MOBILE MENU-->
<div id="menu" class="uk-modal">
    <div class="uk-modal-dialog uk-modal-dialog-blank">
        <div class="menu-modal-menu">
            <ul class="uk-nav">
                <li class=""><a href="<?php echo esc_url( home_url( '/' ) ) ?>">Главная</a></li>
                <!-- <ul class="menu-modal-products-nav"> -->
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'offcanvas-menu',
                        'menu_class'        => 'uk-nav'
                    ) );
                    ?>
                <!-- </ul> -->
                <!-- <li><a data-menuanchor="info" href="<?php echo esc_url( home_url( '/' ) ) ?>#info">Ценности</a></li> -->
            </ul>
        </div>
        <div class="menu-modal-phone">
            <a href="tel:<? echo str_replace([' ', '(', ')', '-'], '', "{$options['phone']}")?>"><?echo "{$options['phone']}";?></a>
        </div>
        <div class="menu-modal-socials">
            <a uk-icon="facebook" href="<?echo "{$options['vk']}";?>"></a>
            <a uk-icon="instagram" href="<?echo "{$options['instagram']}";?>"></a>

        </div>
    </div>
</div>




<?php wp_footer(); ?>

</body>
</html>
