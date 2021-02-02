<?php
/**
 * Changes:
 * <div class="auxshp-product-main clearfix"> is added as a wrapper for single product 
 * Options added for sticky "summary" section
 * do_action( 'auxshp_product_main' ); added
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }

	global $product;

	if ( 'default' == $template = auxin_get_post_meta( $product->get_id(), '_product_single_template', 'default' ) ) {
		$template = auxin_get_option( 'product_single_template', 'slider' );
	}

	if( 'default' == $sticky_sidebar = auxin_get_post_meta( $product->get_id(), '_sticky_sidebar', 'default' ) ){
        $sticky_sidebar = auxin_get_option( 'product_single_sticky_sidebar', false );
    }	

    $sticky_sidebar_wrapper = auxin_is_true( $sticky_sidebar ) && in_array( $template, array('stack', 'sticky' ) ) ? '  aux-template-is-sticky' : '';

?>

<div id="product-<?php the_ID(); ?>" <?php post_class( 'auxshp-template-' . $template . $sticky_sidebar_wrapper ); ?>>
	<div class="auxshp-product-main clearfix">
		<?php
			/**
			 * woocommerce_before_single_product_summary hook.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			
			$sticky_header_height = 0;
			
			if ( auxin_is_true( $sticky_sidebar ) && in_array( $template, array('stack', 'sticky' ) ) ) :

            	$sticky_header_height = ( auxin_get_option('site_header_top_sticky') ? auxin_get_option('site_header_container_scaled_height') : 0 );

				?>

				<div class="summary entry-summary aux-sticky-position" data-use-transform="true" data-sticky-margin="<?php echo $sticky_header_height; ?>" data-boundaries="true">

            <?php else : ?>
			
				<div class="summary entry-summary">

			<?php endif; ?>


			<?php
				/**
				 * woocommerce_single_product_summary hook.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>

		</div><!-- .summary -->

			<?php
				/**
				 * @hooked woocommerce_template_single_title - 5
				 */
				do_action( 'auxshp_product_main' );
			?>

	</div>
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php 
	do_action( 'woocommerce_after_single_product' );