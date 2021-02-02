<?php
/**
 * Only the last line is like share.php template file
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>
<?php do_action( 'auxshp-before-single-share' ); ?>

<div class="auxshp-share-wrapper">
    <div class="aux-share-btn aux-tooltip-socials aux-tooltip-dark aux-socials">
        <span class="aux-icon auxicon-share"></span>
        <span class="aux-text"><?php _e( 'Share', 'auxin-shop' ); ?></span>
    </div>
</div>

<?php do_action( 'auxshp-after-single-share' ); ?>

<?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here ?>