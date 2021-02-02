<?php

/**
 * General WordPress Hooks
 *
 * 
 * @package    
 * @license    LICENSE.txt
 * @author     
 * @link       https://bitbucket.org/averta/
 * @copyright  (c) 2010-2018 
 */



/**
 * Outputs theme options for Products
 *
 * 
 * @package    
 * @license    LICENSE.txt
 * @author     
 * @link       https://bitbucket.org/averta/
 * @copyright  (c) 2010-2018 
 */
function auxin_define_product_theme_options( $fields_sections_list ){

    $options  = $fields_sections_list['fields'  ];
    $sections = $fields_sections_list['sections'];

    /* ---------------------------------------------------------------------------------------------------
        Products Section
    --------------------------------------------------------------------------------------------------- */

    // Shop page section      ==================================================================

    $options[] = array(
        'title'       => __( 'Pagination Skin', THEME_DOMAIN ),
        'description' => __( 'Specifies the default skin for site pagination.', THEME_DOMAIN ),
        'id'          => 'product_index_pagination_skin',
        'section'     => 'product-section-archive',
        'type'        => 'radio-image',
        'choices'     => array(
            'aux-round aux-page-no-border' => array(
                'label' => __( 'Round, No Page Border', THEME_DOMAIN ),
                'image' => AUXIN_URL . 'images/visual-select/paginationstyle-5.svg'
            ),
            'aux-round aux-no-border' => array(
                'label' => __( 'Round, No Border', THEME_DOMAIN ),
                'image' => AUXIN_URL . 'images/visual-select/paginationstyle-6.svg'
            ),
            'aux-round' => array(
                'label' => __( 'Round, With Border', THEME_DOMAIN ),
                'image' => AUXIN_URL . 'images/visual-select/paginationstyle-4.svg'
            ),
            'aux-square aux-page-no-border' => array(
                'label' => __( 'Square, No Page Border', THEME_DOMAIN ),
                'image' => AUXIN_URL . 'images/visual-select/paginationstyle-2.svg'
            ),
            'aux-square aux-no-border' => array(
                'label' => __( 'Square, No Border', THEME_DOMAIN ),
                'image' => AUXIN_URL . 'images/visual-select/paginationstyle-3.svg'
            ),
            'aux-square' => array(
                'label' => __( 'Square, With Border', THEME_DOMAIN ),
                'image' => AUXIN_URL . 'images/visual-select/paginationstyle-1.svg'
            )
        ),
        'post_js'   => '$(".content .aux-pagination").prop("class", "aux-pagination " + to );',
        'transport' => 'postMessage',
        'default'   => 'aux-square'
    );

    $options[] = array(
        'title'       => __( 'Thumbnail aspect ratio', THEME_DOMAIN ),
        'description' => '',
        'id'          => 'product_index_thumb_ratio',
        'section'     => 'product-section-archive',
        'type'        => 'select',
        'choices'     => array(
            '0.75'          => __( 'Horizontal 4:3' , THEME_DOMAIN ),
            '0.56'          => __( 'Horizontal 16:9', THEME_DOMAIN ),
            '1.00'          => __( 'Square 1:1'     , THEME_DOMAIN ),
            '1.33'          => __( 'Vertical 3:4'   , THEME_DOMAIN )
        ),
        'transport'   => 'refresh',
        'default'     => '1.33',
    );

    $options[] =    array(
        'title'       => __( 'Display Top Content Margin', 'auxin-shop' ),
        'description' => __( 'Enable it to display a space between title and content. If you need to start your content from very top of the page, disable it.', 'auxin-shop' ),
        'id'          => 'product_index_top_content_margin',
        'section'     => 'product-section-archive',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Custom Sales Badge', 'auxin-shop' ),
        'description' => __( 'Enable it to display the amount of sale with percentage', 'auxin-shop' ),
        'id'          => 'product_index_custom_sale_badge',
        'section'     => 'product-section-archive',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '0',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Image Flipper', 'auxin-shop' ),
        'description' => __( 'Enable a secondary product thumbnail on product archives.', 'auxin-shop' ),
        'id'          => 'product_index_display_image_flipper',
        'section'     => 'product-section-archive',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Product Star Ratings', 'auxin-shop' ),
        'description' => __( 'Enable it to display star ratings section in archive page.', 'auxin-shop' ),
        'id'          => 'product_index_display_star_rating',
        'section'     => 'product-section-archive',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Wishlist', 'auxin-shop' ),
        'description' => __( 'Enable it to display wishlist button in archive page.', 'auxin-shop' ),
        'id'          => 'product_index_display_wishlist',
        'section'     => 'product-section-archive',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Product Share', 'auxin-shop' ),
        'description' => __( 'Enable it to display Share button in archive page.', 'auxin-shop' ),
        'id'          => 'product_index_display_share',
        'section'     => 'product-section-archive',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Add To Cart', 'auxin-shop' ),
        'description' => __( 'Enable it to display Add To Cart button in archive page.', 'auxin-shop' ),
        'id'          => 'product_index_display_add_to_cart',
        'section'     => 'product-section-archive',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Enable AJAX Add To Cart', 'auxin-shop' ),
        'description' => __( 'Enable this option to activate AJAX add to cart buttons in archive page.', 'auxin-shop' ),
        'id'          => 'product_index_ajax_add_to_cart',
        'section'     => 'product-section-archive',
        'dependency'  => array(
            array(
                'id'       => 'product_index_display_add_to_cart',
                'value'    => array('1'),
                'operator' => ''
            )
        ),
        'transport'   => 'refresh',
        'default'     => '0',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Product Categories', 'auxin-shop' ),
        'description' => __( 'Enable it to display category section in archive page.', 'auxin-shop' ),
        'id'          => 'product_index_display_category',
        'section'     => 'product-section-archive',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] = array(
        'title'       => __('Display Title Bar?', 'auxin-shop'),
        'description' => __('Specifies whether to display the title bar at top of product archive page or not.', 'auxin-shop'),
        'id'          => 'product_archive_titlebar_enabled',
        'section'     => 'product-section-archive',
        'dependency'  => array(),
        'partial'     => array(
            'selector'              => 'body.archive .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'transport'   => 'postMessage',
        'default'     => '1',
        'type'        => 'switch'
    );


    $options[] = array(
        'title'       => __('Display Breadcrumb?', 'auxin-shop'),
        'description' => __('Specifies whether to display the breadcrumb in title bar of product archive page or not.', 'auxin-shop'),
        'id'          => 'product_archive_titlebar_breadcrumb_enabled',
        'section'     => 'product-section-archive',
        'dependency'  => array(
            array(
                'id'      => 'product_archive_titlebar_enabled',
                'value'   => '1'
            )
        ),
        'partial'       => array(
            'selector'              => 'body.archive .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'transport'   => 'postMessage',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] = array(
        'title'       => __('Display Title?', 'auxin-shop'),
        'description' => __('Specifies whether to display the title in title bar of product archive page or not.', 'auxin-shop'),
        'id'          => 'product_archive_titlebar_title_enabled',
        'section'     => 'product-section-archive',
        'dependency'  => array(
            array(
                'id'      => 'product_archive_titlebar_enabled',
                'value'   => '1'
            )
        ),
        'partial'       => array(
            'selector'              => 'body.archive .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'transport'   => 'postMessage',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] = array(
        'title'       => __('Custom Title', 'auxin-shop'),
        'description' => '',
        'id'          => 'product_archive_titlebar_title_context',
        'section'     => 'product-section-archive',
        'dependency'  => array(
            array(
                'id'      => 'product_archive_titlebar_enabled',
                'value'   => '1'
            ),
            array(
                'id'      => 'product_archive_titlebar_title_enabled',
                'value'   => '1'
            )
        ),
        'partial'       => array(
            'selector'              => 'body.archive .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'transport'   => 'postMessage',
        'default'     => '',
        'type'        => 'text'
    );    

    $options[] = array(
        'title'       => __('Disable Woocommerce Page Title', 'auxin-shop'),
        'description' => __('Disable the Woocommerce\'s default header title.', 'auxin-shop'),
        'id'          => 'product_archive_disable_page_title',
        'section'     => 'product-section-archive',
        'dependency'  => array(),
        'transport'   => 'refresh',
        'default'     => '0',
        'type'        => 'switch'
    );    

    $options[] = array(
        'title'       => __('Display Breadcrumb?', 'auxin-shop'),
        'description' => __('Display breadcrumb instead of woocommerce default header title.', 'auxin-shop'),
        'id'          => 'product_archive_display_breadcrumb_header',
        'section'     => 'product-section-archive',
        'dependency'  => array(
            array(
                'id'      => 'product_archive_disable_page_title',
                'value'   => '1'
            )
        ),
        'transport'   => 'refresh',
        'default'     => '0',
        'type'        => 'switch'
    );    

    // Single product section ==================================================================

    $options[] = array(
        'title'       => __( 'Single Product Template', 'auxin-shop' ),
        'description' => sprintf( "%s <br><br>%s" , __( 'Specifies the single product layout.', 'auxin-shop' ), sprintf( __( '%s Note%s: In order to use of "Slider", "Wide" & "Centered wide" templates, you are expected to install and activate "Master Slider" plugin.', 'auxin-shop' ), '<strong>', '</strong>' ) ),
        'id'          => 'product_single_template',
        'section'     => 'product-section-single',
        'dependency'  => array(),
        'choices'     => array(
            // 'classic'     => array(
            //     'label'     => __( 'Classic', 'auxin-shop' ),
            //     'image'     => AUXIN_URL . 'images/visual-select/product-single-wide.svg'
            // ),
            'slider'     => array(
                'label'     => __( 'Slider', 'auxin-shop' ),
                'image'     => AUXSHP_ADMIN_URL . '/assets/images/visual-select/shop-single-1.svg'
            ),
            'grid'        => array(
                'label'     => __( 'Grid gallery', 'auxin-shop' ),
                'image'     => AUXSHP_ADMIN_URL . '/assets/images/visual-select/shop-single-5.svg'
            ),
            'stack'        => array(
                'label'     => __( 'Stack gallery', 'auxin-shop' ),
                'image'     => AUXSHP_ADMIN_URL . '/assets/images/visual-select/shop-single-3.svg'
            ),
            'sticky'      => array(
                'label'     => __( 'Sticky gallery', 'auxin-shop' ),
                'image'     => AUXSHP_ADMIN_URL . '/assets/images/visual-select/shop-single-2.svg'
            ),
            'wide'        => array(
                'label'     => __( 'Wide', 'auxin-shop' ),
                'image'     => AUXSHP_ADMIN_URL . '/assets/images/visual-select/shop-single-6.svg'
            ),
            'wide-center' => array(
                'label'     => __( 'Centered wide', 'auxin-shop' ),
                'image'     => AUXSHP_ADMIN_URL . '/assets/images/visual-select/shop-single-4.svg'
            )
        ),
        'default'     => 'slider',
        'type'        => 'radio-image',
        'transport'   => 'refresh'
    );

    $options[] = array(
        'title'       => __( 'Use default WooCommerce Slider', 'auxin-shop' ),
        'description' => __( 'Enable this to use default WooCommerce Slider instead of Master Slider as product images.', 'auxin-shop' ),
        'id'          => 'product_single_template_slider_type',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => array( 'slider' ),
                'operator' => ''
                )
            ),
        'transport'       => 'refresh',
        'type'            => 'switch',
        'default'         => '0'
        );

    $options[] = array(
        'title'       => __( 'Space Between Images', 'auxin-shop' ),
        'description' => __( 'Enable margin bottom space between stack images.', 'auxin-shop' ),
        'id'          => 'product_single_figure_spaces',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => array( 'stack' ),
                'operator' => ''
                )
            ),
        'transport'       => 'refresh',
        'type'            => 'switch',
        'default'         => '0'
        );

    $options[] = array(
        'title'       => __( 'Thumbnail Direction', 'auxin-shop' ),
        'description' => __( 'Display Thumbnail in vertical or horizontal', 'auxin-shop' ),
        'id'          => 'product_single_slider_thumb_dir',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => array( 'slider' ),
                'operator' => ''
                )
            ),
        'transport'       => 'refresh',
        'type'            => 'select',
        'choices'     => array(
            'h' => __( 'Horizontal', THEME_DOMAIN ),
            'v' => __( 'Vertical', THEME_DOMAIN ),
        ),
        'default'         => 'h'
    );

    $options[] = array(
        'title'       => __( 'Thumbnail Margin', 'auxin-shop' ),
        'description' => __( 'Margin of thumbnails in product slider', 'auxin-shop' ),
        'id'          => 'product_single_slider_thumb_margin',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => array( 'slider' ),
                'operator' => ''
                )
            ),
        'transport'       => 'refresh',
        'type'            => 'text',
        'default'         => '5'
    );

    $options[] = array(
        'title'       => __( 'Thumbnail Width', 'auxin-shop' ),
        'description' => __( 'Width of thumbnails in product slider', 'auxin-shop' ),
        'id'          => 'product_single_slider_thumb_width',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => array( 'slider' ),
                'operator' => ''
                )
            ),
        'transport'       => 'refresh',
        'type'            => 'text',
        'default'         => '80'
    );

    $options[] = array(
        'title'       => __( 'Thumbnail Height', 'auxin-shop' ),
        'description' => __( 'Height of thumbnails in product slider', 'auxin-shop' ),
        'id'          => 'product_single_slider_thumb_height',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => array( 'slider' ),
                'operator' => ''
                )
            ),
        'transport'       => 'refresh',
        'type'            => 'text',
        'default'         => '80'
    );

    $options[] = array(
        'title'       => __( 'Thumbnail Space', 'auxin-shop' ),
        'description' => __( 'Space between of thumbnails in product slider', 'auxin-shop' ),
        'id'          => 'product_single_slider_thumb_space',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => array( 'slider' ),
                'operator' => ''
                )
            ),
        'transport'       => 'refresh',
        'type'            => 'text',
        'default'         => '5'
    );


    $options[] = array(
        'title'       => __( 'Grid/Masonry template', 'auxin-shop' ),
        'description' => __( 'Choose your grid/masonry template.', 'auxin-shop' ),
        'id'          => 'product_grid_template_type',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => 'grid',
                'operator' => ''
                )
            ),
        'transport'   => 'refresh',
        'choices'     => array(
            'grid-1'        => array(
                'label'     => __( 'Grid' , 'auxin-shop' ),
                'image'     => AUXIN_URL . 'images/visual-select/product-grid.svg'
            ),
            'masonry'     => array(
                'label'     => __( 'Masonry' , 'auxin-shop' ),
                'image'     => AUXIN_URL . 'images/visual-select/product-masonry.svg'
            )
        ),
        'type'         => 'radio-image',
        'default'      => 'grid-1'
    );

    $options[] = array(
        'title'       => __( 'Image Aspect Ratio', 'auxin-shop' ),
        'description' => '',
        'id'          => 'product_image_aspect_ratio',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => 'grid',
                'operator' => ''
            ),
            array(
                'id'      => 'product_grid_template_type',
                'value'   => array('grid-1'),
                'operator'=> '=='
            )
        ),
        'type'        => 'select',
        'choices'     => array(
            '0.75'          => __( 'Horizontal 4:3' , 'auxin-shop' ),
            '0.56'          => __( 'Horizontal 16:9', 'auxin-shop' ),
            '1.00'          => __( 'Square 1:1'     , 'auxin-shop' ),
            '1.33'          => __( 'Vertical 3:4'   , 'auxin-shop' )
        ),
        'transport'   => 'refresh',
        'default'     => '0.56',
    );

    $options[] = array(
        'title'       => __( 'Space', 'auxin-shop' ),
        'description' => __( 'Specifies space between items in pixels.', 'auxin-shop' ),
        'id'          => 'product_grid_space',
        'section'     => 'product-section-single',
        'dependency'  => array(
                array(
                    'id'       => 'product_single_template',
                    'value'    => 'grid',
                    'operator' => ''
                ),
                array(
                    'id'      => 'product_grid_template_type',
                    'value'   => array('grid-1', 'masonry'),
                    'operator'=> '=='
                )
        ),
        'transport'   => 'refresh',
        'default'     => '30',
        'type'        => 'text'
    );

    $options[] = array(
        'title'       => __( 'Number of Columns', 'auxin-shop' ),
        'description' => '',
        'id'          => 'product_grid_column_number',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => 'grid',
                'operator' => ''
            ),
            array(
                'id'      => 'product_grid_template_type',
                'value'   => array( 'grid-1', 'masonry' ),
                'operator'=> '=='
            )
        ),
        'type'        => 'select',
        'choices'     => array(
                    '1'  => '1', '2' => '2', '3' => '3',
                    '4'  => '4', '5' => '5', '6' => '6'
                ),
        'transport'   => 'refresh',
        'default'     => '4',
    );

    $options[] = array(
        'title'       => __( 'Number of Columns in Tablet', 'auxin-shop' ),
        'description' => '',
        'id'          => 'product_grid_column_number_tablet',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => 'grid',
                'operator' => ''
            ),
            array(
                'id'      => 'product_grid_template_type',
                'value'   => array( 'grid-1', 'masonry' ),
                'operator'=> '=='
            )
        ),
        'type'        => 'select',
        'choices'     => array(
            'inherit' => 'Inherited from larger',
            '1'  => '1', '2' => '2', '3' => '3',
            '4'  => '4', '5' => '5', '6' => '6'
        ),
        'transport'   => 'refresh',
        'default'     => 'inherit',
    );

    $options[] = array(
        'title'       => __( 'Number of Columns in Mobile', 'auxin-shop' ),
        'description' => '',
        'id'          => 'product_grid_column_number_mobile',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                'id'       => 'product_single_template',
                'value'    => 'grid',
                'operator' => ''
            ),
            array(
                'id'      => 'product_grid_template_type',
                'value'   => array('grid-1', 'masonry'),
                'operator'=> '=='
            )
        ),
        'type'        => 'select',
        'choices'     => array(
                    '1' => '1' , '2' => '2', '3' => '3'
                ),
        'transport'   => 'refresh',
        'default'     => '1',
    );

    $options[] =    array(
        'title'       => __( 'Sticky Side Area', 'auxin-shop' ),
        'description' => __( 'Enable it to stick the side area on page while scrolling..', 'auxin-shop' ),
        'id'          => 'product_single_sticky_sidebar',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                 'id'      => 'product_single_template',
                 'value'   => array('stack', 'sticky'),
                 'operator'=> ''
            )
        ),
        'transport'   => 'refresh',
        'default'     => '0',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Single Product Sidebar Style', 'auxin-shop' ),
        'description' => __( 'Specifies style of sidebar on single product.', 'auxin-shop' ),
        'id'          => 'product_single_sidebar_decoration',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                 'id'      => 'product_single_sidebar_position',
                 'value'   => 'no-sidebar',
                 'operator'=> '!='
            )
        ),
        'transport'   => 'postMessage',
        'post_js'     => '$(".single-product main.aux-single").alterClass( "aux-sidebar-style-*", "aux-sidebar-style-" + to );',
        'choices'     => array(
            'simple'        => array(
                'label'     => __( 'Simple' , 'auxin-shop' ),
                'image'     => AUXIN_URL . 'images/visual-select/sidebar-style-1.svg'
            ),
            'border'        => array(
                'label'     => __( 'Bordered Sidebar' , 'auxin-shop' ),
                'image'     => AUXIN_URL . 'images/visual-select/sidebar-style-2.svg'
            ),
            'overlap'       => array(
                'label'     => __( 'Overlap Background' , 'auxin-shop' ),
                'image'     => AUXIN_URL . 'images/visual-select/sidebar-style-3.svg'
            )
        ),
        'type'       => 'radio-image',
        'default'    => 'border'
    );

    $options[] = array(
        'title'       => __( 'Display Next & Previous products', 'auxin-shop' ),
        'description' => __( 'Enable it to display links to next and previous products on single product page.', 'auxin-shop' ),
        'id'          => 'show_product_single_next_prev_nav',
        'section'     => 'product-section-single',
        'dependency'  => '',
        'transport'   => 'refresh',
        'post_js'     => '$(".single .aux-next-prev-posts").toggle( to );',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Skin for Next & Previous Links', 'auxin-shop' ),
        'description' => __( 'Specifies the skin for next and previous navigation block.', 'auxin-shop' ),
        'id'          => 'product_single_next_prev_nav_skin',
        'section'     => 'product-section-single',
        'dependency'  => array(
            array(
                 'id'      => 'show_product_single_next_prev_nav',
                 'value'   => array('1'),
                 'operator'=> ''
            )
        ),
        'transport'   => 'refresh',
        'choices'     => array(
            'minimal'       => array(
                'label'     => __( 'Minimal (default)', 'auxin-shop' ),
                'image'     => AUXIN_URL . 'images/visual-select/post-navigation-1.svg'
            ),
            'thumb-arrow'   => array(
                'label'     => __( 'Thumbnail with Arrow', 'auxin-shop' ),
                'image'     => AUXIN_URL . 'images/visual-select/post-navigation-2.svg'
            ),
            'thumb-no-arrow'        => array(
                'label'             => __( 'Thumbnail without Arrow', 'auxin-shop' ),
                'image'             => AUXIN_URL . 'images/visual-select/post-navigation-3.svg'
            ),
            'boxed-image'           => array(
                'label'             => __( 'Navigation with Light Background', 'auxin-shop' ),
                'image'             => AUXIN_URL . 'images/visual-select/post-navigation-4.svg'
            ),
            'boxed-image-dark'      => array(
                'label'             => __( 'Navigation with Dark Background', 'auxin-shop' ),
                'image'             => AUXIN_URL . 'images/visual-select/post-navigation-5.svg'
            ),
            'thumb-arrow-sticky'    => array(
                'label'             => __( 'Sticky Thumbnail with Arrow', 'auxin-shop' ),
                'image'             => AUXIN_URL . 'images/visual-select/post-navigation-6.svg'
            )
        ),
        'type'       => 'radio-image',
        'default'    => 'minimal'
    );

    $options[] =    array(
        'title'       => __( 'Display Single Star Ratings', 'auxin-shop' ),
        'description' => __( 'Enable it to display star ratings section in single product.', 'auxin-shop' ),
        'id'          => 'product_single_display_star_rating',
        'section'     => 'product-section-single',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Single Product Wishlist', 'auxin-shop' ),
        'description' => __( 'Enable it to display wishlist section in single product.', 'auxin-shop' ),
        'id'          => 'product_single_display_wishlist',
        'section'     => 'product-section-single',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Single Product Share', 'auxin-shop' ),
        'description' => __( 'Enable it to display Share section in single product.', 'auxin-shop' ),
        'id'          => 'product_single_display_share',
        'section'     => 'product-section-single',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Single Product SKU', 'auxin-shop' ),
        'description' => __( 'Enable it to display SKU section in single product.', 'auxin-shop' ),
        'id'          => 'product_single_display_sku',
        'section'     => 'product-section-single',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Single Product Categories', 'auxin-shop' ),
        'description' => __( 'Enable it to display category section in single product.', 'auxin-shop' ),
        'id'          => 'product_single_display_category',
        'section'     => 'product-section-single',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Single Product Tags', 'auxin-shop' ),
        'description' => __( 'Enable it to display Tag section in single product.', 'auxin-shop' ),
        'id'          => 'product_single_display_tag',
        'section'     => 'product-section-single',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Enable Lightbox In Single Product Page', 'auxin-shop' ),
        'description' => __( 'Enable it to allow users to view image in lightbox.', 'auxin-shop' ),
        'id'          => 'product_single_lightbox_enabled',
        'section'     => 'product-section-single',
        'dependency'  => '',
        'transport'   => 'refresh',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] = array(
        'title'       => __( 'Review Avatar Size', 'auxin-shop' ),
        'description' => __( 'The size of avatars in review section', 'auxin-shop' ),
        'id'          => 'product_single_review_avatar_size',
        'section'     => 'product-section-single',
        'transport'   => 'refresh',
        'type'        => 'text',
        'default'     => '60'
    );


    // Sub section - Product Single Page -------------------------------

    $sections[] = array(
        'id'           => 'product-section-single-titlebar',
        'parent'       => 'product-section', // section parent's id
        'title'        => __( 'Product Title', 'auxin-shop' ),
        'description'  => __( 'Preview a Single Product Page', 'auxin-shop'),
        'preview_link' => auxin_get_last_post_permalink( array( 'post_type' => 'product' ) )
    );

    $options[] = array(
        'title'         => __( 'Display Title Bar Section', 'auxin-shop' ),
        'description'   => __( 'Enable it to show the title section.', 'auxin-shop' ),
        'id'            => 'product_title_bar_show',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'switch',
        'default'       => '0'
    );

    $options[] = array(
        'title'         => __( 'Layout presets', 'auxin-shop' ),
        'description'   => '',
        'id'            => 'product_title_bar_preset',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'radio-image',
        'default'       => 'normal_title_1',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
        'choices'       => array(
            'normal_title_1' => array(
                'label'   => __( 'Default', 'auxin-shop' ),
                'image'   => AUXIN_URL . 'images/visual-select/titlebar-style-4.svg',
                'presets' => array(
                    'product_title_bar_content_width_type'      => 'boxed',
                    'product_title_bar_content_section_height'  => 'auto',
                    'product_title_bar_heading_bordered'        => 0,
                    'product_title_bar_heading_boxed'           => 0,
                    'product_title_bar_meta_enabled'            => 0,
                    'product_title_bar_bread_enabled'           => 1,
                    'product_title_bar_bread_bordered'          => 0,
                    'product_title_bar_bread_sep_style'         => 'arrow',
                    'product_title_bar_text_align'              => 'left',
                    'product_title_bar_vertical_align'          => 'top',
                    'product_title_bar_scroll_arrow'            => 'none',
                    'product_title_bar_color_style'             => 'dark',
                    'product_title_bar_overlay_color'           => ''
                )
            ),
            'normal_bg_light_1' => array(
                'label'   => __( 'Title bar with light overlay which is aligned center', 'auxin-shop' ),
                'image'   => AUXIN_URL . 'images/visual-select/titlebar-style-1.svg',
                'presets' => array(
                    'product_title_bar_content_width_type'      => 'boxed',
                    'product_title_bar_content_section_height'  => 'auto',
                    'product_title_bar_heading_bordered'        => 0,
                    'product_title_bar_heading_boxed'           => 0,
                    'product_title_bar_bread_enabled'           => 1,
                    'product_title_bar_bread_bordered'          => 0,
                    'product_title_bar_bread_sep_style'         => 'arrow',
                    'product_title_bar_text_align'              => 'center',
                    'product_title_bar_vertical_align'          => 'top',
                    'product_title_bar_scroll_arrow'            => 'none',
                    'product_title_bar_color_style'             => 'dark',
                    'product_title_bar_overlay_color'           => ''
                )
            ),
            'full_bg_light_1' => array(
                'label'   => __( 'Fullscreen title bar with light overlay on background', 'auxin-shop' ),
                'image'   => AUXIN_URL . 'images/visual-select/titlebar-style-2.svg',
                'presets' => array(
                    'product_title_bar_content_width_type'      => 'boxed',
                    'product_title_bar_content_section_height'  => 'full',
                    'product_title_bar_heading_bordered'        => 0,
                    'product_title_bar_heading_boxed'           => 0,
                    'product_title_bar_bread_enabled'           => 1,
                    'product_title_bar_bread_bordered'          => 1,
                    'product_title_bar_bread_sep_style'         => 'slash',
                    'product_title_bar_text_align'              => 'center',
                    'product_title_bar_vertical_align'          => 'middle',
                    'product_title_bar_scroll_arrow'            => 'round',
                    'product_title_bar_color_style'             => 'dark',
                    'product_title_bar_overlay_color'           => 'rgba(255,255,255,0.50)'
                )
            ),
            'full_bg_dark_1' => array(
                'label'   => __( 'Fullscreen title bar with dark overlay on background', 'auxin-shop' ),
                'image'   => AUXIN_URL . 'images/visual-select/titlebar-style-3.svg',
                'presets' => array(
                    'product_title_bar_content_width_type'      => 'boxed',
                    'product_title_bar_content_section_height'  => 'full',
                    'product_title_bar_heading_bordered'        => 0,
                    'product_title_bar_heading_boxed'           => 0,
                    'product_title_bar_bread_enabled'           => 1,
                    'product_title_bar_bread_bordered'          => 0,
                    'product_title_bar_bread_sep_style'         => 'slash',
                    'product_title_bar_text_align'              => 'center',
                    'product_title_bar_vertical_align'          => 'middle',
                    'product_title_bar_scroll_arrow'            => 'round',
                    'product_title_bar_color_style'             => 'light',
                    'product_title_bar_overlay_color'           => 'rgba(0,0,0,0.6)'
                )
            ),
            'full_bg_dark_2' => array(
                'label'   => __( 'Fullscreen title bar with border around the title', 'auxin-shop' ),
                'image'   => AUXIN_URL . 'images/visual-select/titlebar-style-6.svg',
                'presets' => array(
                    'product_title_bar_content_width_type'      => 'boxed',
                    'product_title_bar_content_section_height'  => 'full',
                    'product_title_bar_heading_bordered'        => 1,
                    'product_title_bar_heading_boxed'           => 0,
                    'product_title_bar_bread_enabled'           => 0,
                    'product_title_bar_bread_bordered'          => 1,
                    'product_title_bar_bread_sep_style'         => 'slash',
                    'product_title_bar_text_align'              => 'center',
                    'product_title_bar_vertical_align'          => 'middle',
                    'product_title_bar_scroll_arrow'            => 'round',
                    'product_title_bar_color_style'             => 'dark',
                    'product_title_bar_overlay_color'           => 'rgba(250,250,250,0.3)'
                )
            ),
            'full_bg_dark_3' => array(
                'label'   => __( 'Fullscreen title bar with dark box around the title', 'auxin-shop' ),
                'image'   => AUXIN_URL . 'images/visual-select/titlebar-style-7.svg',
                'presets' => array(
                    'product_title_bar_content_width_type'      => 'boxed',
                    'product_title_bar_content_section_height'  => 'full',
                    'product_title_bar_heading_bordered'        => 0,
                    'product_title_bar_heading_boxed'           => 1,
                    'product_title_bar_bread_enabled'           => 0,
                    'product_title_bar_bread_bordered'          => 0,
                    'product_title_bar_bread_sep_style'         => 'slash',
                    'product_title_bar_text_align'              => 'center',
                    'product_title_bar_vertical_align'          => 'middle',
                    'product_title_bar_scroll_arrow'            => 'round',
                    'product_title_bar_color_style'             => 'light',
                    'product_title_bar_overlay_color'           => 'rgba(0,0,0,0.5)'
                )
            ),
            'normal_bg_dark_1' => array(
                'label'   => __( 'Title aligned left with dark overlay on background', 'auxin-shop' ),
                'image'   => AUXIN_URL . 'images/visual-select/titlebar-style-5.svg',
                'presets' => array(
                    'product_title_bar_content_width_type'      => 'boxed',
                    'product_title_bar_content_section_height'  => 'auto',
                    'product_title_bar_heading_bordered'        => 0,
                    'product_title_bar_heading_boxed'           => 0,
                    'product_title_bar_bread_enabled'           => 1,
                    'product_title_bar_bread_bordered'          => 0,
                    'product_title_bar_bread_sep_style'         => 'gt',
                    'product_title_bar_text_align'              => 'left',
                    'product_title_bar_vertical_align'          => 'bottom',
                    'product_title_bar_scroll_arrow'            => 'none',
                    'product_title_bar_color_style'             => 'light',
                    'product_title_bar_overlay_color'           => 'rgba(0,0,0,0.3)'
                )
            ),
            'full_bg_dark_4' => array(
                'label'   => __( 'Tile overlaps the title area section and is aligned center', 'auxin-shop' ),
                'image'   => AUXIN_URL . 'images/visual-select/titlebar-style-8.svg',
                'presets' => array(
                    'product_title_bar_content_width_type'      => 'boxed',
                    'product_title_bar_content_section_height'  => 'auto',
                    'product_title_bar_heading_bordered'        => 0,
                    'product_title_bar_heading_boxed'           => 1,
                    'product_title_bar_bread_enabled'           => 1,
                    'product_title_bar_bread_bordered'          => 1,
                    'product_title_bar_bread_sep_style'         => 'gt',
                    'product_title_bar_text_align'              => 'center',
                    'product_title_bar_vertical_align'          => 'bottom-overlap',
                    'product_title_bar_scroll_arrow'            => 'none',
                    'product_title_bar_color_style'             => 'light',
                    'product_title_bar_overlay_color'           => 'rgba(0,0,0,0.5)'
                )
            )
        )
    );

    $options[] = array(
        'title'         => __( 'Enable advanced setting', 'auxin-shop' ),
        'description'   => __( 'Enable it to customize preset layouts.', 'auxin-shop' ),
        'id'            => 'product_title_bar_enable_customize',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'switch',
        'default'       => '0',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
    );

    $options[] = array(
        'title'         => __( 'Content Width', 'auxin-shop' ),
        'description'   => '',
        'id'            => 'product_title_bar_content_width_type',
        'section'       => 'product-section-single-titlebar',
        'type'          => 'radio-image',
        'default'       => 'boxed',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
        'choices'       => array(
            'boxed' => array(
                'label'     => __( 'Boxed', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-content-boxed',
            ),
            'semi-full' => array(
                'label'     => __( 'Full Width Content with Space on Sides', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-content-full-with-spaces'
            ),
            'full' => array(
                'label'     => __( 'Full Width Content', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-content-full'
            )
        ),
        'transport' => 'postMessage',
        'post_js'   => '$(".page-title-section .page-header").alterClass( "aux-*-container", "aux-"+ to +"-container" );'
    );

    $options[] = array(
        'title'         => __( 'Title Section Height', 'auxin-shop' ),
        'description'   => '',
        'id'            => 'product_title_bar_content_section_height',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'select',
        'default'       => 'auto',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
        'choices'       => array(
            'auto'  => __( 'Auto Height', 'auxin-shop' ),
            'full'  => __( 'Full Height', 'auxin-shop' )
        )
    );

    $options[] = array(
        'title'         => __( 'Vertical Position', 'auxin-shop' ),
        'description'   => __( 'Specifies vertical alignment of title and subtitle.', 'auxin-shop' ) . "<br/>".
                           __( 'Note: Parallax feature in not available for "Bottom Overlap" vertical mode.', 'auxin-shop' ),
        'id'            => 'product_title_bar_vertical_align',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'select',
        'default'       => '',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
        'choices'            => array(
            'top'            => __( 'Top'    , 'auxin-shop' ),
            'middle'         => __( 'Middle' , 'auxin-shop' ),
            'bottom'         => __( 'Bottom' , 'auxin-shop' ),
            'bottom-overlap' => __( 'Bottom Overlap', 'auxin-shop' )
        )
    );

    $options[] = array(
        'title'         => __( 'Scroll Down Arrow', 'auxin-shop' ),
        'description'   => __( 'This option only applies if section height is "Full Height".', 'auxin-shop' ),
        'id'            => 'product_title_bar_scroll_arrow',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'radio-image',
        'default'       => '',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_content_section_height',
                 'value'   => 'full',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_vertical_align',
                 'value'   => array('top', 'middle', 'bottom'),
                 'operator'=> '=='
            )
        ),
        'choices'       => array(
            'none' => array(
                'label'     => __( 'None', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-none'
            ),
            'round' => array(
                'label'     => __( 'Round', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-scroll-down-arrow-outline'
            )
        )
    );

    $options[] = array(
        'title'         => __( 'Display Titles', 'auxin-shop' ),
        'description'   => __( 'Enable it to display title/subtitle in title section.', 'auxin-shop' ),
        'id'            => 'product_title_bar_title_show',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'switch',
        'default'       => '1',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
    );    

    $options[] = array(
        'title'         => __( 'Border for Heading', 'auxin-shop' ),
        'description'   => __( 'Enable it to display a border around the title and subtitle area.', 'auxin-shop' ),
        'id'            => 'product_title_bar_heading_bordered',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'switch',
        'default'       => '0',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_title_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
    );

    $options[] = array(
        'title'         => __( 'Boxed Title', 'auxin-shop' ),
        'description'   => __( 'Enable it to wrap the title and subtitle in a box with background color.', 'auxin-shop' ),
        'id'            => 'product_title_bar_heading_boxed',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'switch',
        'default'       => '0',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_title_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),            
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
    );

    $options[] = array(
        'title'         => __( 'Title Box Custom Color', 'auxin-shop' ),
        'description'   => __( 'Specifies a custom background color for the box around the title and subtitle.', 'auxin-shop' ),
        'id'            => 'product_title_bar_heading_bg_color',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'color',
        'default'       => '',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_title_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),            
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_heading_boxed',
                 'value'   => '1',
                 'operator'=> '=='
            )
        )
    );

    $options[] = array(
        'title'         => __( 'Display Post Meta', 'auxin-shop' ),
        'description'   => __( 'Enable it to display post meta information on title section.', 'auxin-shop' ),
        'id'            => 'product_title_bar_meta_enabled',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'switch',
        'default'       => '0',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
    );

    $options[] = array(
        'title'         => __( 'Display Breadcrumb', 'auxin-shop' ),
        'description'   => __( 'Enable it to display breadcrumb on title section.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bread_enabled',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'switch',
        'default'       => '1',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
    );

    $options[] = array(
        'title'         => __( 'Border for Breadcrumb', 'auxin-shop' ),
        'description'   => __( 'Enable it to display border around breadcrumb.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bread_bordered',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'switch',
        'default'       => '0',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_bread_enabled',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
    );

    $options[] = array(
        'title'         => __( 'Breadcrumb Separator', 'auxin-shop' ),
        'description'   => __( 'Enable it to display separator between breadcrumb parts.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bread_sep_style',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'radio-image',
        'default'       => 'gt',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_bread_enabled',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
        'choices'       => array(
            'gt' => array(
                'label'     => esc_html__( 'Greater Than (>)', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-breadcrumb-divider2'
            ),
            'slash' => array(
                'label'     => __( 'Slash', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-breadcrumb-divider1',
            ),
            'arrow' => array(
                'label'     => __( 'Arrow', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-breadcrumb-divider3'
            )
        )
    );

    $options[] = array(
        'title'         => __( 'Text Align', 'auxin-shop' ),
        'description'   => '',
        'id'            => 'product_title_bar_text_align',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'radio-image',
        'default'       => 'left',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
        'choices'       => array(
            'left' => array(
                'label'     => __( 'Left', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-text-align-left',
            ),
            'center' => array(
                'label'     => __( 'Center', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-text-align-center'
            ),
            'right' => array(
                'label'     => __( 'Right', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-text-align-right'
            )
        )
    );

    $options[] = array(
        'title'         => __( 'Overlay Color', 'auxin-shop' ),
        'description'   => __( 'The color that overlay on the background. Please note that color should have transparency.','auxin-shop' ),
        'id'            => 'product_title_bar_overlay_color',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'color',
        'default'       => '',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        )
    );

    $options[] = array(
        'title'         => __( 'Overlay Pattern', 'auxin-shop' ),
        'description'   => '',
        'id'            => 'product_title_bar_overlay_pattern',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'radio-image',
        'default'       => 'none',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
        'choices'       => array(
            'none' => array(
                'label'     => __( 'None', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-none'
            ),
            'hash' => array(
                'label'     => __( 'Hash', 'auxin-shop' ),
                'css_class' => 'axiAdminIcon-pattern',
            )
        )
    );

    $options[] = array(
        'title'         => __( 'Overlay Pattern Opacity', 'auxin-shop' ),
        'description'   => '',
        'id'            => 'product_title_bar_overlay_pattern_opacity',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'type'          => 'text',
        'default'       => '0.5',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_overlay_pattern',
                 'value'   => array('hash'),
                 'operator'=> '=='
            )
        ),
        'style_callback' => function( $value = null ){
            if( ! $value ){
                $value = esc_attr( auxin_get_option( 'product_title_bar_overlay_pattern_opacity' ) );
            }
            if( ! is_numeric( $value ) || (float) $value > 1 ){
                $value = 1;
            }
            return $value ? ".single-product .aux-overlay-bg-hash::before { opacity:$value; }" : '';
        }
    );

    $options[] = array(
        'title'         => __( 'Color Mode', 'auxin-shop' ),
        'description'   => '',
        'id'            => 'product_title_bar_color_style',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'select',
        'default'       => 'dark',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
        'choices'       => array(
            'dark'  => __( 'Dark', 'auxin-shop' ),
            'light' => __( 'Light', 'auxin-shop' )
        )
    );

    ////////////////////////////////////////////////////////////////////////////////////////

    $options[] = array(
        'title'         => __( 'Enable Title Background', 'auxin-shop' ),
        'description'   => __( 'Enable it to display custom background for title section.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bg_show',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'switch',
        'default'       => '0',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            )
        )
    );

    $options[] = array(
        'title'         => __( 'Enable Parallax Effect', 'auxin-shop' ),
        'description'   => __( 'Enable it to have parallax background effect on this section.', 'auxin-shop' )."<br />".
                           __( 'Note: Parallax feature in not available for "Bottom Overlap" mode for "Vertical Position" option.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bg_parallax',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'switch',
        'default'       => '0',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_bg_show',
                 'value'   => '1',
                 'operator'=> '=='
            )
        )
    );

    $options[] = array(
        'title'         => __( 'Background Color', 'auxin-shop' ),
        'description'   => __( 'Specifies a background color for title bar.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bg_color',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'color',
        'default'       => '',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_bg_show',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),

    );

    $options[] = array(
        'title'         => __( 'Background Size', 'auxin-shop' ),
        'description'   => __( 'Specifies the background size.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bg_size',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'radio-image',
        'default'       => '',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_bg_show',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),
        'choices' => array(
            'auto' => array(
                'label'       => __( 'Auto', 'auxin-shop' ),
                'css_class'   => 'axiAdminIcon-bg-size-1',
            ),
            'contain' => array(
                'label'       => __( 'Contain', 'auxin-shop' ),
                'css_class'   => 'axiAdminIcon-bg-size-2',
            ),
            'cover' => array(
                'label'       => __( 'Cover', 'auxin-shop' ),
                'css_class'   => 'axiAdminIcon-bg-size-3',
            )
        ),

    );

    $options[] = array(
        'title'         => __( 'Background Image', 'auxin-shop' ),
        'description'   => __( 'Specifies a background image for title bar.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bg_image',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'image',
        'default'       => '',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_bg_show',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),

    );

    $options[] = array(
        'title'         => __( 'Background Video MP4', 'auxin-shop' ),
        'description'   => __( 'You can upload custom video for title background</br>Note: if you set custom image, default image backgrounds will be ignored.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bg_video_mp4',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'video',
        'default'       => '',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_bg_show',
                 'value'   => '1',
                 'operator'=> '=='
            )
        )

    );

    $options[] = array(
        'title'         => __( 'Background Video Ogg', 'auxin-shop' ),
        'description'   => __( 'You can upload custom video for title background</br>Note: if you set custom image, default image backgrounds will be ignored.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bg_video_ogg',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'video',
        'default'       => '',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_bg_show',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),

    );

    $options[] = array(
        'title'         => __( 'Background Video WebM', 'auxin-shop' ),
        'description'   => __( 'You can upload custom video for title background</br>Note: if you set custom image, default image backgrounds will be ignored.', 'auxin-shop' ),
        'id'            => 'product_title_bar_bg_video_webm',
        'section'       => 'product-section-single-titlebar',
        'transport'     => 'postMessage',
        'partial'       => array(
            'selector'              => '.single-product .aux-customizer-page-title-container',
            'container_inclusive'   => false,
            'render_callback'       => function(){
                auxin_the_main_title_section( array( 'has_helper_wrapper' => false ) );
            }
        ),
        'type'          => 'video',
        'default'       => '',
        'dependency'    => array(
            array(
                 'id'      => 'product_title_bar_enable_customize',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_show',
                 'value'   => '1',
                 'operator'=> '=='
            ),
            array(
                 'id'      => 'product_title_bar_bg_show',
                 'value'   => '1',
                 'operator'=> '=='
            )
        ),

    );
    

    // Related product section ------------------------------- 
 
    $sections[] = array( 
        'id'          => 'product-setting-section-single-related', 
        'parent'      => 'product-section', // section parent's id 
        'title'       => __( 'Related Products', 'auxin-shop' ), 
        'description' => __( 'Setting for Related Products Section in Single Page', 'auxin-shop' ) 
    );     

    $options[] = array(
        'title'       => __( 'Display Related Products', 'auxin-shop' ),
        'description' => __( 'Enable it to display related products section on single product page.', 'auxin-shop' ),
        'id'          => 'show_product_related_posts',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => '',
        'transport'   => 'postMessage',
        'post_js'     => '$(".single-product .related-products").toggle( to );',
        'default'     => '1',
        'type'        => 'switch'
    );

    $options[] = array(
        'title'       => __( 'Label of Related Section', 'auxin-shop' ),
        'description' => __( 'Specifies the label of related items section.', 'auxin-shop' ),
        'id'          => 'product_related_posts_label',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => array(
            array(
                 'id'      => 'show_product_related_posts',
                 'value'   => array('1'),
                 'operator'=> ''
            )
        ),
        'transport'   => 'postMessage',
        'post_js'     => '$(".single-product .related-products > .widget-title").html( to );',
        'default'     => __( 'Related Products', 'auxin-shop' ),
        'type'        => 'text'
    );

    $options[] =    array(
        'title'       => __( 'Related Items Type', 'auxin-shop' ),
        'description' => __( 'Specifies the appearance type for related product element.', 'auxin-shop' ),
        'id'          => 'product_related_posts_preview_mode',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => array(
            array(
                 'id'      => 'show_product_related_posts',
                 'value'   => array('1'),
                 'operator'=> ''
            )
        ),
        'transport'   => 'refresh',
        'choices'     => array(
            'grid'      => 'Grid',
            'carousel'  => 'Carousel'
        ),
        'type'        => 'select',
        'default'     => 'grid'
    );

    $options[] =    array(
        'title'       => __( 'Number of Columns', 'auxin-shop' ),
        'description' => '',
        'id'          => 'product_related_posts_column_number',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => array(
            array(
                 'id'      => 'show_product_related_posts',
                 'value'   => array('1'),
                 'operator'=> ''
            )
        ),
        'transport'   => 'refresh',
        'type'        => 'select',
        'choices'     => array(
                    '1' => '1', '2' => '2', '3' => '3', '4' => '4'
        ),
        'default'     => '4'
    );

    $options[] =    array(
        'title'       => __( 'Number of carousel pages', 'auxin-shop' ),
        'description' => 'Select this regarding to number of columns options',
        'id'          => 'product_related_posts_carousel_pages',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => array(
            array(
                'id'      => 'show_product_related_posts',
                'value'   => array('1'),
                'operator'=> ''
            ),
            array(
                'id'       => 'product_related_posts_preview_mode',
                'value'    => array('carousel'),
                'operator' => ''
            )
        ),
        'transport'   => 'refresh',
        'type'        => 'select',
        'choices'     => array(
                    '2' => '2', '3' => '3', '4' => '4'
        ),
        'default'     => '4'
    );

    $options[] =    array(
        'title'       => __( 'Auto Play Carousel', 'auxin-shop' ),
        'description' => 'Start Carousel automatically',
        'id'          => 'product_related_posts_carousel_autoplay',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => array(
            array(
                'id'      => 'show_product_related_posts',
                'value'   => array('1'),
                'operator'=> ''
            ),
            array(
                'id'       => 'product_related_posts_preview_mode',
                'value'    => array('carousel'),
                'operator' => ''
            )
        ),
        'transport'   => 'refresh',
        'default'     => '0',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Align Center', 'auxin-shop' ),
        'description' => __( 'Enable it to make related products section text center.', 'auxin-shop' ),
        'id'          => 'product_related_posts_align_center',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => array(
            array(
                 'id'      => 'show_product_related_posts',
                 'value'   => array('1'),
                 'operator'=> ''
            )
        ),
        'transport'   => 'postMessage',
        'post_js'     => '$(".single-product .related-products").toggleClass( "aux-text-align-center", to );',
        'default'     => '0',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Full Width Related Section', 'auxin-shop' ),
        'description' => __( 'Enable it to make related products section full width.', 'auxin-shop' ),
        'id'          => 'product_related_posts_full_width',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => array(
            array(
                 'id'      => 'show_product_related_posts',
                 'value'   => array('1'),
                 'operator'=> ''
            )
        ),
        'transport'   => 'refresh',
        // 'post_js'     => '$(".single-product .related-products").toggleClass( "auxshp-no-margin", to );',
        'default'     => '0',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Snap Related Items', 'auxin-shop' ),
        'description' => __( 'Enable it to remove space between related product items.', 'auxin-shop' ),
        'id'          => 'product_related_posts_snap_items',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => array(
            array(
                 'id'      => 'show_product_related_posts',
                 'value'   => array('1'),
                 'operator'=> ''
            )
        ),
        'transport'   => 'refresh',
        // 'post_js'     => '$(".single-product .aux-widget-related-posts > .aux-row").toggleClass( "aux-no-gutter", to );',
        'default'     => '0',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Product Categories', 'auxin-shop' ),
        'description' => __( 'Enable it to display the categories of each product item in related products section.', 'auxin-shop' ),
        'id'          => 'product_related_posts_display_categories',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => array(
            array(
                 'id'      => 'show_product_related_posts',
                 'value'   => array('1'),
                 'operator'=> ''
            )
        ),
        'transport'   => 'refresh',
        // 'post_js'     => '$(".single-product .aux-widget-related-posts .entry-tax").toggle( to );',
        'default'     => '0',
        'type'        => 'switch'
    );

    $options[] =    array(
        'title'       => __( 'Display Product Star Review', 'auxin-shop' ),
        'description' => __( 'Enable it to display the star reviews of each product item in related products section.', 'auxin-shop' ),
        'id'          => 'product_related_posts_display_stars',
        'section'     => 'product-setting-section-single-related',
        'dependency'  => array(
            array(
                 'id'      => 'show_product_related_posts',
                 'value'   => array('1'),
                 'operator'=> ''
            )
        ),
        'transport'   => 'refresh',
        // 'post_js'     => '$(".single-product .aux-widget-related-posts .entry-tax").toggle( to );',
        'default'     => '0',
        'type'        => 'switch'
    );

    return array( 'fields' => $options, 'sections' => $sections );
}

add_filter( 'auxin_defined_option_fields_sections', 'auxin_define_product_theme_options', 14, 1 );


function category_id_class( $classes ) {

    global $post;

    if ( ! isset( $post->ID ) ) {
        return;
    }

    if ( 'product' == $post->post_type && is_single() ) {

        if ( 'default' == $template = auxin_get_post_meta( $post->ID, '_product_single_template', 'default' ) ) {
            $template = auxin_get_option( 'product_single_template', 'slider' );
        }

        $classes[] = 'auxshp-template-' . esc_attr( $template );
    }

    return $classes;

}

add_filter( 'body_class', 'category_id_class' );


function auxshp_reset_theme_support() {

    global $post;

    if ( ! isset( $post->ID ) ) {
        return;
    }

    if ( 'default' == $template = auxin_get_post_meta( $post->ID, '_product_single_template', 'default' ) ) {
        $template = auxin_get_option( 'product_single_template', 'slider' );
    }


    if ( 'default' == $use_wc_slider = auxin_get_post_meta( $post->ID, '_product_single_template_slider_type', 'default' ) ) {
        $use_wc_slider = auxin_get_option( 'product_single_template_slider_type', false );
    }

    if ( 'slider' != $template || 'yes' != $use_wc_slider ) {
        wp_dequeue_script( 'flexslider' );
    }


}

add_action( 'wp_enqueue_scripts', 'auxshp_reset_theme_support', 20 );

function auxshp_woocommerce_widget_shopping_cart_button_view_cart() {

        if ( auxin_is_true( auxin_get_option( 'footer_widget_dark_mode') ) ){
            echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward aux-button aux-large aux-white aux-uppercase aux-outline">';
            echo '<span class="aux-overlay"></span><span class="aux-text">'. esc_html__( 'View cart', 'auxin-shop' ).'</span>';
            echo '</a>';
        } else {
            echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward aux-button aux-large aux-black aux-uppercase aux-outline">';
            echo '<span class="aux-overlay"></span><span class="aux-text">'. esc_html__( 'View cart', 'auxin-shop' ).'</span>';
            echo '</a>';
        }

}

add_action( 'woocommerce_widget_shopping_cart_buttons', 'auxshp_woocommerce_widget_shopping_cart_button_view_cart',10);


function auxshp_woocommerce_widget_shopping_cart_proceed_to_checkout() {

        if ( auxin_is_true ( auxin_get_option( 'footer_widget_dark_mode') ) ) {
            echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="button wc-forward aux-button aux-large  aux-white  aux-uppercase">';
            echo '<span class="aux-overlay"></span><span class="aux-text">'. esc_html__( 'Proceed to Checkout', 'auxin-shop' ) .'</span>';
            echo '</a>';
        } else {
            echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="button wc-forward aux-button aux-large  aux-black  aux-uppercase">';
            echo '<span class="aux-overlay"></span><span class="aux-text">'. esc_html__( 'Proceed to Checkout', 'auxin-shop' ) .'</span>';
            echo '</a>';
        }

}

add_action( 'woocommerce_widget_shopping_cart_buttons', 'auxshp_woocommerce_widget_shopping_cart_proceed_to_checkout',20);

/**
 * Modify default shopping cart functionality
 */
function auxshp_advanced_shopping_basket( $old_content, $args ){
    global $woocommerce;
    
    // Localize cart options
    wp_localize_script( AUXSHP_SLUG .'-shop', 'auxin_cart_options', $args );
    $count = $woocommerce->cart->cart_contents_count;
?>
    <div class="aux-cart-wrapper aux-elegant-cart <?php echo esc_attr( $args['css_class'] ); ?>">
        <div class="aux-shopping-basket aux-phone-off aux-action-on-<?php echo esc_attr( $args['action_on'] ); ?>">
        <?php
            echo auxshp_get_cart_basket( $args, $count );
        ?>
        </div>
        <div id="shopping-basket-burger" class="aux-shopping-basket aux-basket-burger aux-phone-on">
            <a class="aux-cart-contents <?php echo esc_attr( $args['icon'] ); ?>" href="<?php echo esc_url( $args['cart_url'] ); ?>" title="<?php esc_attr_e( 'View your shopping cart', THEME_DOMAIN ); ?>">
                <?php echo isset( $args['title'] ) ? $args['title'] : '';
                 if ( $count > 0 ) echo '<span>' . $count . '</span>'; ?>
            </a>
        </div>
        <?php if( ! is_cart() && ! is_checkout() ) : ?>
            <?php if( $count > 0 ) { ?>
                <div class="aux-card-dropdown aux-phone-off <?php echo esc_attr( $args['dropdown_class'] ); ?>">
                    <?php
                        echo auxshp_get_cart_items( $args );
                    ?>
                </div>
            <?php } else { ?>
                <div class="aux-card-dropdown aux-phone-off <?php echo esc_attr( $args['dropdown_class'] ); ?>">
                    <div class="aux-card-box">
                        <?php esc_attr_e( 'Your cart is currently empty.', 'auxin-shop' ) ?>
                    </div>
                </div>
            <?php } ?>
        <?php endif; ?>
    </div>
<?php
}
add_filter( 'auxin_shopping_basket', 'auxshp_advanced_shopping_basket', 10, 2 );

/**
 * Modify default shopping cart functionality
 */
function auxshp_modern_form_ouput( $comment_form ){

    if( auxin_get_option( 'comment_forms_skin', 'classic' ) !== 'modern' ){
        return $comment_form;
    }    
    
    $commenter       = wp_get_current_commenter();
    
    $border_output   = '<div class="aux-modern-form-border"></div>';
    
    $author_output    = '<div class="aux-input-group comment-form-author">';
    $author_output   .= '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required />';
    $author_output   .= '<label for="author">' . esc_html__( 'Name', 'auxin-shop' ) . ' <span class="required">*</span></label>';
    $author_output   .= $border_output;
    $author_output   .=  '</div>';
    
    $email_output    = '<div class="aux-input-group comment-form-email">';
    $email_output    .= '<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required />';
    $email_output    .= '<label for="email">' . esc_html__( 'Email', 'auxin-shop' ) . ' <span class="required">*</span></label>';
    $email_output    .= $border_output;
    $email_output    .=  '</div>';
    
    $textarea_output = '<div class="aux-input-group comment-form-comment">';
    $textarea_output .= '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea>';
    $textarea_output .= '<label for="comment">' . esc_html__( 'Your review', 'auxin-shop' ) . ' <span class="required">*</span></label>';
    $textarea_output .= $border_output;
    $textarea_output .=  '</div>';
    
    $comment_form['class_form'] = 'aux-modern-form';
    $comment_form['fields']     = array(
        'author' => $author_output,
        'email'  => $email_output
    );
        
    if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
        $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'auxin-shop' ) . '</label><select name="rating" id="rating" aria-required="true" required>
            <option value="">' . esc_html__( 'Rate&hellip;', 'auxin-shop' ) . '</option>
            <option value="5">' . esc_html__( 'Perfect', 'auxin-shop' ) . '</option>
            <option value="4">' . esc_html__( 'Good', 'auxin-shop' ) . '</option>
            <option value="3">' . esc_html__( 'Average', 'auxin-shop' ) . '</option>
            <option value="2">' . esc_html__( 'Not that bad', 'auxin-shop' ) . '</option>
            <option value="1">' . esc_html__( 'Very poor', 'auxin-shop' ) . '</option>
        </select></div>';
    }

    $comment_form['comment_field'] .= $textarea_output;

    return $comment_form;
}
add_filter( 'woocommerce_product_review_comment_form_args', 'auxshp_modern_form_ouput', 10, 1 ); 

/**
 * Add woocommerce classes in home page
 */
// function auxshp_woocommerce_body_classes( $classes ) {
//     if ( in_array( 'home', $classes ) ) {
//         $classes[] = 'woocommerce woocommerce-page';
//     }
      
//     return $classes;
// }
// add_filter( 'body_class','auxshp_woocommerce_body_classes' );