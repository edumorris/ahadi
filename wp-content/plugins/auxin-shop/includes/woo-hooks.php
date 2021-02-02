<?php 
/**
 * Changes in WooCommerce without removing or adding things
 * Using WooCommerce hooks
 *
 * 
 * @package    
 * @license    LICENSE.txt
 * @author     
 * @link       https://bitbucket.org/averta/
 * @copyright  (c) 2010-2018 
 */

/**
 * woocommerce_single_product_summary hook.
 *
 * @hooked woocommerce_template_single_title - 5
 * @hooked woocommerce_template_single_rating - 10
 * @hooked woocommerce_template_single_price - 10
 * @hooked woocommerce_template_single_excerpt - 20
 * @hooked woocommerce_template_single_add_to_cart - 30
 * @hooked woocommerce_template_single_meta - 40
 * @hooked woocommerce_template_single_sharing - 50
 */

add_action( 'init', 'auxshp_remove_woo_actions' );

function auxshp_remove_woo_actions() {

    remove_action( 'woocommerce_single_product_summary',        'woocommerce_template_single_rating',                   10 );
    remove_action( 'woocommerce_single_product_summary',        'woocommerce_template_single_meta',                     40 );
    remove_action( 'woocommerce_single_product_summary',        'woocommerce_template_single_sharing',                  50 );
    remove_action( 'woocommerce_after_shop_loop',               'woocommerce_pagination',                               10 );
    remove_action( 'woocommerce_after_shop_loop_item_title',    'woocommerce_template_loop_rating',                     5  );
    remove_action( 'woocommerce_after_shop_loop_item',          'woocommerce_template_loop_add_to_cart'                    );
    remove_action( 'woocommerce_after_shop_loop_item',          'woocommerce_template_loop_product_link_close',         10 );
    remove_action( 'woocommerce_before_shop_loop_item_title',   'woocommerce_template_loop_product_thumbnail',          10 );
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash',                  10 );
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images',                      20 );
    remove_action( 'woocommerce_after_single_product_summary',  'woocommerce_output_product_data_tabs',                 10 );
    remove_action( 'woocommerce_after_single_product_summary',  'woocommerce_output_related_products',                  20 );
    remove_action( 'woocommerce_cart_collaterals',              'woocommerce_cross_sell_display'                           );
    remove_action( 'woocommerce_widget_shopping_cart_buttons',  'woocommerce_widget_shopping_cart_button_view_cart',    10 );
    remove_action( 'woocommerce_widget_shopping_cart_buttons',  'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

}

// Add meta again, after sharing section in single product page
add_action( 'woocommerce_single_product_summary',                 'woocommerce_template_single_meta' ,   60 );
add_action( 'woocommerce_single_product_summary',                 'woocommerce_show_product_sale_flash',  8 );
add_action( 'woocommerce_before_shop_loop_item_title',            'woocommerce_template_loop_product_link_close', 12 );

// Disable description tab heading
add_filter( 'woocommerce_product_description_heading',            '__return_false' );
// Disable additional information tab heading
add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );
// Disable WooCommerce Default styles
add_filter( 'woocommerce_enqueue_styles',                         '__return_false' );


/**
 * Add Subfooter and Subfooter bar to Wocommerce templates
 */

function auxin_shop_display_footer_sidebar() {
    get_sidebar('footer');
}

add_action( 'woocommerce_sidebar', 'auxin_shop_display_footer_sidebar', 10 ); 


/**
 * Display Sales Badge as a Percentage
 */

function auxin_show_sale_percentage( $output, $post, $product ) {

    $custom_sales_badge = auxin_get_option('product_index_custom_sale_badge', '0');

    if ( $product->is_on_sale() &&  auxin_is_true( $custom_sales_badge ) ) {

        if ( $product->is_type( 'simple' ) ) {

            $sale_price    = $product->get_sale_price();
            $regular_price = $product->get_regular_price();
            $sale          = ceil(( ($regular_price - $sale_price) / $regular_price ) * 100);

            if ( !empty( $regular_price ) && !empty( $sale_price ) && $regular_price > $sale_price ) {
                $output = '<span class="auxin-onsale-badge">' . __('Sale ','auxin-shop' ) . $sale . '%</span>';
            }

        } else {
            $output = '<span class="auxin-onsale-badge">' . __('Sale ','auxin-shop' ) . '</span>';
        }

        return $output;

    } else {
        return $output;
    }

}

add_filter( 'woocommerce_sale_flash', 'auxin_show_sale_percentage', 10, 3 );

/**
 * Add Pagination to Woocommerce Loop 
 */

function auxshp_pagination() {
    auxin_the_paginate_nav(
        array( 'css_class' => esc_attr( auxin_get_option('product_index_pagination_skin') ) )
    );
}

add_action( 'woocommerce_after_shop_loop', 'auxshp_pagination', 10 );


/**
 * Change the Size avatar in Review Section
 */
 
function auxshp_review_avatar_size() {
    $size = auxin_get_option( 'product_single_review_avatar_size', '60' );
    return $size;
}

add_filter('woocommerce_review_gravatar_size', 'auxshp_review_avatar_size' );
