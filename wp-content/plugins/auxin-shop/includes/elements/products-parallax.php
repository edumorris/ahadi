<?php
/**
 * Code highlighter element
 *
 * 
 * @package    
 * @license    LICENSE.txt
 * @author     
 * @link       https://bitbucket.org/averta/
 * @copyright  (c) 2010-2018 
 */

function auxin_get_products_parallax_master_array( $master_array ) {

    $master_array['aux_products_parallax'] = array(
        'name'                          => __('Products Parallax', 'auxin-shop' ),
        'auxin_output_callback'         => 'auxin_widget_products_parallax_callback',
        'base'                          => 'aux_products_parallax',
        'description'                   => __('It adds recent products in grid or carousel mode.', 'auxin-shop' ),
        'class'                         => 'aux-widget-recent-products-parallax',
        'show_settings_on_create'       => true,
        'weight'                        => 1,
        'is_widget'                     => false,
        'is_shortcode'                  => true,
        'is_so'                         => true,
        'is_vc'                         => true,
        'category'                      => THEME_NAME,
        'group'                         => '',
        'admin_enqueue_js'              => '',
        'admin_enqueue_css'             => '',
        'front_enqueue_js'              => '',
        'front_enqueue_css'             => '',
        'icon'                          => 'aux-element aux-pb-icons-grid',
        'custom_markup'                 => '',
        'js_view'                       => '',
        'html_template'                 => '',
        'deprecated'                    => '',
        'content_element'               => '',
        'as_parent'                     => '',
        'as_child'                      => '',
        'params' => array(
            array(
                'heading'          => __('Title','auxin-shop' ),
                'description'      => __('Recent products title, leave it empty if you don`t need title.', 'auxin-shop'),
                'param_name'       => 'title',
                'type'             => 'textfield',
                'value'            => '',
                'holder'           => 'textfield',
                'class'            => 'title',
                'admin_label'      => false,
                'dependency'       => '',
                'weight'           => '',
                'group'            => '',
                'edit_field_class' => ''
            ),
            array(
                'heading'          => __('Subtitle','auxin-shop' ),
                'description'      => __('Recent products subtitle, leave it empty if you don`t need title.', 'auxin-shop'),
                'param_name'       => 'subtitle',
                'type'             => 'textfield',
                'value'            => '',
                'holder'           => 'textfield',
                'class'            => 'title',
                'admin_label'      => false,
                'dependency'       => '',
                'weight'           => '',
                'group'            => '',
                'edit_field_class' => ''
            ),
            array(
                'heading'           => __('Categories', 'auxin-shop'),
                'description'       => __('Specifies a category that you want to show posts from it.', 'auxin-shop' ),
                'param_name'        => 'cat',
                'type'              => 'aux_taxonomy',
                'taxonomy'          => 'product_cat',
                'def_value'         => ' ',
                'holder'            => '',
                'class'             => 'cat',
                'value'             => ' ', // should use the taxonomy name
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Query',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __('Use Custom Aspect Ratio', 'auxin-shop'),
                'description'       => '',
                'param_name'        => 'custom_image_aspect_ratio',
                'type'              => 'aux_switch',
                'def_value'         => '0',
                'holder'            => '',
                'class'             => 'order',
                'value'             => false,
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => '',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __('Image aspect ratio', 'auxin-shop'),
                'description'       => '',
                'param_name'        => 'image_aspect_ratio',
                'type'              => 'dropdown',
                'def_value'         => '0.75',
                'holder'            => '',
                'class'             => 'order',
                'value'             =>array (
                    '0.75'          => __('Horizontal 4:3' , 'auxin-shop'),
                    '0.56'          => __('Horizontal 16:9', 'auxin-shop'),
                    '1.00'          => __('Square 1:1'     , 'auxin-shop'),
                    '1.33'          => __('Vertical 3:4'   , 'auxin-shop'),
                    '1.5'           => __('Vertical 2:3'   , 'auxin-shop')
                ),
                'admin_label'       => false,
                'dependency'        => array(
                    'element'       => 'custom_image_aspect_ratio',
                    'value'         => '1'
                ),
                'weight'            => '',
                'group'             => '',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __('Exclude posts without media','auxin-shop' ),
                'description'       => '',
                'param_name'        => 'exclude_without_media',
                'type'              => 'aux_switch',
                'value'             => '0',
                'class'             => '',
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Query',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __('Order by', 'auxin-shop'),
                'description'       => '',
                'param_name'        => 'order_by',
                'type'              => 'dropdown',
                'def_value'         => 'date',
                'holder'            => '',
                'class'             => 'order_by',
                'value'             => array (
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
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Query',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __('Order', 'auxin-shop'),
                'description'       => '',
                'param_name'        => 'order',
                'type'              => 'dropdown',
                'def_value'         => 'DESC',
                'holder'            => '',
                'class'             => 'order',
                'value'             =>array (
                    'DESC'          => __('Descending', 'auxin-shop'),
                    'ASC'           => __('Ascending', 'auxin-shop'),
                ),
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Query',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __('Only products','auxin-shop' ),
                'description'       => __('If you intend to display ONLY specific products, you should specify the products here. You have to insert the Products IDs that are separated by comma (eg. 53,34,87,25).', 'auxin-shop' ),
                'param_name'        => 'only_products__in',
                'type'              => 'textfield',
                'value'             => '',
                'holder'            => '',
                'class'             => '',
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Query',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __('Include products','auxin-shop' ),
                'description'       => __('If you intend to include additional products, you should specify the products here. You have to insert the Products IDs that are separated by comma (eg. 53,34,87,25)', 'auxin-shop' ),
                'param_name'        => 'include',
                'type'              => 'textfield',
                'value'             => '',
                'holder'            => '',
                'class'             => '',
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Query',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __('Exclude products','auxin-shop' ),
                'description'       => __('If you intend to exclude specific products from result, you should specify the products here. You have to insert the Products IDs that are separated by comma (eg. 53,34,87,25)', 'auxin-shop' ),
                'param_name'        => 'exclude',
                'type'              => 'textfield',
                'value'             => '',
                'holder'            => '',
                'class'             => '',
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Query',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __('Start offset','auxin-shop' ),
                'description'       => __('Number of products to displace or pass over.', 'auxin-shop' ),
                'param_name'        => 'offset',
                'type'              => 'textfield',
                'value'             => '',
                'holder'            => '',
                'class'             => '',
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Query',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Show filters', 'auxin-shop' ),
                'description'       => '',
                'param_name'        => 'show_filters',
                'type'              => 'aux_switch',
                'value'             => '1',
                'class'             => '',
                'admin_label'       => false,
                'weight'            => '',
                'group'             => 'Filter',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Filter by', 'auxin-shop' ),
                'description'       => __( 'Filter by categories or tags', 'auxin-shop' ),
                'param_name'        => 'filter_by',
                'type'              => 'dropdown',
                'def_value'         => 'portfolio-filter',
                'holder'            => 'dropdown',
                'value'             =>array (
                    'product_cat'     => __( 'Category', 'auxin-shop' ),
                    'product_tag'     => __( 'Tag', 'auxin-shop' )
                ),
                'dependency'        => array(
                    'element'       => 'show_filters',
                    'value'         => '1'
                ),
                'weight'            => '',
                'group'             => 'Filter',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Filter Control Alignment', 'auxin-shop' ),
                'param_name'        => 'filter_align',
                'type'              => 'aux_visual_select',
                'def_value'         => 'aux-center',
                'holder'            => '',
                'choices'           => array(
                    'aux-left'      => array(
                        'label'     => __('Left' , 'auxin-shop'),
                        'image'     => AUXIN_URL . 'images/visual-select/filter-left.svg'
                    ),
                    'aux-center'    => array(
                        'label'     => __('Center' , 'auxin-shop'),
                        'image'     => AUXIN_URL . 'images/visual-select/filter-mid.svg'
                    ),
                    'aux-right'     => array(
                        'label'     => __('Right' , 'auxin-shop'),
                        'image'     => AUXIN_URL . 'images/visual-select/filter-right.svg'
                    )
                ),
                'dependency'        => array(
                    'element'       => 'show_filters',
                    'value'         => '1'
                ),
                'weight'            => '',
                'group'             => 'Filter',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Filter button style', 'auxin-shop' ),
                'description'       => __( 'Style of filter buttons.', 'auxin-shop' ),
                'param_name'        => 'filter_style',
                'type'              => 'aux_visual_select',
                'def_value'         => 'aux-slideup',
                'holder'            => '',
                'dependency'        => array(
                    'element'       => 'show_filters',
                    'value'         => '1'
                ),
                'weight'            => '',
                'group'             => 'Filter',
                'edit_field_class'  => '',
                'choices'           => array(
                    'aux-slideup'      => array(
                        'label'     => __( 'Slide up' , 'auxin-shop' ),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterSlideUp2.webm webm'
                    ),
                    'aux-fill'    => array(
                        'label'     => __( 'Fill' , 'auxin-shop' ),
                        'video_src' => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterFill.webm webm'
                    ),
                    'aux-cube'     => array(
                        'label'     => __( 'Cube' , 'auxin-shop' ),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterCube.webm webm'
                    ),
                    'aux-underline'     => array(
                        'label'     => __( 'Underline' , 'auxin-shop' ),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterUnderline.mp4 mp4'
                    ),
                    'aux-overlay'    => array(
                        'label'     => __( 'Float frame' , 'auxin-shop' ),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterFloatFrame.webm webm'
                    ),
                    'aux-bordered'     => array(
                        'label'     => __( 'Borderd' , 'auxin-shop' ),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterBordered.mp4 mp4'
                    ),
                    'aux-overlay aux-underline-anim'     => array(
                        'label'     => __( 'Float underline' , 'auxin-shop' ),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterUnderline.webm webm'
                    ),
                    'aux-dropdown-filter'     => array(
                        'label'     => __( 'DropDown' , 'auxin-shop' ),
                        'video_src'     => AUXSHP_ADMIN_URL . '/assets/images/preview/FilterUnderline.webm webm'
                    ),
                ),
            ),
            array(
                'heading'           => __( 'Display product title', 'auxin-shop' ),
                'description'       => '',
                'param_name'        => 'display_title',
                'type'              => 'aux_switch',
                'value'             => '1',
                'class'             => 'display_title',
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => __( 'Info', 'auxin-shop' ),
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Display products price', 'auxin-shop' ),
                'param_name'        => 'display_price',
                'type'              => 'aux_switch',
                'def_value'         => '',
                'value'             => '1',
                'holder'            => '',
                'class'             => 'display_price',
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => __( 'Info', 'auxin-shop' ),
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Display add to cart', 'auxin-shop' ),
                'description'       => '',
                'param_name'        => 'display_add_to_cart',
                'type'              => 'aux_switch',
                'value'             => '1',
                'holder'            => '',
                'class'             => 'display_add_to_cart',
                'admin_label'       => false,
                'dependency'        => array(
                    'element'       => 'show_info',
                    'value'         => '1'
                ),
                'weight'            => '',
                'group'             => __( 'Info', 'auxin-shop' ),
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Display Categories', 'auxin-shop' ),
                'description'       => '',
                'param_name'        => 'display_categories',
                'type'              => 'aux_switch',
                'value'             => '1',
                'holder'            => '',
                'class'             => 'display_categories',
                'admin_label'       => false,
                'dependency'        => array(
                    'element'       => 'show_info',
                    'value'         => '1'
                ),
                'weight'            => '',
                'group'             => __( 'Info', 'auxin-shop' ),
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Display share', 'auxin-shop' ),
                'param_name'        => 'display_share',
                'type'              => 'aux_switch',
                'def_value'         => '',
                'value'             => '1',
                'holder'            => '',
                'class'             => 'display_share',
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => __( 'Info', 'auxin-shop' ),
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Display add to wishlist', 'auxin-shop' ),
                'param_name'        => 'display_wishlist',
                'type'              => 'aux_switch',
                'def_value'         => '',
                'value'             => '1',
                'holder'            => '',
                'class'             => 'display_wishlist',
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => __( 'Info', 'auxin-shop' ),
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Display Sale Badge', 'auxin-shop' ),
                'description'       => '',
                'param_name'        => 'display_sale_badge',
                'type'              => 'aux_switch',
                'value'             => '1',
                'holder'            => '',
                'class'             => 'display_sale_badge',
                'admin_label'       => false,
                'weight'            => '',
                'group'             => __( 'Info', 'auxin-shop' ),
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Display Colorized Shadow', 'auxin-shop' ),
                'description'       => '',
                'param_name'        => 'colorized_shadow',
                'type'              => 'aux_switch',
                'value'             => '1',
                'holder'            => '',
                'class'             => 'colorized_shadow',
                'admin_label'       => false,
                'weight'            => '',
                'group'             => 'Effects',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Tilt Effect', 'auxin-shop' ),
                'description'       => '',
                'param_name'        => 'tilt',
                'type'              => 'aux_switch',
                'value'             => '1',
                'holder'            => '',
                'class'             => 'tilt',
                'admin_label'       => false,
                'weight'            => '',
                'group'             => 'Effects',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Number of columns', 'auxin-shop'),
                'description'       => '',
                'param_name'        => 'desktop_cnum',
                'type'              => 'dropdown',
                'def_value'         => '4',
                'holder'            => '',
                'class'             => 'num',
                'value'             => array(
                    '2' => '2', '3' => '3',
                    '4'  => '4', '5' => '5'
                ),
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Layout',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Number of rows', 'auxin-shop'),
                'description'       => '',
                'param_name'        => 'rows',
                'type'              => 'dropdown',
                'def_value'         => '2',
                'holder'            => '',
                'class'             => 'num',
                'value'             => array(
                    '2' => '2', '3' => '3',
                    '4'  => '4', '5' => '5'
                ),
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Layout',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Number of columns in tablet size', 'auxin-shop'),
                'description'       => '',
                'param_name'        => 'tablet_cnum',
                'type'              => 'dropdown',
                'def_value'         => 'inherit',
                'holder'            => '',
                'class'             => 'num',
                'value'             => array(
                    'inherit' => 'Inherited from larger',
                    '1'  => '1', '2' => '2', '3' => '3',
                    '4'  => '4', '5' => '5',
                ),
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Layout',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Number of columns in phone size', 'auxin-shop' ),
                'description'       => '',
                'param_name'        => 'phone_cnum',
                'type'              => 'dropdown',
                'def_value'         => '1',
                'holder'            => '',
                'class'             => 'num',
                'value'             => array(
                    '1' => '1', '2' => '2', '3' => '3'
                ),
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => 'Layout',
                'edit_field_class'  => ''
            ),
            array(
                'heading'           => __( 'Extra class name', 'auxin-shop' ),
                'description'       => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'auxin-shop' ),
                'param_name'        => 'extra_classes',
                'type'              => 'textfield',
                'value'             => '',
                'def_value'         => '',
                'holder'            => '',
                'class'             => 'extra_classes',
                'admin_label'       => false,
                'dependency'        => '',
                'weight'            => '',
                'group'             => '',
                'edit_field_class'  => ''
            )
        )
    );

    return $master_array;
}

