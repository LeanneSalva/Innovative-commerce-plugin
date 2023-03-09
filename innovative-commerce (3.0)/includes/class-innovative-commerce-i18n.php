<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://github.com/LeanneSalva
 * @since      1.0.0
 *
 * @package    Innovative_Commerce
 * @subpackage Innovative_Commerce/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Innovative_Commerce
 * @subpackage Innovative_Commerce/includes
 * @author     Leanne R Salva <lrsg0706@gmail.com>
 */
class Innovative_Commerce_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'innovative-commerce',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
