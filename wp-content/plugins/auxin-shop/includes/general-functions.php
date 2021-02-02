<?php
/**
 * General Functions
 *
 * 
 * @package    
 * @license    LICENSE.txt
 * @author     
 * @link       https://bitbucket.org/averta/
 * @copyright  (c) 2010-2018 
 */

/**
 * Get cart items list for shopping cart
 */
function auxshp_get_cart_items( $args ){

    global $woocommerce;
    ob_start();
    
    $items = $woocommerce->cart->get_cart();
    echo '<div class="aux-card-box">';
    foreach($items as $item => $values):
    $product = new WC_product( $values['product_id'] );
?>
        <div class="aux-card-item" data-product-id="<?php echo esc_attr( $values['product_id'] ); ?>">
            <div class="aux-card-item-img">
                <?php echo $product->get_image('thumbnail'); ?>
            </div>
            <div class="aux-card-item-details">
                <a class="aux-item-permalink" href="<?php echo esc_url( get_permalink( $values['product_id'] ) ); ?>">
                    <h3><?php echo $values['data']->get_title(); ?></h3>
                </a>
                <span>
                    <?php echo $values['quantity'] . ' &times; ' . $values['data']->get_price_html(); ?>
                </span>
                <a href="<?php echo esc_url( wc_get_cart_remove_url( $item ) ); ?>" class="aux-remove-cart-content aux-svg-symbol aux-small-cross <?php echo esc_attr( $args['color_class'] ); ?>" data-verify_nonce="<?php echo wp_create_nonce( 'remove_cart-' . $values['product_id'] ); ?>" data-product_id="<?php echo esc_attr( $values['product_id'] ); ?>"></a>
            </div>
        </div>
 <?php 
    endforeach;
    echo '</div>';
?>
    <div class="aux-inline-card-checkout">
        <div class="aux-card-final-amount aux-cart-subtotal">
        <?php
            echo __( 'SUB TOTAL', 'phlox' ) . $woocommerce->cart->get_cart_subtotal();
        ?>
        </div>          
        <div class="aux-button-wrapper">
            <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="aux-button aux-checkout-button aux-curve aux-medium <?php echo esc_attr( $args['color_class'] ); ?> aux-uppercase"><span class="aux-overlay"></span><span class="aux-text"><?php esc_attr_e( 'Checkout', 'auxin-shop' ); ?></span></a>                
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="aux-button aux-cart-button aux-curve aux-medium aux- <?php echo esc_attr( $args['color_class'] ); ?> aux-outline aux-uppercase"><span class="aux-overlay"></span><span class="aux-text"><?php esc_attr_e( 'View Cart', 'auxin-shop' ); ?></span></a>                
        </div>
    </div>
<?php
    return ob_get_clean();
}

/**
 * Get basket details for cart contents 
 */
function auxshp_get_cart_basket( $args, $count ){

    global $woocommerce;
    ob_start();
?>
    <a class="aux-cart-contents <?php echo esc_attr( $args['icon'] ); ?>" href="<?php echo esc_url( $args['cart_url'] ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'auxin-shop' ); ?>">
        <?php echo isset( $args['title'] ) ? $args['title'] : '';
        echo '<span>' . $count . '</span>'; ?>
    </a>
    <div class="aux-shopping-cart-info aux-phone-off">
        <span class="aux-shopping-title"><?php esc_html_e( 'Shopping Basket', 'auxin-shop' ); ?></span>
        <span class="aux-shopping-amount aux-cart-subtotal"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
    </div>
 <?php 

    return ob_get_clean();
}