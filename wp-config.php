<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'salons');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ' -8Gu~+b+{:yP**XoltS]CGvoEgIR=d7Qb+U{sph|Z`J6y+hcmRci[{-|$(Xbq,d');
define('SECURE_AUTH_KEY',  'xOrhd)lX#3w7gh.xx9NUItj@|U3(pFhl^p3u@?4p}..tqJ$NeAm$&CT`|lUe)d`W');
define('LOGGED_IN_KEY',    'Ho~U5*rDf!<^|Bjng  gJ!LMz1<<9gG1H8>Z/x3fy;XbT0^5~XsB^*NWH=:0]m-P');
define('NONCE_KEY',        'B/fKU *P7ZWPx[zca9<wP*Z{paqvh=k )_*ArrS1GQ<HzZ+rCbokJYfM[U_g#xOp');
define('AUTH_SALT',        'wY}J`+Rnkeyn.KjQfIjz/>*F24^tX=@Bv!/fQOZUZ6KU%?~I5M.xn:CM>p03dS5/');
define('SECURE_AUTH_SALT', '@RX`)E)-,$(R)JB|Akmih,||}Dh~goE_IQB?bj35]3,Of@%u]Ru8e]MHT4u!Cj-c');
define('LOGGED_IN_SALT',   '2Q=]4sngQ?</U$g ))#)?>S}_^]Q- $MD_l45p3xq[T<:HoBVM^BxA?0Ed|-*_j%');
define('NONCE_SALT',       'U#o>Bh-;A-e.4PxXc2&X]PvV`|H`#4jmvZyL%e/[Tw+2N5sz=ZFZ+k#(*d$X&2^<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
