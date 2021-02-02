<?php
/**
 * Load frontend scripts and styles
 *
 * 
 * @package    
 * @license    LICENSE.txt
 * @author     
 * @link       https://bitbucket.org/averta/
 * @copyright  (c) 2010-2018 
 */

class AUXSHP_Frontend_Assets {


	/**
	 * Construct
	 */
	function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'localize_scripts' ) );
	}

    public function localize_scripts() {
        wp_localize_script( AUXSHP_SLUG .'-shop', 'auxshp', array(
                'ajax_url'          => admin_url( 'admin-ajax.php' ),
                'invalid_required'  => __( 'This is a required field', 'auxin-shop' ),
                'invalid_postcode'  => __( 'Zipcode must be digits', 'auxin-shop' ),
                'invalid_phonenum'  => __( 'Enter a valid phone number', 'auxin-shop' ),
                'invalid_emailadd'  => __( 'Enter a valid email address', 'auxin-shop' )
            )
        );
    }

    public function load_scripts() {

        wp_enqueue_script( AUXSHP_SLUG .'-shop', AUXSHP_PUB_URL . '/assets/js/shop.min.js', array( 'jquery', 'jquery-ui-spinner', 'auxin-scripts' ), AUXSHP_VERSION, true );


        if( current_theme_supports( 'auxin-shop' ) ){
            wp_enqueue_style('auxin-shop' , get_stylesheet_directory_uri() . '/css/shop.css', array('auxin-main'), AUXSHP_VERSION );
        }

        if ( is_checkout() ) { 
            wp_deregister_script( 'wc-checkout' ); 
            wp_enqueue_script( 'wc-checkout', AUXSHP_PUB_URL . '/assets/js/solo/checkout.min.js', array( 'jquery', 'woocommerce', 'wc-country-select', 'wc-address-i18n' ) ); 
 
        }         

    }


}

new AUXSHP_Frontend_Assets();
