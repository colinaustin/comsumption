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
define('DB_NAME', 'db174732_com1');

/** MySQL database username */
define('DB_USER', '1clk_wp_PoLEMXG');

/** MySQL database password */
define('DB_PASSWORD', 'KzwWWD26');

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
define('AUTH_KEY',         'YNoE25Np boeVeAVY eHR8xrR8 3mg6LmLx xrXJsu46');
define('SECURE_AUTH_KEY',  'Z1zeLemj 4jt2XzCh M7nKIQ2t rWjI6uZt ANUJGB1g');
define('LOGGED_IN_KEY',    'wuhFhW3P h15bQRHK c5nVclhA oUg75H2f gCZJn5ZI');
define('NONCE_KEY',        'EXLfqiQI I8TrHll3 JJ5G8azN NbU3oiUY KIy4gusx');
define('AUTH_SALT',        'EHUdxeOD staq8FUh I8pJwLW2 yTOaOezD lDLuU33a');
define('SECURE_AUTH_SALT', '7px2bbLa pJW4nZWW c7cGsSxk emfEthp4 qzsilII2');
define('LOGGED_IN_SALT',   'HSHg3FUm P2ry8uzu cH1u4oxq k8HtXv4P d4icIGUr');
define('NONCE_SALT',       'N1VRzkuh zf5adXxm nWxaLaaT lU6HqdGs vm2yND8r');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
