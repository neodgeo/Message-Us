<?php
/**
 * @package Message Us
 * @version 0.8
 */
/*
Plugin Name: Message Us
Plugin URI: 
Description: Send us a message on fb
Author: Laurent MAXIMIN
Version: 0.8
Author URI: http://maximin.etudiant-eemi.com 
Text Domain: wp_messageus_op
*/

defined( 'ABSPATH' )
 or die ( 'No direct load !' );

define( 'OP_DIR', plugin_dir_path(__FILE__) );

define( 'OP_URL', plugin_dir_url(__FILE__) );

if (is_admin()){
	require_once OP_DIR . '/inc/admin/procedural-example.php';
	require_once OP_DIR . '/library/class.settings-api.php';
}

function wp_messageus_op_init() {
    load_plugin_textdomain( 
    	'wp_messageus_op', 
    	false, 
    	dirname( plugin_basename( __FILE__ ) ) . '/languages' 
    );
}

add_action( 'plugins_loaded', 'wp_messageus_op_init' );

function MessageUs() {
	require_once OP_DIR . '/popup/popup_message_us.php';
	echo "<div class='messageus'><a href='https://m.me/Neo.lrt.mxn'>contact moi sur fb</a></div>";
}

add_action('init', 'MessageUs');
