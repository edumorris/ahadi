<?php
function auxin_advanced_recent_products( $args= array() ) {

    global $post;

    $defaults = array (
        'title'                 => '',    // header title (required)
        'subtitle'              => '',    // header subtitle
        'cat'                   => ' ',
        'num'                   => '8',   // max generated entry
        'image_aspect_ratio'    => 0.75,
        'exclude_without_media' => 0,
        'order_by'              => 'date',
        'order'                 => 'DESC',
        'only_products__in'     => '',   // display only these post IDs. array or string comma separated
        'include'               => '',    // include these post IDs in result too. array or string comma separated
        'exclude'               => '',    // exclude these post IDs from result. array or string comma separated
        'offset'                => '',
        'show_filters'          => '1',
        'filter_by'             => 'product_cat',
        'filter_style'          => 'aux-slideup',
        'filter_align'          => 'aux-center',
        'display_price'         => true,
        'display_rating'        => true,
        'display_add_to_cart'   => true,
        'display_wishlist'      => true,
        'display_sale_badge'    => true,
        'display_title'         => true,
        'display_categories'    => true,
        'desktop_cnum'          => 4,
        'tablet_cnum'           => 'inherit',
        'phone_cnum'            => '1',
        'post_type'             => 'product',
        'taxonomy_name'         => 'product_cat', // the taxonomy that we intent to display in post info
        'tax_args'              => '',
        'extra_classes'         => '',
        'template_part_file'    => 'template-advanced-recent-product',
        'extra_template_path'   =>  AUXSHP_PUB_DIR . '/templates/elements',
        'universal_id'          => '',
        'use_wp_query'          => false, // true to use the global wp_query, false to use internal custom query
        'reset_query'           => true,
        'wp_query_args'         => array(), // additional wp_query args
        'query_args'            => array(),
        'custom_wp_query'       => '',
        'base'                  => 'aux_advance_recent_products',
        'base_class'            => 'aux-widget-recent-products-pro'
    );

    $args = wp_parse_args( $args, $defaults );

    if( empty( $args['cat'] ) || $args['cat'] == " " || ( is_array( $args['cat'] ) && in_array( " ", $args['cat'] ) ) ) {
        $tax_args = array();
    } else {
        $tax_args = array(
            array(
                'taxonomy' => $args['taxonomy_name'],
                'field'    => 'term_id',
                'terms'    => ! is_array( $args['cat'] ) ? explode( ",", $args['cat'] ) : $args['cat']
            )
        );
    }

    $query_args = array(
        'post_type'             => 'product',
        'posts_per_page'        => $args['num'],
        'orderby'               => $args['order_by'],
        'order'                 => $args['order'],
        'tax_query'             => $tax_args,
        'post_status'           => 'publish',
        'include_posts__in'     => $args['include'], // include posts in this list
        'posts__not_in'         => $args['exclude'], // exclude posts in this list
        'exclude_without_media' => $args['exclude_without_media']
    );


    // add the additional query args if available
    if( $args['query_args'] ){
        $query_args = wp_parse_args( $query_args, $args['query_args'] );
    }

    // pass the args through the auxin query parser
    $wp_query = new WP_Query( auxin_parse_query_args( $query_args ) );

    $have_posts = $wp_query->have_posts();

    if( $have_posts ){

        while ( $wp_query->have_posts() ) {

            $wp_query->the_post();
            $post = get_post();

            $the_format = get_post_format( $post );

            global $post, $product, $auxshp_wishlist;

            $cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );

            ?>

            <div <?php post_class( 'aux-col' ); ?>>
            <?php

                woocommerce_template_loop_product_link_open();

                auxshp_get_product_thumbnail( $args['image_size'], true, $args['image_class'] );

                if ( $product->is_on_sale() &&  $product->is_type( 'simple' ) && auxin_is_true( $args['display_sale_badge'] ) ) {
                    $sale_price    = $product->get_sale_price();
                    $regular_price = $product->get_regular_price();
                    $sale          = ceil(( ($regular_price - $sale_price) / $regular_price ) * 100);

                    if ( !empty( $regular_price ) && !empty( $sale_price ) && $regular_price > $sale_price ) {
                        echo '<span class="onsale">' . __('Sale ','auxin-shop' ) . $sale . '%</span>';
                    }

                }

                woocommerce_template_loop_product_link_close();

                echo '<div class="auxshp-entry-main">';

                    echo '<div class="aux-shop-info-wrapper">';

                        if ( auxin_is_true( $args['display_title'] ) ) {
                            woocommerce_template_loop_product_title();
                        }

                        if ( auxin_is_true( $args['display_price'] ) ) {
                            woocommerce_template_loop_price();
                        }

                    echo '</div>';

                    echo '<div class="aux-shop-meta-wrapper">';

                        if ( auxin_is_true( $args['display_categories'] ) && $cat_count > 0 ) {
                            echo wc_get_product_category_list( $product->get_id(), ', ', '<em class="aux-shop-meta-terms">', '</em>' );
                        }

                        if ( auxin_is_true( $args['display_rating'] ) ) {
                            woocommerce_template_loop_rating();
                        }

                    echo '</div>';

                    if ( auxin_is_true( $args['display_add_to_cart'] ) || auxin_is_true( $args['display_wishlist'] ) ) {

                    echo '<div class="aux-shop-btns-wrapper">';

                        if ( auxin_is_true( $args['display_add_to_cart'] ) ) {

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


                        $wishlist_class = 'available-add';

                        if ( $auxshp_wishlist->in_wishlist( $product->get_id() ) ) {
                            $wishlist_class = 'available-remove';
                        }

                        if ( auxin_is_true( $args['display_wishlist'] ) ) {
                            echo '<div class="auxshp-wishlist-wrapper">';
                                printf('<span class="auxshp-wishlist %s" data-auxshp-product_id="%s" data-auxshp-verify_nonce="%s">', $wishlist_class, $product->get_id(), wp_create_nonce( 'remove_wishlist-' . $product->get_id() )  );
                                    echo '<span class="aux-wishlist-icon aux-ico auxicon-heart-small-outline"></span>';
                                echo '</span>';
                            echo '</div>';

                        }

                    echo '</div>';

                    }

                echo '</div>';
            ?> </div> <?php

        }


    }


    if( $args['reset_query'] ){
        wp_reset_postdata();
    }

    // return false if no result found
    if( ! $have_posts ){
        ob_get_clean();
        return false;
    }

};

