<?php
/**
 * This page shows the procedural or functional example
 *
 * OOP way example is given on the "settings-api.php" file.
 *
 * @version 0.4.2
 * @author Tareq Hasan <tareq@weDevs.com>
 * @author Amaury Balmer <amaury@beapi.fr>
 * @link https://github.com/herewithme/wordpress-settings-api-class
 */


/**
 * Registers settings section and fields
 */
if ( !function_exists( 'wedevs_admin_init' ) ):
    function wedevs_admin_init() {

        $sections = array(
            array(
                'id' => 'wedevs_basics',
                'title' => __( 'Settings', 'wp_messageus_op' ),
                'desc' => __( 'Configure your plugin message us', 'wp_messageus_op' ),
                'tab_label' => __( 'MessageUs', 'wp_messageus_op' ),
            )
        );

        $fields = array(
            'wedevs_basics' => array(
                array(
                    'name' => 'user',
                    'label' => __( 'User id', 'wp_messageus_op' ),
                    'desc' => __( 'You can find your user id in your facebook\'s settings', 'wp_messageus_op' ),
                    'desc_type' => 'inline',
                    'type' => 'text',
                    'default' => 'Neo.lrt.mxn'
                ),
                array(
                    'name' => 'title',
                    'label' => __( 'Title of your popup', 'wp_messageus_op' ),
                    'desc' => __( 'Choose a good title to focus your visitors on it', 'wp_messageus_op' ),
                    'desc_type' => 'inline',
                    'type' => 'text',
                    'default' => 'Title'
                ),
                array(
                    'desc' => __( 'HTML description', 'wp_messageus_op' ),
                    'type' => 'html'
                ),
                array(
                    'name' => 'message',
                    'label' => __( 'Message', 'wp_messageus_op' ),
                    'desc' => __( 'Write here the reason why a visitor should send you a message', 'wp_messageus_op' ),
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'color1',
                    'label' => __( 'Background color', 'wp_messageus_op' ),
                    'desc' => __( 'Choose your popup background color', 'wp_messageus_op' ),
                    'desc_type' => 'inline',
                    'type' => 'text',
                    'default' => '#000000'
                ),
                array(
                    'name' => 'color2',
                    'label' => __( 'Font color', 'wp_messageus_op' ),
                    'desc' => __( 'Choose your font color', 'wp_messageus_op' ),
                    'desc_type' => 'inline',
                    'type' => 'text',
                    'default' => '#ffffff'
                ),
            )
        );
        
        global $my_settings_api;
        $my_settings_api = new WeDevs_Settings_API;

        //set sections and fields
        $my_settings_api->set_sections( $sections );
        $my_settings_api->set_fields( $fields );

        //initialize them
        $my_settings_api->admin_init();
    }
endif;
add_action( 'admin_init', 'wedevs_admin_init' );

if ( !function_exists( 'wedevs_admin_menu' ) ):
    /**
     * Register the plugin page
     */
    function wedevs_admin_menu() {
        $messageus = add_options_page( 'Message Us', 'Message Us', 'manage_options', 'segs_api_test', 'wedevs_plugin_page' );
        function load_admin_scripts( ) {
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script('myplugin-script', plugins_url('js/script.js', plugin_basename(__FILE__)), array('wp-color-picker'), false, true );
            }
        // méthode standard
        add_action( 'admin_print_scripts-'.$messageus, 'load_admin_scripts');

    }
endif;
add_action( 'admin_menu', 'wedevs_admin_menu' );

/**
 * Display the plugin settings options page
 */
if ( !function_exists( 'wedevs_plugin_page' ) ):
    function wedevs_plugin_page() {
        global $my_settings_api;
        
        echo '<div id="icon-options-general" class="icon32"><br /></div>';
        echo '<div class="wrap">';
        settings_errors();

        $my_settings_api->show_navigation();
        $my_settings_api->show_forms();

        echo '</div>';
    }
endif;
function my_get_option( $option, $section, $default = '' ) {
 
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) {
    return $options[$option];
    }
 
    return $default;
}