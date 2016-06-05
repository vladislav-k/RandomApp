<?php
/**
* Plugin Name: Random App
* Plugin URI: http://woopss.com/
* Description: This plugin allows to show random app with links to App Store, Play Store and Windows Store with a shortcode and as widget.
* Version: 1.0
* Author: Vladislav Kovalyov
* Author URI: http://woopss.com/
* Text Domain: random_app
* Domain Path: /languages/
* License: GPLv2
*/

/**
 * Load plugin textdomain.
 */
function random_app_load_text_domain() {
  load_plugin_textdomain( 'random_app', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' ); 
}

add_action( 'plugins_loaded', 'random_app_load_text_domain' );

/*
* Get functions
*/
if ( ! function_exists( 'get_random_app' ) ) {
	require_once(dirname(__FILE__) . '/includes/functions.php');
}

/**
* Init custom post type
*/
if ( ! function_exists( 'random_app_init_post_type' ) ) {
	require_once(dirname(__FILE__) . '/includes/post-type.php');
}

random_app_init_post_type();

/**
* Init widget
*/
if ( ! function_exists( 'random_app_widget_init' ) ) {
	require_once(dirname(__FILE__) . '/includes/widget.php');
}

random_app_widget_init();