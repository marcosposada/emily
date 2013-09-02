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
define('DB_NAME', 'emily');

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
define('AUTH_KEY',         '6>cVc96x#2pn!yKP/k:9~~KQK)4gYqmFq}]s!aJ`&#l}7o,{8*l_e:oR{1 gec![');
define('SECURE_AUTH_KEY',  'bZky@0`05m:Ckug,;|mWkH%BUFyvg^t;Qa?QK2nV;.T],5<LEYokovRgS}RBUL.A');
define('LOGGED_IN_KEY',    'Gb&8xK_/yXV $NHAJ/=iELmYow}F3m2U0eui2B?C^LCJgu8y7-0ULYwH-_gJCt9V');
define('NONCE_KEY',        ';6k4#hG|&<y3l8YGY}I;k<+G}Q0|- n+xIc1L5r}-%#z7kd;EyT:2(1v+M&/ig!s');
define('AUTH_SALT',        'u_=wsX{:#dpeL@d?<]:{?|*V0]k*?Z:Lr3k9LWl:%LXoy ]CT3z6n/RZNN0M#;p4');
define('SECURE_AUTH_SALT', 'tJx_8h27|*m}4-7a_~8PCv5&WT:f{4Sr#$y(jIx|1MZ/JppZmH )@k v`MkTb-T:');
define('LOGGED_IN_SALT',   '13! iXepr@{L)<0cn=qy<OlTHd^awn*eWkuW~l)s)pVQd_<Rp+Mvu5E]{VugVZTc');
define('NONCE_SALT',       '&kf>xxeS,ex2*YT:^*[v9p2UXE8MFC2GaVJ#>qee-o5/$)HODNgT@RaHhn6xoBN3');

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
