<?php
/**
 * Admin Ajax handlers
 *
 * 
 * @package    
 * @license    LICENSE.txt
 * @author     
 * @link       https://bitbucket.org/averta/
 * @copyright  (c) 2010-2018 
 */

function auxin_advanced_recent_products_ajax_handler() {

    // Check nonce
    if ( ! isset( $_POST['n'] ) || ! wp_verify_nonce( $_POST['n'], 'aux_ajax_filterable_product' ) ) {
        wp_send_json_error( 'Nonce check failed!', 403 );
    }
    
    $args = $_POST['args'];
    $args['cat'] = 'all' === $_POST['term'] ? '' : $_POST['term'];

    add_filter('woocommerce_locate_template', function($template, $template_name, $template_path) {
        if ($template_name == 'loop/rating.php') {
            $template =  AUXSHP_PUB_DIR . '/templates/woocommerce/loop/rating.php';
        }
        return $template;
    }, 20, 3);

    include auxin_get_template_file( $args['template_part_file'], '', $args['extra_template_path'] );

    auxin_advanced_recent_products( $args );
    
    exit();


}

add_action( 'wp_ajax_aux_advacned_recent_product_filter_content', 'auxin_advanced_recent_products_ajax_handler' );
add_action( 'wp_ajax_nopriv_aux_advacned_recent_product_filter_content', 'auxin_advanced_recent_products_ajax_handler' );


function aux_intercept_wc_template($template, $template_name, $template_path) {

    if ($template_name == 'loop/rating.php') {

        $template =  AUXSHP_PUB_DIR . '/templates/woocommerce/loop/rating.php';
    }

    return $template;
}