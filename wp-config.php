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
 ****** T7&6AZ4I$Fcf0a(v@3d$34
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'odysseydb_f44');

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
define('AUTH_KEY',         'je*)24LxXVkp[*Tx,REVvu?jW2-q LwK%!re@cy,;.Xl,b;tdBB+-jG01=774|Ts');
define('SECURE_AUTH_KEY',  'FF(&S-Hs-d&vNFhzo0)R&i1@BLtZ3<Rvjf<g]S!m,9j:iMTUL4e^IxvByPnpI.Nf');
define('LOGGED_IN_KEY',    '<7KxPmZ1*1 gs#P8^Yp!#nt3zrr[L9{_3Nm%/Ab~W Pm.x9iWqDVo]i`cgcwPn&_');
define('NONCE_KEY',        '$[j8&NC>MA@,fy:?zbm|E<ZrVYgKr1Y*Wap^&qs*[z7<TdarAaz+erWYI#gDC[;p');
define('AUTH_SALT',        'H^%4u}sH>l%B$DQ0e=ez`iU7PZ}9(7n{1pm+n6)RYpPA,*d-!F@5CgI#YCf#5,Jr');
define('SECURE_AUTH_SALT', 'Cn!U3N^0KEY1mW^p:CO-/e9!{xev_qO,ty(HWQ17TX_/?fmtJgyV2i<moZ[9B4*^');
define('LOGGED_IN_SALT',   '=G)1.;A4]%813F3e12sfGxZkpV@/,b?c.|s9J4%x5pd3;qQc6Z%O(xOJ[wNiC3dt');
define('NONCE_SALT',       '3-jcl#j`]![O2uUA,:}|q+oH%V}pkcP K}^5&fLEkc1^4=(1~{wIOf{paMG~}%Cy');

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