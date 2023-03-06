<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://github.com/LeanneSalva
 * @since             1.0.0
 * @package           Innovative_Commerce
 *
 * @wordpress-plugin
 * Plugin Name:       InnovativeCommerceCustomCode
 * Plugin URI:        https://https://InnovativeCommercegroup.com
 * Description:       Plugin that makes asynchronous API calls for retrieving and displaying the current price of bitcoin.
 * Version:           1.0.0
 * Author:            Leanne R Salva
 * Author URI:        https://https://github.com/LeanneSalva
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       innovative-commerce
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'INNOVATIVE_COMMERCE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-innovative-commerce-activator.php
 */
function activate_innovative_commerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-innovative-commerce-activator.php';
	Innovative_Commerce_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-innovative-commerce-deactivator.php
 */
function deactivate_innovative_commerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-innovative-commerce-deactivator.php';
	Innovative_Commerce_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_innovative_commerce' );
register_deactivation_hook( __FILE__, 'deactivate_innovative_commerce' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-innovative-commerce.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_innovative_commerce() {

	$plugin = new Innovative_Commerce();
	$plugin->run();

}
run_innovative_commerce();
