<?php
/**
 * Plugin Name: Library Book Search
 * Description: Most Powerful Library Book Search plugin which helps you to find library books easily and in faster way
 * Version: 1.0
 * Plugin URI: http://www.librarysearchplugin.com/
 * Author: Tatvasoft pvt. ltd.
 * Author URI: http://www.tatvasoftpvtltd.com/
 * Text Domain: library-book-search
 * Domain Path: /languages
 *
 * @package Librarybooksearch
 */

define( 'LBS_PATH', WP_PLUGIN_DIR . '/library-book-search' );
define( 'LBS_CONTROLLERS_PATH', LBS_PATH . '/core/controller' );
define( 'LBS_INCLUDES_PATH', LBS_PATH . '/includes' );

require_once LBS_CONTROLLERS_PATH . '/maincontroller.php';
require_once LBS_INCLUDES_PATH . '/shortcode.php';

global $lbsmaincontroller;
$lbsmaincontroller = new lbsmaincontroller();

register_uninstall_hook( __FILE__, 'lbs_uninstall' );

function lbs_uninstall() {
  // Uninstallation stuff here
    unregister_post_type( 'Book' );
}

?>