<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wocomm' );

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
define( 'AUTH_KEY',         '&SD#)Jy8SGb::0%Uy3|/BrT&3G)!Pp2E3i%Qo^!9lXO!ggwL7V}p!B8IW-jO:{_0' );
define( 'SECURE_AUTH_KEY',  '$@v9Ck2)b*^{Usrt*m,Y)=_`2/Zs/!.XPDtSB+YIa+-@!no_0{(N>FWWX/U6 #j1' );
define( 'LOGGED_IN_KEY',    ')l:d%^pr#N4RNbS&0aBhJ8bIN Ye1j$GJ(&Z>LbcPgus6&%zn0dSK;<p~O tt5u}' );
define( 'NONCE_KEY',        '/EriQ>4 {yQK#oSA=dl#MVwfB1~3h08[_4%:6.*o.iEj|GoD.1z2w~6?zOlG<]p4' );
define( 'AUTH_SALT',        '7QQ`Ts,xTPEjP7K]FKoW)kK*[Z<nxo9x@o.DJQARh5pioB=<{JND`ZxNK9K+0*w%' );
define( 'SECURE_AUTH_SALT', 'D.v}pgd$8:A2/^ufs mPy1/5vGKVdY9RD<7HooZYI-p#3]:ar0 ]tBOb(Bm[JAeZ' );
define( 'LOGGED_IN_SALT',   'J=9~]m*Bk<`d.H/I17]lO?dTRm&KW{bYjd2ep8%&QMH/SD:mB^[^nf`4t&^*!EkM' );
define( 'NONCE_SALT',       'YCqj&b}*}_bF-ikUllDM(wCfaUOszTW(xX+f ~M$oY_cLbbifo:3:/0/U2E]A1j:' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
