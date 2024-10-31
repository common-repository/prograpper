<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://prograpper.com
 * @since             0.0.6
 * @package           Prograpper
 *
 * @wordpress-plugin
 * Plugin Name:       Prograpper
 * Plugin URI:        https://wordpress.org/plugins/prograpper/
 * Description:       Create (android / ios ) App for your WordPress Site, Be close to your audience, and get more traffic.
 * Version:           0.0.6
 * Author:            Prograpper Team
 * Author URI:        http://prograpper.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       prograpper
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-prograpper-activator.php
 */
function activate_prograpper() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-prograpper-activator.php';
	Prograpper_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-prograpper-deactivator.php
 */
function deactivate_prograpper() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-prograpper-deactivator.php';
	Prograpper_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_prograpper' );
register_deactivation_hook( __FILE__, 'deactivate_prograpper' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-prograpper.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_prograpper() {
	$default = array('exclude_categories' => '0','exclude_pages'=>'0');
	if (!is_array(get_option('prograpper_settings'))) {
		add_option('prograpper_settings', $default);
	}
	global $prograpper_options;
	$prograpper_options = get_option('prograpper_settings');
	$plugin = new Prograpper();
	$plugin->run();

}
run_prograpper();
