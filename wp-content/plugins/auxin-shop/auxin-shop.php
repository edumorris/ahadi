<?php
/**
 * Shop maker for themes with auxin framework
 *
 * 
 * @package    
 * @license    LICENSE.txt
 * @author     
 * @link       https://bitbucket.org/averta/
 * @copyright  (c) 2010-2018 
 *
 * Plugin Name:       Phlox Shop
 * Plugin URI:        http://averta.net/phlox/
 * Description:       Make a shop in easiest way using phlox theme.
 * Version:           1.2.5
 * Author:            averta
 * Author URI:        http://averta.net
 * Text Domain:       auxin-shop
 * License URI:       LICENSE.txt
 * Domain Path:       /languages
 * Tested up to:      4.9.8
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die('No Naughty Business Please !');
}

// Abort loading if WordPress is upgrading
if ( defined( 'WP_INSTALLING' ) && WP_INSTALLING ) {
    return;
}


/**
 * Check plugin requirements
 * ===========================================================================*/

// Don't check the requirements if it's frontend or AUXIN_DUBUG set to false
if( is_admin() || false === get_transient( 'auxshp_plugin_requirements_check' ) ){

    if( ! class_exists('Auxin_Plugin_Requirements') ){
        require_once( plugin_dir_path( __FILE__ ) . 'includes/classes/class-auxin-plugin-requirements.php' );
    }

    $plugin_requirements = new Auxin_Plugin_Requirements();
    $plugin_requirements->requirements = array(

        'plugins' => array(
            array(
                'name'               => __('Phlox Core Elements', 'auxin-shop'), // The plugin name.
                'basename'           => 'auxin-elements/auxin-elements.php', // The plugin basename (typically the folder name and main php file)
                'required'           => true,    // If true, the user will be notified with a notice to install the plugin.
                'version'            => '2.2.15', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'dependency'         => true,    // If true, and the plugin is activated, the plugin will be loaded before as a dependeny.
                'is_callable'        => 'AUXELS'       // If set, this callable will be be checked for availability to determine if a plugin is active.
            ),
            array(
                'name'               => __('WooCommerce', 'auxin-shop'), // The plugin name.
                'basename'           => 'woocommerce/woocommerce.php', // The plugin basename (typically the folder name and main php file)
                'required'           => true,    // If true, the user will be notified with a notice to install the plugin.
                'version'            => '3.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'dependency'         => true,    // If true, and the plugin is activated, the plugin will be loaded before as a dependeny.
                'is_callable'        => ''       // If set, this callable will be be checked for availability to determine if a plugin is active.
            )
        ),

        'themes' => array(
            array(
                'name'                 => __('Phlox Pro', 'auxin-shop'), // The theme name.
                'id'                   => 'phlox-pro', // The theme id name.
                'version'              => '5.0.5', // E.g. 1.0.0. If set, the active theme must be this version or higher.
                'is_callable'          => '', // If set, this callable will be be checked for availability to determine if a theme is active.
                'theme_requires_const' => '',
                'file_required'        => array( get_template_directory() . '/auxin-content/init/dependency.php', get_template_directory() . '/auxin-content/init/constant.php' )
            )
        ),

        'php' => array(
            'version' => '5.4.0'    // The minimum PHP version for this plugin, otherwise, throw a notice
        ),

        'config' => array(
            'plugin_name'     =>  __('Phlox Shop', 'auxin-shop'), // Current plugin name.
            'plugin_basename' => plugin_basename( __FILE__ ),
            'plugin_dir_path' => plugin_dir_path( __FILE__ ),
            'debug'           => false
        )

    );

    // Check the requirements
    $validation = $plugin_requirements->validate();

    // If the requirements were not met, dont initialize the plugin
    if( true !== $validation ){
        return;
    // cache the validation result and skip the extra checks on frontend for cache period
    } else {
        set_transient( 'auxshp_plugin_requirements_check', true, 15 * MINUTE_IN_SECONDS );
    }
}


/*----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'includes/define.php'     );
require_once( plugin_dir_path( __FILE__ ) . 'public/class-auxshp.php' );

// Register hooks that are fired when the plugin is activated or deactivated.
register_activation_hook  ( __FILE__, array( 'AUXSHP', 'activate'   ) );
register_deactivation_hook( __FILE__, array( 'AUXSHP', 'deactivate' ) );

/*----------------------------------------------------------------------------*/
