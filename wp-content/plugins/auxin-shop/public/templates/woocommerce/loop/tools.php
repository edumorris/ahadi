<?php
/**
 * Tools for content loop
 *
 * @package   Auxin Shop
 * @author    averta [averta.net]
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $auxshp_wishlist;

$display_tools = array(
                    'display_add_to_cart' => auxin_get_option( 'product_index_display_add_to_cart'   , '1' ), 
                    'display_share'       => auxin_get_option( 'product_index_display_share'         , '1' ), 
                    'display_wishlist'    => auxin_get_option( 'product_index_display_wishlist'      , '1' )
                );

if ( in_array( '1', $display_tools ) ) {
    // Set wishlist status
    $wishlist_class = 'available-add';
    if ( $auxshp_wishlist->in_wishlist( $product->get_id() ) ) {
        $wishlist_class = 'available-remove';
    }    
    // Extract variable
    extract( $display_tools );
?>

    <div class="loop-tools-wrapper">
        <div class="aux-product-tools">
        <?php
            // Add to cart button
            if ( auxin_is_true( $display_add_to_cart ) ) {

                if( auxin_get_option( 'product_index_ajax_add_to_cart', '0' ) ) {
                    $class = 'button aux-ajax-add-to-cart add_to_cart_button';
                }

                echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-verify_nonce="%s" class="%s"><i class="aux-ico auxicon-handbag"></i> %s</a>',
                        esc_url( $product->add_to_cart_url() ),
                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                        esc_attr( $product->get_id() ),
                        esc_attr( $product->get_sku() ),
                        esc_attr( wp_create_nonce( 'aux_add_to_cart-' . $product->get_id() ) ),
                        esc_attr( isset( $class ) ? $class : 'button add_to_cart_button' ),
                        esc_html( $product->add_to_cart_text() )
                    ),
                $product );
            }
            //Add wishlist button
            if ( auxin_is_true( $display_wishlist ) ) {
        ?>
                <div class="auxshp-wishlist-wrapper">
                    <span class="auxshp-wishlist <?php echo $wishlist_class; ?>" data-auxshp-product_id="<?php echo $product->get_id(); ?>" data-auxshp-verify_nonce="<?php echo wp_create_nonce( 'remove_wishlist-' . $product->get_id() ); ?>">
                        <span class="auxshp-sw-icon auxicon-heart-2 auxshp-wishlist-icon"></span>
                    </span>
                </div>
        <?php
            }
            // Add share button
            if ( auxin_is_true( $display_share ) ) {
        ?>
                <div class="auxshp-share-wrapper">
                    <div class="aux-share-btn aux-tooltip-socials aux-tooltip-dark aux-socials">
                        <span class="aux-icon auxicon-share"></span>
                    </div>
                </div> 
        <?php
            }
        ?>
        </div>
    </div>

<?php
}


