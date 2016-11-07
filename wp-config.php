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
define('DB_NAME', 'rjiba_pfe');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WMM 1>jpKieG>8U`_9%Pd`_OWHyZqM@y1n<z,>g=(:xlWUlph|h^:ZN^=ohA|u2T');
define('SECURE_AUTH_KEY',  'R{{28dB]76`./9[|5`8:Z&v5B^W/rL!^l=j//sE-# Nk54x20uM?s!L(P`RK1m/>');
define('LOGGED_IN_KEY',    '!s.U,%Q~b#gqEE}zTzJzaZ%{R6l_m5:9U_tv%x]h#Y=G=XcC>PA%OvXAj=,@4-i)');
define('NONCE_KEY',        'cI`hMt0,$EQH(`32KJ$/)}HAQzyG3rV#go#2_>NDPk$9kME$dR|pGw1`s0ncV4bE');
define('AUTH_SALT',        '[e%F>@o2O7_6]$eC;76y;-.6@uUBVMy,lemlegOt.d?zS3~Okl^Vf-r@M03<qb~t');
define('SECURE_AUTH_SALT', 'c7?H+G.IS UC)O0R$X{EvR=}XJ&>$?48vF?MRxoPtplb*~Xt9aCnkUn6]5A9uVDp');
define('LOGGED_IN_SALT',   '%,( k^q}Db2TS>%m (S>r7vX75vOH@:Ee{lF~dfp5ihXrs(gl/8P+vzMVm2D{fn~');
define('NONCE_SALT',       'UG:tktb!},64Xh!pm~|bK`+5)+V~.;,}O4SV_JkPzA(cM47@GhTwUKwmynF8YPs`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
