<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wodevmehedi.com
 * @since      1.0.0
 *
 * @package    Mh_Ebook
 * @subpackage Mh_Ebook/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Mh_Ebook
 * @subpackage Mh_Ebook/includes
 * @author     Mehedi Hasan <wpdevmehedi@gmail.com>
 */
class Mh_Ebook_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mh-ebook',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
