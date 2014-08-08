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
define('DB_NAME', 'sshotsites');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Test4Echo');

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
define('AUTH_KEY',         'J?U.+-Q%<%*_Y!D$yAy-L}Q|g{qVSoA9p-fU@WW-`v5TCS+/ZY$E_ZGgbT$x-,m}');
define('SECURE_AUTH_KEY',  'zplK)<uDAphL,q$*y6oM1PY)`1/>:uM3pW/-_peAGibBz^}u4fLs+sPmZN/yR;l>');
define('LOGGED_IN_KEY',    '0w0SXI?}=.S1t;b*@+j>&<1I[V[ZTCxZ?Id.X5X;+eM^Ys|5k!KXO_m(=]+|`%J!');
define('NONCE_KEY',        'K;lS^z0S$m/Pe<>-mHQg%w/7G!:.w[5ucMJ}2;FL]VdKZ#hg[gy:gA-Y~gN+Nwp*');
define('AUTH_SALT',        '5%_isT00VhTN7VIZ./1rdX=t2})+bZ*UH_TCAv(]Fg_Vl<2mnxeHYxQ|bpg^hIUV');
define('SECURE_AUTH_SALT', 'R+.ig:jn@,+wMC<L9FTLAA.cX-P!&;-UKucbu>;q0,hH =]RD+%j68_RpUR0m wt');
define('LOGGED_IN_SALT',   'H!M0@(mtL`|j7+](LZkAXg#l)3] :&-MwW&30Lz^o+nV,7v2g|0h?.h-+<?+!m>s');
define('NONCE_SALT',       '-<Un!C:.Qn6~SEOoyxh}* 7kL2FB6r&do2q+*KnoP9jUVrr-9 T/|$7k^oT9|Ar`');

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
