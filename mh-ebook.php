<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wodevmehedi.com
 * @since             1.0.0
 * @package           Mh_Ebook
 *
 * @wordpress-plugin
 * Plugin Name:       MH e-Book
 * Plugin URI:        https://https://www.fiverr.com/wpdevmehedi
 * Description:       This is an e-book management plugin compatible with elementor , woo-commerce, and WordPress default system
 * Version:           1.0.0
 * Author:            Mehedi Hasan
 * Author URI:        https://wodevmehedi.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mh-ebook
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
define( 'MH_EBOOK_VERSION', '1.0.0' );

define('VITERJS_DEV_MOOD', true);
 add_action( "wp_enqueue_scripts", function(){
    if(defined('VITERJS_DEV_MOOD') && VITERJS_DEV_MOOD){
        add_action( "wp_head", function(){
            ?>
            <script type="module">
                import RefreshRuntime from "http://localhost:3000/@react-refresh"
                RefreshRuntime.injectIntoGlobalHook(window)
                window.$RefreshReg$ = () => {}
                window.$RefreshSig$ = () => (type) => type
                window.vite_plugin_react_preamble_installed = true
            </script>

            <script type="module" crossorigin src="http://localhost:3000/src/main.jsx"></script>
            <?php
        } );
    }else{
        wp_enqueue_style( 'viterjs', plugin_dir_url(__FILE__).'dist/assets/main-m0DGwFy9.css', array(), '1.0.0', 'all' );
        wp_enqueue_script( 'viterjs', plugin_dir_url(__FILE__).'dist/assets/main-7kmqk901.js', array('jquery'), '1.0.0', true );
    }
 } );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mh-ebook-activator.php
 */
function activate_mh_ebook() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mh-ebook-activator.php';
	Mh_Ebook_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mh-ebook-deactivator.php
 */
function deactivate_mh_ebook() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mh-ebook-deactivator.php';
	Mh_Ebook_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mh_ebook' );
register_deactivation_hook( __FILE__, 'deactivate_mh_ebook' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mh-ebook.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mh_ebook() {

	$plugin = new Mh_Ebook();
	$plugin->run();

}
run_mh_ebook();
