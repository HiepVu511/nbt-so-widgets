<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              netbaseteam.com
 * @since             1.0.0
 * @package           Nbt_So_Widgets
 *
 * @wordpress-plugin
 * Plugin Name:       Netbase Widgets For SiteOrigin
 * Plugin URI:        netbaseteam.com
 * Description:       Widgets made for SiteOrigin Page Builder by Netbaseteam.com.
 * Version:           1.0.0
 * Author:            netbaseteam
 * Author URI:        netbaseteam.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nbt-so-widgets
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists( 'NBT_SiteOrigin_Widgets' )) {
	class NBT_SiteOrigin_Widgets {
		private static $instance = null;

		public static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		private function __construct() {
			$this->define_constants();
			$this->includes();
			$this->hooks();

			add_action( 'init', array($this, 'load_plugin_textdomain') );
		}

		private function define_constants() {
			// Plugin Version
			if ( !defined('NBTSOW_VERSION') ) {
				define('NBTSOW_VERSION', '1.0');
			}

			// Plugin Folder Path
			if ( !defined('NBTSOW_PLUGIN_DIR') ) {
				define('NBTSOW_PLUGIN_DIR', plugin_dir_path(__FILE__));
			}

			//Plugin Folder URL
			if ( !defined('NBTSOW_PLUGIN_URL') ) {
				define('NBTSOW_PLUGIN_URL', plugin_dir_url(__FILE__));
			}

			//Plugin Root File
			if ( !defined('NBTSOW_PLUGIN_FILE') ) {
				define('NBTSOW_PLUGIN_FILE', __FILE__);
			}
		}

		public function load_plugin_textdomain() {
			load_plugin_textdomain('nbtsow', false, dirname(plugin_basename( __FILE__ )) . '/languages/');
		}

		private function includes() {
			require_once NBTSOW_PLUGIN_DIR . 'includes/class-nbtsow-setup.php';
			require_once NBTSOW_PLUGIN_DIR . 'includes/class-accordion-walker.php';
		}

		private function hooks() {
            add_action('wp_enqueue_scripts', array($this, 'load_frontend_scripts'), 10);
        }

		public function load_frontend_scripts() {
			wp_register_style('nbt-so-styles', NBTSOW_PLUGIN_URL . 'assets/nbt-so-style.min.css', array(), NBTSOW_VERSION);
            wp_enqueue_style('nbt-so-styles');

			wp_register_script('nbt-so-scripts', NBTSOW_PLUGIN_URL . 'assets/app.min.js', array('jquery'), NBTSOW_VERSION, true);
			wp_enqueue_script('nbt-so-scripts');
		}
	}
}

NBT_SiteOrigin_Widgets::get_instance();
