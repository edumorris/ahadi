<?php
/**
 * Master Slider.
 *
 * @package   MasterSlider
 * @author    averta [averta.net]
 * @license   LICENSE.txt
 * @link      http://masterslider.com
 * @copyright Copyright © 2014 averta
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    global $post, $woocommerce, $product;

    $thumbnail_id       = get_post_thumbnail_id();
    $large_single_size  = apply_filters( 'single_product_large_single_size', 'shop_single' );
    $image_size         = wc_get_image_size( $large_single_size );

    $column_media_width = auxin_get_content_column_width( 2 );
    $image_aspect_ratio = 0;
    $main_src           = wp_get_attachment_image_src( $thumbnail_id, 'full' );

    if ( 'default' == $lightbox_enabled = auxin_get_post_meta( $product->get_id(), '_product_single_lightbox_enabled', 'default' ) ) {
        $lightbox_enabled = auxin_get_option( 'product_single_lightbox_enabled', '1' );
    }

    $attachment_metadata= wp_get_attachment_metadata( $thumbnail_id );
    $image_primary_meta = is_array( $attachment_metadata ) ? $attachment_metadata : array( 'width' => 300 ,'height' => 300 );
    $lightbox_attrs     = 'class="auxshp-lightbox-btn aux-hide-text" data-original-src="' . $main_src[0] . '" data-original-width="' . $image_primary_meta['width'] . '" data-original-height="' . $image_primary_meta['height'] . '" ' . 'data-caption="' . auxin_attachment_caption( $thumbnail_id ) . '"';

    $attachment_props   = array(
            'upscale'      => true,
            'crop'         => false,
            'add_hw'       => true, // whether add width and height attr or not
            'attr'         => array(
                                'class'                   => 'wp-post-image auxshp-zoom',
                                'data-original-width'     => $image_primary_meta['width'],
                                'data-original-height'    => $image_primary_meta['height'],
                                'data-large_image_width'  => $main_src[1],
                                'data-large_image_height' => $main_src[2],
                                'data-original-src'       => $main_src[0]
                                ),
            'size'         => array( 'width' => $column_media_width, 'height' => $column_media_width * $image_aspect_ratio ),
            'image_sizes'  => array(
                array( 'min' => '',      'max' => '767px', 'width' => round( 100 / 1 ).'vw' ),
                array( 'min' => '768px', 'max' => '992px', 'width' => round( 100 / 2 ).'vw' ),
                array( 'min' => ''     , 'max' => '',      'width' => $column_media_width.'px' )
            ),
            'srcset_sizes' => array(
                array( 'width' =>     $column_media_width, 'height' =>     $column_media_width * $image_aspect_ratio ),
                array( 'width' => 2 * $column_media_width, 'height' => 2 * $column_media_width * $image_aspect_ratio ),
                array( 'width' => 4 * $column_media_width, 'height' => 4 * $column_media_width * $image_aspect_ratio )
            )
        );

?>

<div class="images woocommerce-product-gallery auxshp-lightbox">
    <figure class="auxin-attachment woocommerce-product-gallery__image">
        <?php if ( auxin_is_true( $lightbox_enabled ) ) :  ?>
            <a href="<?php echo esc_url( $main_src[0] ); ?>" <?php echo $lightbox_attrs; ?> >open</a>
        <?php endif; ?>
        <?php echo auxin_get_the_responsive_attachment( $thumbnail_id, $attachment_props ); ?>
    </figure>
</div>
