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
define('DB_NAME', 'lakshyac_wplcl');

/** MySQL database username */
define('DB_USER', 'lakshyac_wplcl');

/** MySQL database password */
define('DB_PASSWORD', '4!e9(P8MS9');

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
define('AUTH_KEY',         '6g8lezyarsyyylwrinpl2hm4kxfaq9rdpp1kqq1gyeamisltgm9cogis8wphem9p');
define('SECURE_AUTH_KEY',  'pyj1ikwb53prgpjjhwgayqoqq2e7qavgrbxgx7qaempzh6ipkqmhgrvc606mazft');
define('LOGGED_IN_KEY',    'i26vxxyqrewst73bgbr5hmrgf6t17lobz0hud3til8qmw49gxda1kheuypzzjher');
define('NONCE_KEY',        'qwsm1330gsoojowm1883wilopk8dlic1vpwfpyqgh08cidjapoax0fgx0njuu4nz');
define('AUTH_SALT',        '55dtt6bhwn5vw9aj3n1xfbnogcpu1itkfjx0m7y66hjks8no3tuhhi8zvguyd12m');
define('SECURE_AUTH_SALT', 'jnsr0oz6lxnuxab6xjegsb5ei0aog92nrjdh2grtaltexw8dphzqxjdwwfjzl030');
define('LOGGED_IN_SALT',   'qwpyn39tznbdy8mljy5b5vdk5ebbc0odkzrvtwo9lbmuvenctuvaqhko4yov9zlf');
define('NONCE_SALT',       '6pvdbkx9kutkfqyxhaqsimocnnn3gknj6uctxkgc2cuh6rulcthskjiftksu4xz6');

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
