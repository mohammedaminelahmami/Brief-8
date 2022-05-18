<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpressBrief8' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'URcd{4OL5G=_6|6D)|paB;M`?[-r:F^3+0H/ZDA_TtlIV:.p%?./TdmdL+Nr${YI' );
define( 'SECURE_AUTH_KEY',  '!v0}U`4:pE!)36j4e+bzF,}O{%/v_UBo5P4:&Oe0Yl,UdZW|`n|zErn<1zE7U5mU' );
define( 'LOGGED_IN_KEY',    'lb7DIOCFDYy1;GB7]$l.VFD|~CF%u`GswhlVefQ?PBJlvKX-8Z1J%0PSuK$W*N&V' );
define( 'NONCE_KEY',        '3}Nvtb+j+`;?KkZFAf*pL2q;@x7o}gxp avh@UOO*,|m1g=_0MG=,`8o/M5Bu4uk' );
define( 'AUTH_SALT',        'I*gD)5ff2dQ]@0g{+[Yt/!kQMex6)#>Lds6#{=aa|[ZB;t%X18ThMi%hQhLKd=~)' );
define( 'SECURE_AUTH_SALT', ') =RRqVs)R 7s`)ukx]8|2E3QBT< `.EJ7qx&JwBbv+w`Wv?Z{#iMld3|mpVfV4E' );
define( 'LOGGED_IN_SALT',   ':rFh8tH6V9IS`yg{CT7FE!j*Daq]kI)x ^L/ ,3?]h6)<xyN9f;xJI[xxO/2)^f#' );
define( 'NONCE_SALT',       'W#KR(z.M&`svhl9>_!yzz!&i2]2nda-<XGS,0gt@3+SS;ZjT[ve]JeSSw%~T2Fqo' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
