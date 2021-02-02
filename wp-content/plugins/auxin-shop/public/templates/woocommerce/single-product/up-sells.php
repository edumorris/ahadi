<?php
/**
 * Changes:
 * div used instead of section tag
 * h3 used instead of h2 tag
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) : ?>

	<div class="up-sells upsells products">

		<h3><?php esc_html_e( 'You may also like&hellip;', 'woocommerce' ) ?></h3>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $upsells as $upsell ) : ?>

				<?php
				 	$post_object = get_post( $upsell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); ?>
					<div class="aux-col post-<?php echo esc_attr( $post_object->ID ); ?>">
						<?php wc_get_template_part( 'content', 'product' ); ?>
					</div>
			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
