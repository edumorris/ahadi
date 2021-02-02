<?php
/**
 * Load Shop templates
 * 
 * 
 * @package    
 * @license    LICENSE.txt
 * @author     
 * @link       https://bitbucket.org/averta/
 * @copyright  (c) 2010-2018 
 */

// no direct access allowed
if ( ! defined('ABSPATH') )  exit;

class AUXSHP_Template_Loader {

    public $single_product_template;

    /**
     * Construct
     */
    function __construct() {

        add_filter( 'wc_get_template_part',        array( $this, 'get_template_parts' ), 10, 3 );
        add_filter( 'woocommerce_locate_template', array( $this, 'load_templates'     ), 10, 3 );

        // Actions for overriding template
        add_action( 'plugins_loaded', array( $this, 'auxshp_templates' ) );

        add_filter( 'post_class', array( $this, 'product_has_gallery' ) );        

    }


    public function get_template_parts( $template, $slug, $name ) {

        $auxshp_path  = AUXSHP()->template_path() . 'woocommerce/';

        if ( file_exists( $auxshp_path . "{$slug}-{$name}.php" ) ) {
            $template = $auxshp_path . "{$slug}-{$name}.php";
        }

        return $template;
    }


    public function load_templates( $template, $template_name, $template_path ) {

        global $woocommerce;

        $_template = $template;
        
        if ( ! $template_path ) {
            $template_path = $woocommerce->template_url;
        }
        
        $auxshp_path  = AUXSHP()->template_path() . 'woocommerce/';

        $template = locate_template( array( $auxshp_path . $template_name, $template_name ) );

        if ( ! $template && file_exists( $auxshp_path . $template_name ) ) {
            $template = $auxshp_path . $template_name;
        }
        
        if ( ! $template ) {
            $template = $_template;
        }

        return $template;
    }


    public function auxshp_templates () {

        add_action( 'woocommerce_single_product_summary',        array( $this, 'auxshp_rating' ),               15 );
        add_action( 'woocommerce_before_single_product_summary', array( $this, 'auxshp_product_images' ),       20 );
        add_action( 'woocommerce_after_single_product_summary',  array( $this, 'auxshp_product_grid' ),         8  );
        add_action( 'woocommerce_single_product_summary',        array( $this, 'auxshp_toggle' ),               60 );
        add_action( 'auxshp_product_main',                       array( $this, 'auxshp_wide_toggle' ),          60 );
        add_action( 'woocommerce_after_single_product_summary',  array( $this, 'auxshp_tabs' ),                 10 );
        add_action( 'woocommerce_after_single_product',          array( $this, 'auxshp_related_products' ),     20 );
        add_action( 'woocommerce_after_shop_loop_item_title',    array( $this, 'auxshp_loop_rating' ),          13 );
        add_action( 'auxin_get_the_related_posts_args',          array( $this, 'auxin_related_posts_num' )         );

    }


    public function auxshp_product_images() {

        global $product;

        if ( 'default' == $this->single_product_template = auxin_get_post_meta( $product->get_id() , '_product_single_template', 'default' ) ) {
            $this->single_product_template = auxin_get_option( 'product_single_template', 'slider' );
        }

        switch ( $this->single_product_template ) { 
            case 'slider':
                
                if ( 'default' == $use_wc_slider = auxin_get_post_meta( $product->get_id(), '_product_single_template_slider_type', 'default' ) ) {
                    $use_wc_slider = auxin_get_option( 'product_single_template_slider_type', false );
                }

                if ( defined('MSWP_AVERTA_VERSION') && ! auxin_is_true( $use_wc_slider ) ) {
                    include ( AUXSHP_PUB_DIR . '/templates/woocommerce/single-product/product-images-slider.php' );
                    break;
                }

                $this->default_template();
                break;
            case 'grid':

                include ( AUXSHP_PUB_DIR . '/templates/woocommerce/single-product/product-featured-image.php' );
                break;

            case 'stack':

                include ( AUXSHP_PUB_DIR . '/templates/woocommerce/single-product/product-images-sticky.php' );
                break;

            case 'sticky':

                include ( AUXSHP_PUB_DIR . '/templates/woocommerce/single-product/product-images-sticky.php' );
                break;

            case 'wide':

                if ( defined('MSWP_AVERTA_VERSION') ) {

                    include ( AUXSHP_PUB_DIR . '/templates/woocommerce/single-product/product-images-slider.php' );
                    break;

                }

                $this->default_template();
                break;

            case 'wide-center':

                if ( defined('MSWP_AVERTA_VERSION') ) {

                    include ( AUXSHP_PUB_DIR . '/templates/woocommerce/single-product/product-images-slider.php' );
                    break;
                    
                }

                $this->default_template();
                break;

            default:
                // classic
                $this->default_template();
                break;
        }


    }


    public function auxshp_rating() {

        global $product;

        if ( 'default' == $show_star = auxin_get_post_meta( $product->get_id(), '_product_single_display_star_rating', 'default' ) ) {
            $show_star = auxin_get_option( 'product_single_display_star_rating', true );
        }

        if ( auxin_is_true( $show_star ) ) {
            woocommerce_template_single_rating();
        }

    }


