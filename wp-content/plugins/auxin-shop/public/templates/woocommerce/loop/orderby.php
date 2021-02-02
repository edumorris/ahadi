<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$orderby  = isset( $_GET['orderby'] ) ? $_GET['orderby'] : '';

?>

<div class="woocommerce-ordering aux-filters aux-dropdown-filter">
	<span class="aux-filter-by"><?php esc_html_e( 'Sort By:', 'auxin-shop' ); ?> 
		<span class="aux-filter-name">
		<?php 
			if( ! empty( $orderby ) ) {
				foreach ( $catalog_orderby_options as $id => $name ) :
					if( $id === $orderby ){
						echo $name;
					}
				endforeach;
			} else {
				echo __( 'Default', 'auxin-shop' );
			}
		?>
		</span>
	</span>
    <ul>
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<li class="aux-filter-item"><a href="<?php echo add_query_arg( 'orderby', $id );?>"><span><?php echo esc_html( $name ); ?></span></a></li>
		<?php endforeach; ?>
    </ul>
</div>