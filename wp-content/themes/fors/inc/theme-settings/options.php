<?php
//Настройки панели администрирования
//Регистрация функции настроек
function theme_settings_init() {
	register_setting( 'theme_settings', 'theme_settings' );
}

// Добавление настроек в меню страницы
function add_settings_page() {
	add_menu_page( __( 'Theme Settings' ), __( 'Theme Settings' ), 'manage_options', 'settings',
		'theme_settings_page' );
}

//Добавление действий
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );

//Начало страницы настроек
function theme_settings_page() {

	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false;
	}

	?>

	<div>
		<table>
			<tr>
				<td>
					<div id="icon-options-general"></div>
				</td>
				<td><h2 id="title">Настройки сайта <?php bloginfo() //your admin panel title ?></h2></td>
				<td>&emsp;&emsp;</td>
				<td><input name="submit" form="sayri" class="button-primary" id="submit" value="Сохранить" type="submit"></td>
			</tr>
		</table>
		<hr>

		<?php
		//вывод сообщения о том, что значение опции сохранено
		if ( false !== $_REQUEST['updated'] ) : ?>
			<div><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php" id="sayri">

			<?php settings_fields( 'theme_settings' ); ?>
			<?php $options = get_option( 'theme_settings' ); ?>

			<table>

				<tr><td>&emsp;&emsp;</td></tr>

				<tr valign="top">
					<th scope="row"><?php _e( 'Phone' ); ?></th>
					<td>
						<input type="text" id="theme_settings[phone]" name="theme_settings[phone]" value="<?php esc_attr_e( $options['phone'] ); ?>" >
					</td>
				</tr>

				<tr>
					<th>&mdash;</th>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'Google Analytics' ); ?></th>
					<td>
						<textarea id="theme_settings[google1]" name="theme_settings[google1]" rows="3"
						cols="60"><?php esc_attr_e( $options['google1'] ); ?></textarea>
					</td>
				</tr>

				<tr><td>&emsp;&emsp;</td></tr>

				<tr valign="top">
					<th scope="row"><?php _e( 'email' ); ?></th>
					<td>
						<input type="text" id="theme_settings[email]" name="theme_settings[email]" value="<?php esc_attr_e( $options['email'] ); ?>" >
					</td>
				</tr>

				<tr><td>&emsp;&emsp;</td></tr>

				<tr valign="top">
					<th scope="row"><?php _e( 'vk' ); ?></th>
					<td>
						<input type="text" id="theme_settings[vk]" name="theme_settings[vk]" value="<?php esc_attr_e( $options['vk'] ); ?>" >

					</td>
				</tr>

				<tr><td>&emsp;&emsp;</td></tr>

				<tr valign="top">
					<th scope="row"><?php _e( 'instagram' ); ?></th>
					<td>
						<input type="text" id="theme_settings[instagram]" name="theme_settings[instagram]" value="<?php esc_attr_e( $options['instagram'] ); ?>" >
					</td>
				</tr>

				<tr><td>&emsp;&emsp;</td></tr>

				<tr valign="top">
					<th scope="row"><?php _e( 'metrika' ); ?></th>
					<td>
						<textarea id="theme_settings[metrika]" name="theme_settings[metrika]" rows="3"
						cols="60"><?php esc_attr_e( $options['metrika'] ); ?></textarea>
					</td>
				</tr>



				<tr><td>&emsp;&emsp;</td></tr>

			</table>
			<p><input name="submit" class="button-primary" id="submit" value="Сохранить" type="submit"></p>
		</form>

	</div>

<? }