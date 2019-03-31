<?php
/**
 * Plugin Name: Night Mode and Font Size Kit for WordPress
 * Plugin URI: https://plugins.themevanilla.com/nmfskit
 * Bitbucket Plugin URI: https://bitbucket.org/devshuvo/nightmode-and-fontsize
 * Description: Night Mode and Font Size Kit is the best solution to switch wordpress website between Night Mode and normal style smoothly to improve the readability of whole site.Font size option will help you increase and decrease your website text size.
 * Author: Devshuvo
 * Text Domain: nmfs
 * Domain Path: /lang/
 * Author URI: https://themevanilla.com
 * Tags: background, brightness, button, color, dark, dark theme, light, mode, night, night mode, protect, reading, switch, text, wordpress plugin
 * Version: 1.0.1
 */

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
* Including Plugin file for security
* Include_once
* 
* @since 1.0.0
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
* Loading Text Domain
* 
*/
add_action('plugins_loaded', 'nmfs_plugin_loaded_action', 10, 2);

function nmfs_plugin_loaded_action() {
	//Internationalization 
	load_plugin_textdomain( 'nmfs', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
	
	//Redux Framework calling
	if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/inc/redux-framework/ReduxCore/framework.php' ) ) {
	    require_once( dirname( __FILE__ ) . '/inc/redux-framework/ReduxCore/framework.php' );
	}

    // Load the plugin options
    if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/inc/nmfs-options-init.php' ) ) {
        require_once dirname( __FILE__ ) . '/inc/nmfs-options-init.php';
    }
}

/**
 *	Enqueue Wooinstant scripts
 *
 */
function nmfs_enqueue_scripts(){
	//Main Stylesheet
	wp_enqueue_style('nmfs-styles', plugin_dir_url( __FILE__ ).'assets/css/nmfs-styles.css' );
	
	//Main JS
	wp_enqueue_script('nmfs-scripts', plugin_dir_url( __FILE__ ).'assets/js/nmfs-scripts.js', array( 'jquery' ), '', true );
}
add_filter( 'wp_enqueue_scripts', 'nmfs_enqueue_scripts', 199 );

/**
 *	Nightmode Functions
 */
require_once( dirname( __FILE__ ) . '/inc/nmfs-functions.php' );

/**
 *	Nightmode Layout
 */
require_once( dirname( __FILE__ ) . '/inc/nmfs-layout.php' );