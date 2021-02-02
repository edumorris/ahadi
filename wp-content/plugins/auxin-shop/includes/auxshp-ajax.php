<?php 
/**
 * Remove Cart data via Ajax
 */
function auxshp_product_remove() {
	global $woocommerce;

	try {

		$nonce 			= $_POST['verify_nonce'];
		$id 			= $_POST['product_id'];

	    if( ! isset( $_POST['product_id'] ) || ! wp_verify_nonce( $nonce, 'remove_cart-' . $id ) ){
	    	wp_send_json_error( sprintf( '<div class="aux-woocommerce-ajax-notification woocommerce-error">%s</div>',  __('Verify Nonce Error!', 'auxin-shop') ) );
	    }

		$cart 			= $woocommerce->cart;
		$cart_id 		= $cart->generate_cart_id($id);
		$cart_item_id 	= $cart->find_product_in_cart($cart_id);

		if( $cart_item_id ) {
			$cart->set_quantity( $cart_item_id, 0 );
		}

		$cart->calculate_totals();

		$response = array(
			'total'		=> 	wc_format_decimal( $cart->cart_contents_total, 2 ),
			'count'		=> 	$cart->cart_contents_count,
			'empty'		=>	sprintf( '<div class="aux-card-box">%s</div>',  __( 'Your cart is currently empty.', 'auxin-shop' ) ),
			'notif'		=>	sprintf( '<div class="aux-woocommerce-ajax-notification woocommerce-message">%s</div>',  __('Item has been removed from your shopping cart.', 'auxin-shop') )
		);	

		wp_send_json_success( $response );

    } catch (Exception $e) {
        wp_send_json_error( sprintf( '<div class="aux-woocommerce-ajax-notification woocommerce-error">%s</div>',  __('An Error Occurred!', 'auxin-shop') ) );
    }	

}
add_action( 'wp_ajax_auxshp_product_remove', 'auxshp_product_remove' );
add_action( 'wp_ajax_nopriv_auxshp_product_remove', 'auxshp_product_remove' );


/**
 * Add to Cart via Ajax
 */
function auxshp_ajax_shopping_cart() {
	global $woocommerce;

	try {
	
		$product_id        = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : '';
		$quantity          = empty( $_POST['quantity'] ) ? 1 : wc_stock_amount( $_POST['quantity'] );
		$verify_nonce      = isset( $_POST['verify_nonce'] ) ? $_POST['verify_nonce'] : '';
		$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );

		if( empty( $product_id ) || ! wp_verify_nonce( $verify_nonce, 'aux_add_to_cart-' . $product_id ) ){
			wp_send_json_error( sprintf( '<div class="aux-woocommerce-ajax-notification woocommerce-error">%s</div>',  __('Verify Nonce Error!', 'auxin-shop') ) );
		} else {
			// Add item to cart
			if( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity ) ) {
				$args  = isset( $_POST['args'] ) ? $_POST['args'] : array(
		            'title'          => '',
		            'css_class'      => '',
		            'dropdown_class' => '',
		            'color_class'    => 'aux-black',
		            'action_on'      => 'click',
		            'cart_url'       => '#',
		            'dropdown_skin'  => '',
		        );
				$items = auxshp_get_cart_items( $args );
				$count = $woocommerce->cart->cart_contents_count;
				$total = auxshp_get_cart_basket( $args, $count );

				$data  = array(
					'items' => $items,
					'total' => $total,
					'notif' => sprintf( '<div class="aux-woocommerce-ajax-notification woocommerce-message"><a href="%s" class="button wc-forward">%s</a> "%s" %s</div>', esc_url( wc_get_cart_url() ) , __( 'View cart', 'auxin-shop' ), get_the_title( $product_id ) , __('has been added to your cart.', 'auxin-shop') )
				);
				// Send json success
				wp_send_json_success( $data );				
			} else {
				wp_send_json_error( sprintf( '<div class="aux-woocommerce-ajax-notification woocommerce-error">%s</div>',  __('Sorry, this product cannot be purchased.', 'auxin-shop') ) );
			}

		}

    } catch (Exception $e) {
        wp_send_json_error( sprintf( '<div class="aux-woocommerce-ajax-notification woocommerce-error">%s</div>',  __('An Error Occurred!', 'auxin-shop') ) );
    }

}
add_action( 'wp_ajax_auxshp_ajax_shopping_cart', 'auxshp_ajax_shopping_cart' );
add_action( 'wp_ajax_nopriv_auxshp_ajax_shopping_cart', 'auxshp_ajax_shopping_cart' );