add_filter( 'auxin_master_array_shortcodes', 'auxin_get_products_parallax_master_array', 10, 1 );




/**
 * Element without loop and column
 * The front-end output of this element is returned by the following function
 *
 * @param  array  $atts              The array containing the parsed values from shortcode, it should be same as defined params above.
 * @param  string $shortcode_content The shorcode content
 * @return string                    The output of element markup
 */
function auxin_widget_products_parallax_callback( $atts, $shortcode_content = null ){

    global $aux_content_width;
    // Defining default attributes
    $default_atts = array(
        'title'                       => '',    // header title (required)
        'subtitle'                    => '',    // header subtitle
        'cat'                         => ' ',
        'only_products__in'           => '',   // display only these post IDs. array or string comma separated
        'include'                     => '',    // include these post IDs in result too. array or string comma separated
        'exclude'                     => '',    // exclude these post IDs from result. array or string comma separated
        'offset'                      => '',
        'paged'                       => '',
        'post_type'                   => 'product',
        'taxonomy_name'               => 'product_cat', // the taxonomy that we intent to display in post info
        'tax_args'                    => '',
        'order_by'                    => 'date',
        'order'                       => 'DESC',

        'exclude_without_media'       => 0,
        'exclude_custom_post_formats' => 0,
        'exclude_quote_link'          => 0,
        'exclude_post_formats_in'     => array(), // the list od post formats to exclude

        'size'                        => '',
        'display_title'               => true,
        'display_share'               => true,
        'show_media'                  => true,
        'display_wishlist'            => true,
        'display_categories'          => true,
        'display_price'               => true,
        'display_add_to_cart'         => true,
        'display_sale_badge'          => true,
        'colorized_shadow'            => true,
        'tilt'                        => true,
        'content_layout'              => '', // entry-boxed
        'excerpt_len'                 => '160',
        'show_excerpt'                => true,
        'show_info'                   => true,
        'show_date'                   => true,
        'post_info_position'          => 'after-title',
        'author_or_readmore'          => 'readmore', // readmore, author, none
        'image_aspect_ratio'          => 0.75,
        'custom_image_aspect_ratio'   => 0,
        'desktop_cnum'                => 4,
        'tablet_cnum'                 => 'inherit',
        'phone_cnum'                  => '1',
        'rows'                        => '2',

        'show_filters'                => '1',
        'filter_by'                   => 'product_cat',
        'filter_style'                => 'aux-slideup',
        'filter_align'                => 'aux-center',

        'extra_classes'               => '',
        'extra_column_classes'        => 'aux-masonry-animation',
        'custom_el_id'                => '',

        'request_from'                => 'element',

        'template_part_file'          => 'elements/products-parallax',
        'extra_template_path'         =>  AUXSHP_PUB_DIR . '/templates/',

        'universal_id'                => '',
        'use_wp_query'                => false, // true to use the global wp_query, false to use internal custom query
        'reset_query'                 => true,
        'wp_query_args'               => array(), // additional wp_query args
        'custom_wp_query'             => '',
        'base'                        => 'aux_products_parallax',
        'base_class'                  => 'aux-widget-recent-products-parallax'
    );

    $result = auxin_get_widget_scafold( $atts, $default_atts, $shortcode_content );
    extract( $result['parsed_atts'] );

    // get content width
    global $aux_content_width;

    // Calculate number of posts we need to show. Based on desktop_cnum and rows
    $num = ( $desktop_cnum * $rows ) - floor( $desktop_cnum / 2 );

    // --------------

    ob_start();


    if( empty( $cat ) || $cat == " " || ( is_array( $cat ) && in_array( " ", $cat ) ) ) {
        $tax_args = array();
    } else {
        $tax_args = array(
            array(
                'taxonomy' => $taxonomy_name,
                'field'    => 'term_id',
                'terms'    => ! is_array( $cat ) ? explode( ",", $cat ) : $cat
            )
        );
    }

    if( $custom_wp_query ){
        $wp_query = $custom_wp_query;

    } elseif( ! $use_wp_query ){

        // create wp_query to get latest items ---------------------------------
        $args = array(
            'post_type'               => $post_type,
            'orderby'                 => $order_by,
            'order'                   => $order,
            'offset'                  => $offset,
            'paged'                   => $paged,
            'tax_query'               => $tax_args,
            'post_status'             => 'publish',
            'posts_per_page'          => $num,
            'ignore_sticky_posts'     => 1,

            'include_posts__in'       => $include, // include posts in this list
            'posts__not_in'           => $exclude, // exclude posts in this list
            'posts__in'               => $only_products__in, // only posts in this list

            'exclude_without_media'   => $exclude_without_media,
            'exclude_post_formats_in' => $exclude_post_formats_in
        );

        // ---------------------------------------------------------------------

        // add the additional query args if available
        if( $wp_query_args ){
            $args = wp_parse_args( $wp_query_args, $args );
        }

        // pass the args through the auxin query parser
        $wp_query = new WP_Query( auxin_parse_query_args( $args ) );
    } else {

        global $wp_query;
    }

   // widget header ------------------------------
    echo $result['widget_header'];
    echo $result['widget_title'];

    if ( ! empty( $subtitle ) ) {
        echo '<h4 class="aux-h4 widget-subtitle aux-recent-product-parallax-subtitle">' . $subtitle . '</h4>';
    }


    if ( $show_filters ) {

        $terms = get_terms(
            array(
                'taxonomy'   => $filter_by,
                'meta_query' => array(
                    'relation' => 'OR',
                    array(
                        'meta_key' => 'tax_position',
                    )
                ),
                'orderby' => 'tax_position',
                'hide_empty' => true
            )
        );


        if ( $terms ) {

            $list_output  = '<ul>';
            $list_output .= '<li class="aux-active-item" data-filter="all"><a href="#"><span data-select="' . __( 'all', 'auxin-shop' ) . '">' . __( 'all', 'auxin-shop' ) . '</span></a></li>';

            foreach ( $terms as $term ) {
                $list_output .= '<li data-filter="'.$term->slug.'"><a href="#"><span data-select="'.$term->name.'">'.$term->name.'</span></a></li>';
            }

            $output_classes  = 'aux-ajax-filters aux-filters ' . $filter_style . ' ' . $filter_align . ' ';
            $output_classes .= 'aux-dropdown-filter' != $filter_style ? 'aux-togglable ':                         '';

            $filter_output   = '<div class="' . esc_attr( $output_classes ) . '" data-num="'. $num .'" data-order="'. $order .'" data-orderby="'. $order_by .'" data-taxonomy="'. $filter_by .'" data-n="'. wp_create_nonce( 'aux_ajax_filter_request' ) .'">' ;
            $filter_output  .= $list_output . '</ul>';
            $filter_output  .= '</div>';

            echo $filter_output;
        }

    }


    $phone_break_point     = 767;
    $tablet_break_point    = 992;

    $column_class          = '';
    $item_class            = 'aux-col aux-masonry-animation-col';

    $columns_custom_styles = '';

    if ( auxin_is_true( $tilt ) ) {
        $item_class .= ' item-tilt-default';
    }

    // generate columns class
    $column_class  = ' aux-row products-loop aux-move-parallel aux-de-col' . $desktop_cnum;

    $column_class .= 'entry-boxed' == $content_layout  ? ' aux-entry-boxed' : '';

    // Specifies whether the columns have footer meta or not
    $column_class  .= ' aux-ajax-view  ' . $extra_column_classes;

    if ( ! auxin_is_true( $custom_image_aspect_ratio ) ) {
        $size = 'full';
    }

    // automatically calculate the media size if was empty
    if( empty( $size ) ){
        $column_media_width = auxin_get_content_column_width( $desktop_cnum, 15 );
        $size = array( 'width' => $column_media_width, 'height' => $column_media_width * $image_aspect_ratio );
    }

    $have_posts = $wp_query->have_posts();

    if( $have_posts ){

        echo sprintf( '<div data-element-id="%s" class="%s">', esc_attr( $universal_id ), esc_attr( $column_class ));

        $posts_temp = $wp_query->posts;
        $i = 0;
        foreach ( $wp_query->posts as $post ) {
            $post->order_num = ++$i;
        }

        $i = 0;
        foreach ( $wp_query->posts as $post ) {
            $post->order_num = ++$i;
        }

        $threshold = $num % $desktop_cnum;

        $extra_posts = array_slice( $posts_temp, -$threshold );
        $temp_posts = array_slice( $posts_temp , 0, count( $posts_temp ) - $threshold );

        foreach ( $temp_posts as $index => $post_data ) {
            $post_data->col_num = $index % $desktop_cnum + 1;
            $column_data[ $index % $desktop_cnum ][] = $post_data;
        }

        foreach ( $extra_posts as $index => $post_data ) {
            $col_num = ($index ) % $desktop_cnum;
            if ( $col_num % 2 === 0 ) {
                $post_data->col_num = $col_num + 1;
                $column_data[ $col_num ][] = $post_data;
            } else {
                $post_data->col_num = $col_num + 2;
                $column_data[ $col_num + 1 ][] = $post_data;
            }
        }

        foreach ( $column_data as $index => $post_item ) {
            $post_item[0]->open_tag = true;
            end( $post_item )->close_tag = true;
            if ( $index % 2 !== 0 ) {
                $post_item[0]->col_is_shorter = true;
            }
        }

        $ordered_posts = array();
        foreach ( $column_data as $arr ) {
            $ordered_posts = array_merge( $ordered_posts, $arr );
        }

        $wp_query->posts = $ordered_posts;

        while ( $wp_query->have_posts() ) {

            $wp_query->the_post();
            $post = get_post();

            $the_format = get_post_format( $post );

            // add specific class to current classes for each column
            $special_class = isset( $wp_query->posts[$wp_query->current_post]->col_is_shorter ) ? 'aux-shortest-col' : '';
            if ( isset( $wp_query->posts[$wp_query->current_post]->open_tag ) ) {
                printf( '<div class="%s %s">', esc_attr( $item_class ), esc_attr( $special_class ) );
            }

            include auxin_get_template_file( $template_part_file, '', $extra_template_path );

            if ( isset( $wp_query->posts[$wp_query->current_post]->close_tag ) ) {
                echo '</div>';
            }

        }

        echo '</div>';

        // Add a new wrapper for responve split
        echo sprintf( '<div data-element-id="%s" class="%s"></div>', esc_attr( $universal_id ), esc_attr( 'aux-row aux-parallax-split aux-hide products-loop aux-tb-col'.$tablet_cnum . ' aux-mb-col'.$phone_cnum ) );

         // print the custom inline style if available
        echo $columns_custom_styles ? "<style>$columns_custom_styles</style>" : '';
    }

    if( $reset_query ){
        wp_reset_postdata();
    }

    // return false if no result found
    if( ! $have_posts ){
        ob_get_clean();
        return false;
    }

    // widget footer ------------------------------
    echo $result['widget_footer'];

    return ob_get_clean();
}
