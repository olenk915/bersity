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

//define('WP_CACHE', false); //Added by WP-Cache Manager
//define( 'WPCACHEHOME', '/home/bandver5/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('WP_ALLOW_MULTISITE', true);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
$base = '/';
define('DOMAIN_CURRENT_SITE', 'local.iris.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

//Activate Admin Bar in Buddypress
//define( ‘BP_USE_WP_ADMIN_BAR’, true ); 
 
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bandver5_mar23bandvers');

/** MySQL database username */
//define('DB_USER', 'bandver5_truepro');
define('DB_USER', 'root');

/** MySQL database password */
//define('DB_PASSWORD', '#K%MubqZ@$hc');
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         '?~c-JTkA$>+;lk%-|];?1J5kBZ:1+ 0f)yXVl&Q+GlP`KQu6GD3hd%?|rrE|5NoJ');
define('SECURE_AUTH_KEY',  'wnJuy|N},+]w~.G >N,Mykn*kE$A:X^NuU|L[I859RN()H.J{l_<YT!DjveVyRj&');
define('LOGGED_IN_KEY',    'C-36h4+[S%Lzrq,Ri!Doi~KvB/%(B+B({(%n8-#q-w6_P#XN+0j6M~h,HMcE>J;[');
define('NONCE_KEY',        '|EaGL-%*/Vi?.P1DhH#%wb(+m2hU6)ID/C7.P`M6djQ3GCpVw@YHuKh&joA8M5Q&');
define('AUTH_SALT',        'CJ|YdE|DB=uh|0oxIn:np.l-^`V>qiuv^,+gVCQ&2]2]CdOcN>%Xs_Cyn.DJ24Uv');
define('SECURE_AUTH_SALT', 'E{mB+ZX]-@OWk UF4[BV(~& $/*|_T-hJ<J<}G@X+Hiz|<{+;;+|e79A_pquw73e');
define('LOGGED_IN_SALT',   'RJ?JfVP9uEauc!hJ?:JQN-EPBA/QRrR,L1]#2wC~.HGAxO0uoreBuCG{y8X%2+]o');
define('NONCE_SALT',       'Ix6*f+0cJ)Y<,U+qVf$(e?[y(FcGMAghKqW-KOr; /Nl30YWeUQp[[98LA6+@Cw;');

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
define( 'WP_DEBUG', true);
define('WP_POST_REVISIONS', false );

define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '256M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
