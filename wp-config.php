<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ahadi' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'P@$$w0r6__' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '.B~%+sIlc`#etscQ:<=H@;vw4RKD;:4q+RYk(W?QpX|0UK},#](-.U[JV9)n3?j{' );
define( 'SECURE_AUTH_KEY',  'oZ_w%^gTKt*qAnQm$yo0]85Lb!4n(:APeEfh;|p45cAhLFE|%DuPBGFJ,PrT5la@' );
define( 'LOGGED_IN_KEY',    'zo%d-<Mbm.PTvf`HTr@P)$N1GoG!RA?T7(pgYOZC5D9uizsFP;jrsrvS&r%S3<fY' );
define( 'NONCE_KEY',        'wV^j-)f:gh+ia!w^OR6eXfRHB_0*;Q}?OHfG46@ e`ngzlb;;W<)N bwt|HvFCBO' );
define( 'AUTH_SALT',        'H3*K0X%!4zo_v&5Y}]|$M!hVq2[+zP7?oH}L9#wC`]5h3I6Zu,&s[YX8xs&h83Rz' );
define( 'SECURE_AUTH_SALT', 'Yuw9TYw~pqc9$Ta@36G.fTMxz*dE1U5 .[2x+w&`z#lCWR&(nF=nkhIKhgDCd3`/' );
define( 'LOGGED_IN_SALT',   '<qEu|rLEby9>~7Gt!;ca&OaL8skP:G/Jk6&5O -Fu<Yy9S91ymxw3:M$@FrYkwR8' );
define( 'NONCE_SALT',       'nV{(=|x.tbxjH*m::<_ z*U}4_AJnDR}%cV0|Oz-e0eBI6CX3uz!r0ejgB/!g}K<' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
