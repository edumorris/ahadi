<?php 
/**
 * 
 * @package    
 * @license    LICENSE.txt
 * @author     
 * @link       https://bitbucket.org/averta/
 * @copyright  (c) 2010-2018 
 */


add_filter( 'woocommerce_format_sale_price',          'auxshp_change_price_order',             10, 3 );
add_filter( 'woocommerce_checkout_fields',            'auxshp_change_checkout_fields'                );
add_filter('woocommerce_show_page_title',             'auxshp_disable_archive_page_title',     10    );
add_filter('woocommerce_catalog_orderby',             'auxshp_change_catalog_orderby',         10    );

add_action( 'woocommerce_single_product_summary',     'auxshp_template_single_wishlist_share', 45    );
add_action( 'woocommerce_after_shop_loop_item_title', 'auxshp_loop_product_meta',              12    );
add_action( 'woocommerce_after_shop_loop_item'      , 'auxshp_loop_product_tools',             12    );
add_action( 'woocommerce_after_shop_loop_item'      , 'auxshp_loop_after_shop_loop_item',      9999  );
add_action( 'woocommerce_shop_loop_item_title'      , 'auxshp_loop_before_item_title',         1     );
add_action( 'woocommerce_archive_description'       , 'auxshp_archive_page_title_description', 1     );

add_action( 'woocommerce_before_shop_loop_item_title', 'auxshp_get_product_thumbnail', 11 );

add_action( 'auxshp_share_section', 'auxshp_single_wishlist', 10 );
add_action( 'auxshp_share_section', 'auxshp_single_share', 20 );

add_action( 'woocommerce_after_single_product', 'auxshp_single_page_navigation' );


remove_action( 'woocommerce_proceed_to_checkout',     'woocommerce_button_proceed_to_checkout', 20 ); 
add_action( 'woocommerce_proceed_to_checkout',        'auxshp_change_checkout_button_text',     20 );


/**
 * Disable WooCommerce Default Page Title.
 */
function auxshp_disable_archive_page_title() {

    if( ! auxin_is_true( auxin_get_option( 'product_archive_disable_page_title', '1' ) ) ) {
        return false;
    }

}

/**
 * Display breadcrumb instead of woocommerce default header title.
 */
function auxshp_archive_page_title_description() {

    $disable_page_title = auxin_get_option( 'product_archive_disable_page_title', '1' );
    $display_breadcrumb = auxin_get_option( 'product_archive_display_breadcrumb_header', '0' );

    if( auxin_is_true( $disable_page_title ) && auxin_is_true( $display_breadcrumb ) ) {
        auxin_the_breadcrumbs();
    }

}

/**
 * Display breadcrumb instead of woocommerce default header title.
 */
function auxshp_change_catalog_orderby() {

    return array(
        'menu_order' => __( 'Default', 'auxin-shop' ),
        'popularity' => __( 'Popularity', 'auxin-shop' ),
        'rating'     => __( 'Rating', 'auxin-shop' ),
        'date'       => __( 'Newness', 'auxin-shop' ),
        'price'      => __( 'Low Price', 'auxin-shop' ),
        'price-desc' => __( 'High Price', 'auxin-shop' )
    );

}

/**
 * Function for changing price order (Showing display price before regular price).
 */
function auxshp_change_price_order( $price, $regular_price, $sale_price ) {

    $price = '<ins>' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</ins> <del>' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</del>';

    return $price;
}


/**
 * Output the product wishlist button.
 *
 * @subpackage  Product
 */
function auxshp_template_single_wishlist_share() {

    global $product;

    if ( 'default' == $show_wishlist = auxin_get_post_meta( $product->get_id(), '_product_single_display_wishlist', 'default' ) ) {
        $show_wishlist = auxin_get_option( 'product_single_display_wishlist', '1' );
    }

    if ( 'default' == $show_share = auxin_get_post_meta( $product->get_id(), '_product_single_display_share', 'default' ) ) {
        $show_share = auxin_get_option( 'product_single_display_share', '1' );
    }

    if ( auxin_is_true( $show_wishlist ) || auxin_is_true( $show_share ) ) {
        wc_get_template( 'single-product/wishlist-share.php' );
    }

}

if ( ! function_exists('woocommerce_template_loop_product_title') ) {

    function woocommerce_template_loop_product_title() {
        echo '<h3 class="auxshp-label auxshp-loop-title">' . get_the_title() . '</h3>';
    }

}

