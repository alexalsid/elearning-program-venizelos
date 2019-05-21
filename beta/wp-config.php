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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'venizelos-elearning' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'W.Up6eu:0U+mh5`=PRvb3tm(R@8;fk[WQ_{jx)W<SEo^Kn  nI(OcB)(+%Ihl:a^' );
define( 'SECURE_AUTH_KEY',  'FVUgtX9S9]QpZmd7hM|Vgtb0T!U|g9WlvX:<rTU9ZCC6D) 5maG]SdbIv$`+FF=7' );
define( 'LOGGED_IN_KEY',    'xH_S0`t* ZCjAw{,E?]K/.rjueA|/&[JW$x&KP_%3LUx`j86J/fQy}mc&Fzo?Mxe' );
define( 'NONCE_KEY',        'wtA2NkU~xDYX%nx?l8Wl,_M3QDs#xq$oC]/>W%#lE^`yUR[lqhC9~[_h},2RO)t)' );
define( 'AUTH_SALT',        'm[tOnif(:@WsH8v>$`2{.OOS*5cR&U8636<NN4i,qh`^Ch$8{f|zpn%T0>DL*|<E' );
define( 'SECURE_AUTH_SALT', '&19a;hUTR`Nx.64d=MBSM_5 6nWXi._N4^2BBmrAy4nCXXt5H3V(K0Rj216SOyaN' );
define( 'LOGGED_IN_SALT',   'a?[]eV1u5JfbSxET}G|z)HOMFNNKpUNPF+uKpS=<q,x_J82BPR_s42!mK#u9Cbo&' );
define( 'NONCE_SALT',       'f7,| !6Z!p2as:I|R:xsxGvw0F^k.+Wl]CF2/cGB=7A-ER4nU9c9m$1i;;(M7_WN' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
