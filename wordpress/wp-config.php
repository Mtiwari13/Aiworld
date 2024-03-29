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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Aiworld' );

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
define( 'AUTH_KEY',         '~3-D#yQ Kx=sL6e}H(SORY/N&K;qk8OGrw.PRV$L+06%6M#t|>^e$K]#)T@YP~nE' );
define( 'SECURE_AUTH_KEY',  '$b[53@`e,Y%rs#VIzv)XHfK8NzxC3htCc4s)A-fQ}m!@*<[k-mR-1Y|y]nja9*I[' );
define( 'LOGGED_IN_KEY',    'Os~ycPH}!ZYVgJ[C^q9-/Yg1o#YB8reltYU=<x vb&$b|INjS{dtTuv@>oT>KmNk' );
define( 'NONCE_KEY',        'g aNgLwRu4xwyUB3fIAa87S*BSXJ#oz-7b z {s#?9]dp[Cfs_)|iv,w%ssl/.Vh' );
define( 'AUTH_SALT',        'Y*7O$9u]@c9:,S#)2&3BF |/)yp[AOBqm;8Iz/4)xG69`GqO<O~,-jW_,@BVCK<I' );
define( 'SECURE_AUTH_SALT', 'Q~1FH72uUB)@[M;!U}cw#=TIE[hq9z:4T20|n%==KL.J*gKqvg>qhp}(bd5g~#+~' );
define( 'LOGGED_IN_SALT',   'P~4r!~QDFTZ#fBkO!mAS*d/[]qi.MZe MUSSeG/TaZ00g6rksMi(1<W3mvLB[BJq' );
define( 'NONCE_SALT',       ' j!;N./&U0lf$qZsXY,+hl|a0.#utaC./6e#F~_:@KH$+l9!ZgWghVdXhL7B drJ' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