function auxshp_loop_product_meta() {
    wc_get_template( 'loop/meta.php' );
}

function auxshp_loop_product_tools() {
    wc_get_template( 'loop/tools.php' );
}

function auxshp_loop_before_item_title(){
    echo '<div class="auxshp-entry-main">';
}

function auxshp_loop_after_shop_loop_item(){
    echo '</div>';
}

function auxshp_get_product_thumbnail( $size = '', $gallery = true, $class = '' ) {

    global $post, $product, $woocommerce;
    $image_size         = apply_filters( 'single_product_archive_thumbnail_size', $size );
    $image_size         = wc_get_image_size( $image_size );
    $image_id           = get_post_thumbnail_id();
    $attachment_ids     = auxshp_get_gallery_image_ids( $product );
    $image_aspect_ratio = auxin_get_option( 'product_index_thumb_ratio', '1.33' );

    if ( has_post_thumbnail() ) {

        if ( 'default' == $related_number = auxin_get_post_meta( $post->ID, '_product_related_posts_column_number', 'default' ) ) {
            $related_number = auxin_get_option( 'product_related_posts_column_number', '4' );
        }

        $column_media_width = auxin_get_content_column_width( $related_number );
        
        if ( 'default' == $template = auxin_get_post_meta( $post->ID, '_product_single_template', 'default' ) ) {
            $template = auxin_get_option( 'product_single_template', 'slider' );
        }

        
        if ( 'wide' === $template || 'wide-center' === $template ) {
            $image_aspect_ratio = 1;
        }
        

        if ( empty( $size ) ) {
            $size = array( 'width' => $column_media_width, 'height' => $column_media_width * $image_aspect_ratio );
        }

        if ( $attachment_ids ) {
            echo '<span class="aux-flipper-images">';
        }

        echo auxin_get_the_responsive_attachment(
                $image_id,
                array(
                    'quality'      => 100,
                    'upscale'      => true,
                    'crop'         => true,
                    'add_hw'       => true, // whether add width and height attr or not
                    'attr'         => array(
                                        'class'                => 'auxshp-product-image auxshp-attachment ' . $class,
                                        'data-original-width'  => $image_size['width'],
                                        'data-original-height' => $image_size['height'],
                                        'data-original-src'    => wp_get_attachment_image_src( $image_id, 'full' )[0]
                                        ),
                    'size'         => $size,
                    'image_sizes'  => 'auto',
                    'srcset_sizes' => 'auto',
                    'original_src' => false,
                    'preload_off'  => true,
                )

            );

        if ( $attachment_ids && $gallery ) {

            $attachment_ids     = array_values( $attachment_ids );
            $secondary_image_id = $attachment_ids['0'];

            echo auxin_get_the_responsive_attachment(
                $secondary_image_id,
                array(
                    'quality'      => 100,
                    'upscale'      => true,
                    'crop'         => true,
                    'add_hw'       => true, // whether add width and height attr or not
                    'attr'         => array(
                                        'class'                => 'auxshp-product-secondary-image auxshp-attachment ' . $class,
                                        'data-original-width'  => $image_size['width'],
                                        'data-original-height' => $image_size['height'],
                                        'data-original-src'    => wp_get_attachment_image_src( $secondary_image_id, 'full' )[0]
                                        ),
                    'size'         => $size,
                    'image_sizes'  => 'auto',
                    'srcset_sizes' => 'auto',
                    'original_src' => false
                )

            );      


        }         
        
        echo '</span>';

    } elseif ( wc_placeholder_img_src() ) {
        echo wc_placeholder_img( $image_size );
    }

    echo '</a>';
    
}

function auxshp_get_gallery_image_ids( $product ) {
    if ( ! is_a( $product, 'WC_Product' ) || ! auxin_is_true( auxin_get_option( 'product_index_display_image_flipper', '1' ) ) ) {
        return;
    }
    if ( is_callable( 'WC_Product::get_gallery_image_ids' ) ) {
        return $product->get_gallery_image_ids();
    } else {
        return $product->get_gallery_attachment_ids();
    }
}    



