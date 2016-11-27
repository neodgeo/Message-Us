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
*/

defined( 'ABSPATH' )
 or die ( 'No direct load !' );

define( 'OP_DIR', plugin_dir_path(__FILE__) );

define( 'OP_URL', plugin_dir_url(__FILE__) );

if (is_admin()){
	require_once OP_DIR . '/inc/admin/procedural-example.php';
	require_once OP_DIR . '/library/class.settings-api.php';
}

function MessageUs() {
	echo "<h2><a href='https://m.me/Neo.lrt.mxn'>contact moi sur fb</a></h2>";
}

add_action('wp_footer', 'MessageUs');
