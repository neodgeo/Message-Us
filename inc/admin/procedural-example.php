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
                'title' => __( 'Configuration', 'wedevs' ),
                'desc' => __( 'Entrez votre nom de user facebook (celui s\'affichant dans le racourci de votre page)', 'wedevs' ),
                'tab_label' => __( 'MessageUs', 'wedevs' ),
            )
        );

        $fields = array(
            'wedevs_basics' => array(
                array(
                    'name' => 'title',
                    'label' => __( 'Titre de la popup', 'wedevs' ),
                    'desc' => __( 'Choisissez un titre pour capter l\'attention de vos visiteurs', 'wedevs' ),
                    'desc_type' => 'inline',
                    'type' => 'text',
                    'default' => 'Title'
                ),
                array(
                    'desc' => __( 'HTML description', 'wedevs' ),
                    'type' => 'html'
                ),
                array(
                    'name' => 'message',
                    'label' => __( 'Message', 'wedevs' ),
                    'desc' => __( 'Ecrivez ici la raison pour laquelle un visiteur pourrai vous contacter', 'wedevs' ),
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'color1',
                    'label' => __( 'Couleur du fond', 'wedevs' ),
                    'desc' => __( 'choisissez la couleur de fond', 'wedevs' ),
                    'desc_type' => 'inline',
                    'type' => 'text',
                    'default' => '#000000'
                ),
                array(
                    'name' => 'color2',
                    'label' => __( 'Couleur du texte', 'wedevs' ),
                    'desc' => __( 'choisissez la couleur du texte', 'wedevs' ),
                    'desc_type' => 'inline',
                    'type' => 'text',
                    'default' => '#ffffff'
                ),
                array(
                    'name' => 'radio',
                    'label' => __( 'Radio Button', 'wedevs' ),
                    'desc' => __( 'A radio button', 'wedevs' ),
                    'type' => 'radio',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'multicheck',
                    'label' => __( 'Multile checkbox', 'wedevs' ),
                    'desc' => __( 'Multi checkbox description', 'wedevs' ),
                    'type' => 'multicheck',
                    'options' => array(
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    )
                ),
                array(
                    'name' => 'selectbox',
                    'label' => __( 'A Dropdown', 'wedevs' ),
                    'desc' => __( 'Dropdown description', 'wedevs' ),
                    'type' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'password',
                    'label' => __( 'Password', 'wedevs' ),
                    'desc' => __( 'Password description', 'wedevs' ),
                    'type' => 'password',
                    'default' => ''
                ),
                array(
                    'name' => 'file',
                    'label' => __( 'File', 'wedevs' ),
                    'desc' => __( 'File description', 'wedevs' ),
                    'type' => 'file',
                    'default' => ''
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