function auxshp_single_share() {

    global $product;

    if ( 'default' == $show_share = auxin_get_post_meta( $product->get_id(), '_product_single_display_share', 'default' ) ) {
        $show_share = auxin_get_option( 'product_single_display_share', '1' );
    }

    if ( auxin_is_true( $show_share ) ) {
        wc_get_template( 'single-product/share.php' );
    }

}

function auxshp_single_wishlist() {

    global $product;

    if ( 'default' == $show_wishlist = auxin_get_post_meta( $product->get_id(), '_product_single_display_wishlist', 'default' ) ) {
        $show_wishlist = auxin_get_option( 'product_single_display_wishlist', '1' );
    }

    if ( auxin_is_true( $show_wishlist ) ) {
        wc_get_template( 'single-product/wishlist.php' );
    }

}

function auxshp_single_page_navigation() {

    global $product;
    // get next/prev portfolio button
    if( 'default' == $display_next_prev = auxin_get_post_meta( $product->get_id(), '_show_next_prev_nav', 'default' ) ){
        $display_next_prev = auxin_get_option( 'show_product_single_next_prev_nav', false );
    }
    $display_next_prev = auxin_is_true( $display_next_prev )? true: false;
       
    if( $display_next_prev ) {
        if( 'default' == $next_prev_skin = auxin_get_post_meta( $product->get_id(), '_next_prev_nav_skin', 'default' ) ){
            $next_prev_skin = auxin_get_option( 'product_single_next_prev_nav_skin', false );
        }
        auxin_single_page_navigation( array(
            'prev_text'      => __( 'Previous Product', 'auxin-shop' ),
            'next_text'      => __( 'Next Product'    , 'auxin-shop' ),
            'taxonomy'       => 'product_cat',
            'skin'           => $next_prev_skin // minimal, thumb-no-arrow, thumb-arrow, boxed-image
        ));
    }

}


function auxshp_change_checkout_fields( $fields ) {
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // add form-control to the actual input
            $field['input_class'][] = 'aux-input-text aux-large';
        }
    }
    return $fields;
}

function auxshp_change_checkout_button_text() {
  ?>
       <a href="<?php echo esc_url( wc_get_checkout_url() );?>" class="checkout-button button alt wc-forward aux-button-block aux-button aux-exlarge aux-black aux-uppercase"><?php esc_html_e( 'Proceed to checkout', 'auxin-shop' ); ?></a>
  <?php
}

/**
 * Function for override our custom woocommerce widgets 
 */

function auxshp_override_woocommerce_widgets() {
    
    // UnRegister The Default Price Filter widget in Woocommerce
    if ( class_exists( 'WC_Widget_Price_Filter' ) ) {
        unregister_widget( 'WC_Widget_Price_Filter' );

        // Register Our Custom Price Filter widget 
        include_once( 'widgets/class-auxshp-wc-widget-price-filter.php' ); 
        register_widget( 'AUXSHP_WC_Widget_Price_Filter' );

  } 
  
    // UnRegister The Default Recent Reviews widget in Woocommerce
    if ( class_exists( 'WC_Widget_Recent_Reviews' ) ) {
        unregister_widget( 'WC_Widget_Recent_Reviews' );

        // Register Our Custom Recent Reviews widget
        include_once( 'widgets/class-auxshp-wc-widget-recent-reviews.php' ); 
        register_widget( 'AUXSHP_WC_Widget_Recent_Reviews' );
        
  }

}

add_action( 'widgets_init', 'auxshp_override_woocommerce_widgets', 15 );


/**
 * Function For Change The WooCommerce Cart Item Remove Button in mini-cart.php
 */
function auxshp_filter_woocommerce_cart_item_remove_link( $sprintf, $cart_item_key ) { 

    $sprintf = str_replace( 'class="remove"', 'class="remove auxshp-card-items-remove aux-svg-symbol aux-small-cross"', $sprintf );
    return str_replace( '&times;', '', $sprintf );

}; 

add_filter( 'woocommerce_cart_item_remove_link', 'auxshp_filter_woocommerce_cart_item_remove_link', 10, 2 ); 


/**
 * Remove parentheses from reviews counter in tabs section
 */
function auxshp_remove_parentheses_from_reviews_counter( $default, $key ) {

    return str_replace( array( '(', ')' ), array( '<span class="aux-reviews-number">', '</span>' ), $default );

}

add_filter( 'woocommerce_product_reviews_tab_title', 'auxshp_remove_parentheses_from_reviews_counter', 98, 2 );