    public function auxshp_product_grid() {

        if ( 'grid' == $this->single_product_template ) {
            include ( AUXSHP_PUB_DIR . '/templates/woocommerce/single-product/product-images-grid.php' );
        }

    }


    public function auxshp_toggle() {

        if ( 'sticky' == $this->single_product_template ) {
            include ( AUXSHP_PUB_DIR . '/templates/woocommerce/single-product/tabs/toggle.php' );
        }

    }


    public function auxshp_tabs() {

        if ( 'sticky' != $this->single_product_template && 'wide' != $this->single_product_template ) {
            woocommerce_output_product_data_tabs();
        }

    }


    public function auxshp_wide_toggle() {

        if ( 'wide' == $this->single_product_template ) {
            include ( AUXSHP_PUB_DIR . '/templates/woocommerce/single-product/tabs/toggle.php' );
        }

    }

    public function auxshp_related_products() {

        global $product;

        if ( 'default' == $show_related = auxin_get_post_meta( $product->get_id(), '_show_product_related_posts', 'default' ) ) {
            $show_related = auxin_get_option( 'show_product_related_posts', true );
        }

        if ( auxin_is_true( $show_related ) ) {

            add_filter( 'auxshp_loop_start_class', array( $this, 'auxshp_loop_related_classes' ) );
            add_filter( 'woocommerce_output_related_products_args',  array( $this, 'auxshp_related_products_args' ) );

            woocommerce_output_related_products();

        }

    }


    public function auxshp_related_products_args( $args ) {

        $args['posts_per_page'] = $this->auxshp_related_products_num();

        return $args;
    }

    public function auxin_related_posts_num( $args ) {

        $args['num'] = $this->auxshp_related_products_num();

        return $args;
    }

    public function auxshp_related_products_num() {

        global $post;

        if ( 'default' == $posts_per_page = auxin_get_post_meta( $post->ID, '_product_related_posts_column_number', 'default' ) ) {
            $posts_per_page = auxin_get_option( 'product_related_posts_column_number', 4 );
        }

        if ( 'default' == $related_mode = auxin_get_post_meta( $post->ID, '_product_related_posts_preview_mode', 'default' ) ) {
            $related_mode = auxin_get_option( 'product_related_posts_preview_mode', 'grid' );
        }

        if ( 'carousel' == $related_mode ) {

            if ( 'default' == $carousel_pages = auxin_get_post_meta( $post->ID, '_product_related_posts_carousel_pages', 'default' ) ) {
                $carousel_pages = auxin_get_option( 'product_related_posts_carousel_pages', 2 );
            }

            $posts_per_page *= $carousel_pages;

        }

        return $posts_per_page;
    }


    public function auxshp_loop_related_classes( $classes_string ) {
        
        global $product;

        if ( 'default' == $cols = auxin_get_post_meta( $product->get_id(), '_product_related_posts_column_number', 'default' ) ) {
            $cols = auxin_get_option( 'product_related_posts_column_number', 4 );
        }

        $classes_string = 'aux-match-height aux-row aux-de-col' . $cols . ' aux-tb-col2 aux-mb-col1';

        if ( 'default' == $full_width = auxin_get_post_meta( $product->get_id(), '_product_related_posts_full_width', 'default' ) ) {
            $full_width = auxin_get_option( 'product_related_posts_full_width', false );
        }

        if ( auxin_is_true( $full_width ) ) {
            $classes_string .= ' auxshp-no-margin';
        }

        if ( 'default' == $snap = auxin_get_post_meta( $product->get_id(), '_product_related_posts_snap_items', 'default' ) ) {
            $snap = auxin_get_option( 'product_related_posts_snap_items', false );
        }

        if ( auxin_is_true( $snap ) ) {
            $classes_string .= ' aux-no-gutter';
        }

        return $classes_string;
    }


    public function auxshp_loop_rating() {

        global $product;

        if ( 'default' == $show_stars = auxin_get_post_meta( $product->get_id(), '_product_related_posts_display_stars', 'default' ) ) {
            $show_stars = auxin_get_option( 'product_related_posts_display_stars', true );
        }

        $show_stars = is_shop() ? auxin_get_option('product_index_display_star_rating', '1' ) : $show_stars;

        if ( auxin_is_true( $show_stars ) ) {
            woocommerce_template_loop_rating();
        }

    }

    public function default_template() {

        echo '<div class="auxshp-default-product-images">';
            woocommerce_show_product_images();
        echo '</div>';

    }

    public function product_has_gallery( $classes ) {
        global $product;
        if ( ! is_admin() && 'product' === get_post_type() ) {
            $attachment_ids = auxshp_get_gallery_image_ids( $product );
            if ( ! empty ($attachment_ids) ) {
                $classes[] = 'aux-has-gallery';
            }
        }
        return $classes;
    }

}

new AUXSHP_Template_Loader();