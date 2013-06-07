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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         ':7ygn(p2%,<.QZlUJ f+vo*]v%OaNx|X6O(-!2O,Z^4_c&ja-G<T5+i30}@S#7rO');
define('SECURE_AUTH_KEY',  '{p,(uE9*P!#x}OWp1Hwi*0j~+|w,4bK8>Ce+<m8^D]-b@vnIFc&{N;+Yk1,w so8');
define('LOGGED_IN_KEY',    'Szcx+-7qE:R6v8r+Zyk7+[Hs?;r)3$y9E;Q!S=<~4[++%A&GgWWk];)`(#Uy1/Ta');
define('NONCE_KEY',        '3$?J*|0-X -a}e[ixE.m*%vZMsCpdL52S~p1+M~yf*[sd].EMU%sz+bp`|#^)##|');
define('AUTH_SALT',        '9NjR6q.ZbV<8nOJ+]o],$FV[6Hc>hiL9VW%x^ag{rgV9aIwY/Mj;T=rwezw1_eW_');
define('SECURE_AUTH_SALT', 'n~ 7%l(Cs((xw~{g,*FA!@5l5Rce:qp5vOE+G8 YlAzPaP=w&8J*Piq1bwMX[mv`');
define('LOGGED_IN_SALT',   'IN+)CFP0$F~~E4.>IXR}Ja`3K`aJ_r<KF@?-XhG[DK>]J)7ay5;*|)>Xzmtcl1FQ');
define('NONCE_SALT',       '(}xL34E^)IllA{Z|-IA?()lgdB(0MYDKs1hr-x~_?rTRPrePkPSi=;QJ1AP8QnVe');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_base_';

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

define( 'WP_HOME', 'http://precisionweldingoffroad.dev' );
define( 'WP_SITEURL', 'http://precisionweldingoffroad.dev' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
