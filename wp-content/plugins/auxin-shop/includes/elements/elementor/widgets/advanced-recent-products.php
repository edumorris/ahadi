<?php
namespace Auxin\Plugin\Shop\Elementor\Elements;

use Elementor\Plugin;
use Elementor\Post_CSS_File;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor 'AdvancedRecentProducts' widget.
 *
 * Elementor widget that displays an 'AdvancedRecentProducts' with lightbox.
 *
 * @since 1.0.0
 */
class AdvancedRecentProducts extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve 'AdvancedRecentProducts' widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'aux_advance_recent_product';
    }

    /**
     * Get widget title.
     *
     * Retrieve 'AdvancedRecentProducts' widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('Advanced Recent Product', 'auxin-shop' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve 'AdvancedRecentProducts' widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-woocommerce auxin-badge-pro';
    }

    /**
     * Get widget categories.
     *
     * Retrieve 'AdvancedRecentProducts' widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_categories() {
        return array( 'auxin-pro' );
    }

    /**
     * Retrieve the terms in a given taxonomy or list of taxonomies.
     *
     * Retrieve 'AdvancedRecentProducts' widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_terms() {
        // Get terms
        $terms = get_terms(
            array(
                'taxonomy'   => 'product_cat',
                'orderby'    => 'count',
                'hide_empty' => true
            )
        );

        // Then create a list
        $list  = array( ' ' => __('All Categories', 'auxin-shop' ) ) ;

        if ( ! is_wp_error( $terms ) && is_array( $terms ) ){
            foreach ( $terms as $key => $value ) {
                $list[$value->term_id] = $value->name;
            }
        }

        return $list;
    }

    /**
     * Register 'AdvancedRecentProducts' widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {
        /*-------------------------------------------------------------------*/
        /*  Layout TAB
        /*-------------------------------------------------------------------*/

        /*  Layout Section
        /*-------------------------------------*/

        $this->start_controls_section(
            'layout_section',
            array(
                'label' => __('Layout', 'auxin-shop' ),
                'tab'   => Controls_Manager::TAB_LAYOUT
            )
        );

        $this->add_responsive_control(
            'columns',
            array(
                'label'          => __( 'Columns', 'auxin-shop' ),
                'type'           => Controls_Manager::SELECT,
                'default'        => '4',
                'tablet_default' => 'inherit',
                'mobile_default' => '1',
                'options'        => array(
                    'inherit' => __( 'Inherited from larger', 'auxin-shop' ),
                    '1'       => '1',
                    '2'       => '2',
                    '3'       => '3',
                    '4'       => '4',
                    '5'       => '5',
                ),
                'frontend_available' => true,
            )
        );

        $this->add_control(
            'rows',
            array(
                'label'          => __( 'Rows', 'auxin-shop' ),
                'type'           => Controls_Manager::SELECT,
                'default'        => '4',
                'options'        => array(
                    'inherit' => __( 'Inherited from larger', 'auxin-shop' ),
                    '2'       => '2',
                    '3'       => '3',
                    '4'       => '4',
                    '5'       => '5',
                ),
            )
        );

        $this->add_control(
            'display_title',
            array(
                'label'        => __('Display title', 'auxin-shop' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'auxin-shop' ),
                'label_off'    => __( 'Off', 'auxin-shop' ),
                'return_value' => 'yes',
                'default'      => 'yes'
            )
        );

        $this->add_control(
            'display_price',
            array(
                'label'        => __('Display products price', 'auxin-shop' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'auxin-shop' ),
                'label_off'    => __( 'Off', 'auxin-shop' ),
                'return_value' => 'yes',
                'default'      => 'yes'
            )
        );

        $this->add_control(
            'display_add_to_cart',
            array(
                'label'        => __('Display add to cart', 'auxin-shop' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'auxin-shop' ),
                'label_off'    => __( 'Off', 'auxin-shop' ),
                'return_value' => 'yes',
                'default'      => 'yes'
            )
        );

        $this->add_control(
            'display_categories',
            array(
                'label'        => __('Display Categories', 'auxin-shop' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'auxin-shop' ),
                'label_off'    => __( 'Off', 'auxin-shop' ),
                'return_value' => 'yes',
                'default'      => 'yes'
            )
        );

        $this->add_control(
            'display_wishlist',
            array(
                'label'        => __('Display add to wishlist', 'auxin-shop' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'auxin-shop' ),
                'label_off'    => __( 'Off', 'auxin-shop' ),
                'return_value' => 'yes',
                'default'      => 'yes'
            )
        );

        $this->add_control(
            'display_sale_badge',
            array(
                'label'        => __('Display Sale Badge', 'auxin-shop' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'auxin-shop' ),
                'label_off'    => __( 'Off', 'auxin-shop' ),
                'return_value' => 'yes',
                'default'      => 'yes'
            )
        );

        $this->add_control(
            'display_rating',
            array(
                'label'        => __('Display Rating', 'auxin-shop' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'auxin-shop' ),
                'label_off'    => __( 'Off', 'auxin-shop' ),
                'return_value' => 'yes',
                'default'      => 'yes'
            )
        );


        $this->add_control(
            'image_aspect_ratio',
            array(
                'label'       => __('Image aspect ratio', 'auxin-shop'),
                'type'        => Controls_Manager::SELECT,
                'default'     => '0.75',
                'options'     => array(
                    '0.75'          => __('Horizontal 4:3' , 'auxin-shop'),
                    '0.56'          => __('Horizontal 16:9', 'auxin-shop'),
                    '1.00'          => __('Square 1:1'     , 'auxin-shop'),
                    '1.33'          => __('Vertical 3:4'   , 'auxin-shop'),
                    '1.5'           => __('Vertical 2:3'   , 'auxin-shop')
                ),
            )
        );

        $this->end_controls_section();
        /*-------------------------------------------------------------------*/
        /*  Content TAB
        /*-------------------------------------------------------------------*/

        /*  Query Section
        /*-------------------------------------*/

        $this->start_controls_section(
            'query_section',
            array(
                'label'      => __('Query', 'auxin-shop' ),
            )
        );

        $this->add_control(
            'cat',
            array(
                'label'       => __('Categories', 'auxin-shop'),
                'description' => __('Specifies a category that you want to show posts from it.', 'auxin-shop' ),
                'type'        => Controls_Manager::SELECT2,
                'multiple'    => true,
                'options'     => $this->get_terms(),
                'default'     => array( ' ' ),
            )
        );

        $this->add_control(
            'exclude_without_media',
            array(
                'label'        => __('Exclude products without media','auxin-shop' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'auxin-shop' ),
                'label_off'    => __( 'Off', 'auxin-shop' ),
                'return_value' => 'yes',
                'default'      => 'yes'
            )
        );

        $this->add_control(
            'order_by',
            array(
                'label'       => __('Order by', 'auxin-shop'),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'date',
                'options'     => array(
                    'date'            => __('Date', 'auxin-shop'),
                    'menu_order date' => __('Menu Order', 'auxin-shop'),
                    'title'           => __('Title', 'auxin-shop'),
                    'ID'              => __('ID', 'auxin-shop'),
                    'rand'            => __('Random', 'auxin-shop'),
                    'comment_count'   => __('Comments', 'auxin-shop'),
                    'modified'        => __('Date Modified', 'auxin-shop'),
                    'author'          => __('Author', 'auxin-shop'),
                    'post__in'        => __('Inserted Post IDs', 'auxin-shop')
                ),
            )
        );

        $this->add_control(
            'order',
            array(
                'label'       => __('Order', 'auxin-shop'),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'DESC',
                'options'     => array(
                    'DESC'          => __('Descending', 'auxin-shop'),
                    'ASC'           => __('Ascending', 'auxin-shop'),
                ),
            )
        );

        $this->add_control(
            'only_products__in',
            array(
                'label'       => __('Only products','auxin-shop' ),
                'description' => __('If you intend to display ONLY specific products, you should specify the products here. You have to insert the Products IDs that are separated by comma (eg. 53,34,87,25).', 'auxin-shop' ),
                'type'        => Controls_Manager::TEXT
            )
        );

        $this->add_control(
            'include',
            array(
                'label'       => __('Include products','auxin-shop' ),
                'description' => __('If you intend to include additional products, you should specify the products here. You have to insert the Products IDs that are separated by comma (eg. 53,34,87,25)', 'auxin-shop' ),
                'type'        => Controls_Manager::TEXT
            )
        );

        $this->add_control(
            'exclude',
            array(
                'label'       => __('Exclude products','auxin-shop' ),
                'description' => __('If you intend to exclude specific products from result, you should specify the products here. You have to insert the Products IDs that are separated by comma (eg. 53,34,87,25)', 'auxin-shop' ),
                'type'        => Controls_Manager::TEXT
            )
        );

        $this->add_control(
            'offset',
            array(
                'label'       => __('Start offset','auxin-shop' ),
                'description' => __('Number of products to displace or pass over.', 'auxin-shop' ),
                'type'        => Controls_Manager::NUMBER,
                'default'     => ''
            )
        );

        $this->end_controls_section();

        /*-------------------------------------------------------------------*/
        /*  Settings TAB
        /*-------------------------------------------------------------------*/
        /*-----------------------------------------------------------------------------------*/
        /*  Rating Style Section
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'wrappers_section',
            array(
                'label'     => __( 'Wrappers', 'auxin-shop' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_responsive_control(
            'wrapper_margin_bottom',
            array(
                'label' => __( 'Product Bottom space', 'auxin-shop' ),
                'type' => Controls_Manager::SLIDER,
                'range' => array(
                    'px' => array(
                        'max' => 100,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .type-product' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'wrapper_info_padding',
            array(
                'label'      => __( 'Info Wrapper Padding', 'auxin-shop' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} .aux-shop-info-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );
        
        $this->add_responsive_control(
            'wrapper_meta_padding',
            array(
                'label'      => __( 'Meta Wrapper Padding', 'auxin-shop' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} .aux-shop-meta-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'wrapper_btn_padding',
            array(
                'label'      => __( 'Buttons Wrapper Padding', 'auxin-shop' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} .aux-shop-btns-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->end_controls_section();

        /*  Filters Section
        /*-------------------------------------*/


        $this->start_controls_section(
            'filters_section',
            array(
                'label'      => __('Filters', 'auxin-shop' ),
                'tab'        => Controls_Manager::TAB_STYLE
            )
        );

        $this->add_control(
            'show_filters',
            array(
                'label'        => __('Display filters','auxin-shop' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'On', 'auxin-shop' ),
                'label_off'    => __( 'Off', 'auxin-shop' ),
                'return_value' => 'yes',
                'default'      => 'yes'
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'filter_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .aux-filters ul > li',
                'condition' => array(
                    'show_filters' => 'yes',
                ),
            )
        );

        $this->add_responsive_control(
            'filter_margin',
            array(
                'label'      => __( 'Filter Margin', 'auxin-shop' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} .aux-filters' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
                'condition' => array(
                    'show_filters' => 'yes'
                )
            )
        );

        $this->add_control(
            'filter_by',
            array(
                'label'       => __('Filter By', 'auxin-shop'),
                'description' => __('Filter by categories or tags', 'auxin-shop' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'product_cat',
                'options'     => array(
                    'product_filter'  => __('Filter', 'auxin-shop'),
                    'product_cat'     => __('Category', 'auxin-shop'),
                    'product_tag'     => __('Tag', 'auxin-shop')
                ),
                'condition' => array(
                    'show_filters' => 'yes'
                )
            )
        );

        $this->add_control(
            'filter_align',
            array(
                'label'       => __('Filter Control Alignment', 'auxin-shop'),
                'description' => __('Filter by categories or tags', 'auxin-shop' ),
                'type'        => Controls_Manager::CHOOSE,
                'style_items' => 'max-width:30%;',
                'default'     => 'aux-left',
                'options'     => array(
                    'aux-left' => array(
                        'title' => __( 'Left', 'auxin-shop' ),
                        'icon'  => 'fa fa-align-left',
                    ),
                    'aux-center' => array(
                        'title' => __( 'Center', 'auxin-shop' ),
                        'icon'  => 'fa fa-align-center',
                    ),
                    'aux-right' => array(
                        'title' => __( 'Right', 'auxin-shop' ),
                        'icon'  => 'fa fa-align-right',
                    )
                ),
                'devices'      => array('desktop'),
                'condition'    => array(
                    'show_filters' => 'yes'
                )
            )
        );

        $this->add_control(
            'filter_style',
            array(
                'label'       => __('Filter Button Style', 'auxin-shop'),
                'description' => __('Style of filter buttons.', 'auxin-shop' ),
                'type'        => 'aux-visual-select',
                'default'     => 'aux-slideup',
                'style_items' => 'max-width:200px;',
                'options'     => array(
                    'aux-slideup'      => array(
                        'label'     => __('Slide up' , 'auxin-shop'),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterSlideUp2.webm webm'
                    ),
                    'aux-fill'    => array(
                        'label'     => __('Fill' , 'auxin-shop'),
                        'video_src' => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterFill.webm webm'
                    ),
                    'aux-cube'     => array(
                        'label'     => __('Cube' , 'auxin-shop'),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterCube.webm webm'
                    ),
                    'aux-underline'     => array(
                        'label'     => __('Underline' , 'auxin-shop'),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterUnderline.mp4 mp4'
                    ),
                    'aux-overlay'    => array(
                        'label'     => __('Float frame' , 'auxin-shop'),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterFloatFrame.webm webm'
                    ),
                    'aux-bordered'     => array(
                        'label'     => __('Borderd' , 'auxin-shop'),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterBordered.mp4 mp4'
                    ),
                    'aux-overlay aux-underline-anim'     => array(
                        'label'     => __('Float underline' , 'auxin-shop'),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterUnderline.webm webm'
                    ),
                ),
                'condition' => array(
                    'show_filters' => 'yes'
                )
            )
        );

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  title_style_section
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'title_style_section',
            array(
                'label'     => __( 'Title', 'auxin-shop' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->start_controls_tabs( 'title_colors' );

        $this->start_controls_tab(
            'title_color_normal',
            array(
                'label' => __( 'Normal' , 'auxin-shop' ),
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->add_control(
            'title_color',
            array(
                'label' => __( 'Color', 'auxin-shop' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .auxshp-loop-title' => 'color: {{VALUE}};',
                ),
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_color_hover',
            array(
                'label' => __( 'Hover' , 'auxin-shop' ),
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->add_control(
            'title_hover_color',
            array(
                'label' => __( 'Color', 'auxin-shop' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .auxshp-loop-title:hover' => 'color: {{VALUE}};',
                ),
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .auxshp-loop-title',
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  price_style_section
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'price_style_section',
            array(
                'label'     => __( 'Price', 'auxin-shop' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => array(
                    'display_price' => 'yes',
                ),
            )
        );

        $this->start_controls_tabs( 'price_colors' );

        $this->start_controls_tab(
            'price_color_normal',
            array(
                'label' => __( 'Normal' , 'auxin-shop' ),
                'condition' => array(
                    'display_price' => 'yes',
                ),
            )
        );

        $this->add_control(
            'price_color',
            array(
                'label' => __( 'Color', 'auxin-shop' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .woocommerce-Price-amount' => 'color: {{VALUE}};',
                ),
                'condition' => array(
                    'display_price' => 'yes',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'price_color_hover',
            array(
                'label' => __( 'Hover' , 'auxin-shop' ),
                'condition' => array(
                    'display_price' => 'yes',
                ),
            )
        );

        $this->add_control(
            'price_hover_color',
            array(
                'label' => __( 'Color', 'auxin-shop' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .woocommerce-Price-amount:hover' => 'color: {{VALUE}};',
                ),
                'condition' => array(
                    'display_price' => 'yes',
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'price_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .woocommerce-Price-amount',
                'condition' => array(
                    'display_price' => 'yes',
                ),
            )
        );

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  info_style_section
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'info_style_section',
            array(
                'label'     => __( 'Product Info', 'auxin-shop' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => array(
                    'display_categories' => 'yes',
                ),
            )
        );

        $this->start_controls_tabs( 'info_colors' );

        $this->start_controls_tab(
            'info_color_normal',
            array(
                'label' => __( 'Normal' , 'auxin-shop' ),
                'condition' => array(
                    'display_categories' => 'yes',
                ),
            )
        );

        $this->add_control(
            'info_color',
            array(
                'label' => __( 'Color', 'auxin-shop' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .aux-shop-meta-terms > a' => 'color: {{VALUE}};',
                ),
                'condition' => array(
                    'display_categories' => 'yes',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'info_color_hover',
            array(
                'label' => __( 'Hover' , 'auxin-shop' ),
                'condition' => array(
                    'display_categories' => 'yes',
                ),
            )
        );

        $this->add_control(
            'info_hover_color',
            array(
                'label' => __( 'Color', 'auxin-shop' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .aux-shop-meta-terms > a:hover' => 'color: {{VALUE}};',
                ),
                'condition' => array(
                    'display_categories' => 'yes',
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'info_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .aux-shop-meta-terms, {{WRAPPER}} .aux-shop-meta-terms a',
                'condition' => array(
                    'display_categories' => 'yes',
                ),
            )
        );

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  Rating Style Section
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'rating_style_section',
            array(
                'label'     => __( 'Rating', 'auxin-shop' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => array(
                    'display_rating' => 'yes'
                )
            )
        );


        $this->add_control(
            'rating_empty_color',
            array(
                'label'     => __( 'Empty Color', 'auxin-shop' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .aux-rating-box.aux-star-rating::before' => 'color: {{VALUE}} !important;'
                )
            )
        );

        $this->add_control(
            'rating_fill_color',
            array(
                'label'     => __( 'Fill Color', 'auxin-shop' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .aux-rating-box.aux-star-rating span::before' => 'color: {{VALUE}} !important;'
                )
            )
        );

        $this->add_responsive_control(
            'rating_size',
            array(
                'label'      => __( 'Size', 'auxin-shop' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px', 'em', 'rem' ),
                'range' => array(
                    'px' => array(
                        'min' => 1,
                        'max' => 200
                    )
                ),
                'selectors' => array(
                    '{{WRAPPER}} .aux-star-rating' => 'font-size: {{SIZE}}{{UNIT}};'
                )
            )
        );


        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  Badge Style Section
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'badge_style_section',
            array(
                'label'     => __( 'Badge', 'auxin-shop' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => array(
                    'display_rating' => 'yes'
                )
            )
        );


        $this->start_controls_tabs( 'badge_colors' );

        $this->start_controls_tab(
            'badge_color_normal',
            array(
                'label' => __( 'Normal' , 'auxin-shop' ),
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->add_control(
            'badge_color',
            array(
                'label' => __( 'Color', 'auxin-shop' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .onsale' => 'color: {{VALUE}};',
                ),
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'badge_color_hover',
            array(
                'label' => __( 'Hover' , 'auxin-shop' ),
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->add_control(
            'badge_hover_color',
            array(
                'label' => __( 'Color', 'auxin-shop' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .onsale:hover' => 'color: {{VALUE}};',
                ),
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name' => 'badge_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .onsale',
                'condition' => array(
                    'display_title' => 'yes',
                ),
            )
        );

        $this->add_responsive_control(
            'wrapper_badge_padding',
            array(
                'label'      => __( 'Padding', 'auxin-shop' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} .onsale' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            array(
                'name' => 'header_background',
                'label' => __( 'Background', 'auxin-shop' ),
                'types' => array( 'classic', 'gradient' ),
                'selector' => '{{WRAPPER}} .onsale'
            )
        );

        $this->end_controls_section();

    }

  /**
   * Render image box widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function render() {

    $settings = $this->get_settings_for_display();

    $args     = array(
        'phone_cnum'          => $settings['columns_mobile'],
        'tablet_cnum'         => $settings['columns_tablet'],
        'desktop_cnum'        => $settings['columns'],
        'rows'                => $settings['rows'],
        'display_title'       => $settings['display_title'],
        'display_price'       => $settings['display_price'],
        'display_wishlist'    => $settings['display_wishlist'],
        'display_categories'  => $settings['display_categories'],
        'display_sale_badge'  => $settings['display_sale_badge'],
        'image_aspect_ratio'  => $settings['image_aspect_ratio'],
        'display_rating'      => $settings['display_rating'],
        'display_add_to_cart' => $settings['display_add_to_cart'],

        // Query section
        'show_filters'          => $settings['show_filters'],
        'filter_by'             => $settings['filter_by'],
        'filter_style'          => $settings['filter_style'],
        'filter_align'          => $settings['filter_align'],

        // Query section
        'cat'                   => $settings['cat'],
        'exclude_without_media' => $settings['exclude_without_media'],
        'order_by'              => $settings['order_by'],
        'order'                 => $settings['order'],
        'include'               => $settings['include'],
        'exclude'               => $settings['exclude'],
        'only_products__in'     => $settings['only_products__in'],

    );  
    
    // // get the shortcode base blog page
    echo auxin_widget_the_advance_recent_products_callback( $args );

  }

}
