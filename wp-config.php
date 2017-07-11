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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'NUj4=B<b1:^BS z(1iN[_VxFQR >MM)o)eqJLU?[isGy<W`=ZpEdl@OvKL6pNC)|');
define('SECURE_AUTH_KEY',  '~#(+QIfTDWr Q?E7|ll_- q)lZ|aT ZR]}mwhtJA>Y.RG]l)8fbg14!sZrD|E34r');
define('LOGGED_IN_KEY',    'WZ4eT!BVuj_kPeGp 0,]P`?({5`$:NEog3MepMe}cSnvHoZuMIG1sYY!E1!/-3jV');
define('NONCE_KEY',        '}h:vD+~h7}/u)U*2.QHxu$zgt4yk|Y?g5nx3-.TSvoW1k]sV]EVX1labD*wHLK?9');
define('AUTH_SALT',        'FaDyu6UyX;bl$2Xs#NPspiijZ+^ aZChGf@/x{PR1*%o^_mW9&.LVp(@u>[mf&fe');
define('SECURE_AUTH_SALT', 'E1/gMY.XXxh=s?xB3Ee4H&cbD`nkqhcfG(fc5Fo~jbNl2D*90,/#vFo#YY&SLcbU');
define('LOGGED_IN_SALT',   'T8rdN,S2%(6^d;D.AH0I$^<SbAa/@dZ#i*,=h$8e(KSF)0AWS#r4K|$v?k>f<snp');
define('NONCE_SALT',       'ST6qmi}%54m](*Pw~.p#.g8sZt}BK[+!H.ZheK?WE3-nz}=ErqQ|M)U^inGU@?5A');

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
