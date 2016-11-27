<?php
/**
 * @version 1.0
 * @author Laurent Maximin <laurent.maximin@eemi.fr> 
 */
/*
Popup function
*/

function popup_message_us() {

wp_enqueue_script( 'popup_message_us', esc_url( plugins_url( 'js/popup.js', __FILE__ ) ), array(),

'1.0', true );

wp_enqueue_style( 'popup_message_us',  esc_url( plugins_url( 'css/popup.css', __FILE__ ) ), array());

}

add_action( 'wp_enqueue_scripts', 'popup_message_us');

