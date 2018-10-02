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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Q5b8egvRQuFNGvwprBprmSgDIqIGlsgpf9n5MCFHF+hoo36pNqAo2V4THeQQ0lgxChmMxmUHqzOwGKVVhLH2jw==');
define('SECURE_AUTH_KEY',  '1Xq3CqiaiIQcpS5zOy3q9U6D95ceeftowL0PGug8rYtg+HVorcUQBFMLLMZPMi4W6qnXMrMus5LCAJlk4/Qlww==');
define('LOGGED_IN_KEY',    'BB+6mgDlhQXaBy1JpJKXnLDLdSIF/xoxQNqxXolvRZuxOSf6zbAVYA7fsdlyNzz8gQ2ipmUaifMO2abbw7oggg==');
define('NONCE_KEY',        'BNgl1pVZsLv3fT+5G1286FD1g9eR0e4BvHD3U0fqsmHqS6/nDviAAE2mQViLPjB1Jgfma9rjEeHM0yoTIP6BNQ==');
define('AUTH_SALT',        'Cv2qjnRw/lFQIA51tglioQYAONh5ky64hh/GrYHndsnrOkYxUFW0dDXu41ud/VTKI14AqTxTmSW5xvpe44JD3w==');
define('SECURE_AUTH_SALT', 'pDBNaYY24oWpj1g4gxXyt48EZzMvcmMdYzZONUEtExCbujOWiB483DL141QUFl3zuLRB7CwOWA//qzNS/HM/0Q==');
define('LOGGED_IN_SALT',   'yS+bBueZdS1d9lzPSpLY/Rq293BoxvRHBxKRLBCb2IBIJVn9ttJLOI17m//VirV8gkFLnO+L5tUOI0dBY18+Xw==');
define('NONCE_SALT',       'eTGy67Q5+snlNwbf27YhL9AfsBr371YAl0gd0hFIKMhvDPPmTOh3uD6QXru/XHm+mb3N591InbunUDJB38i1KQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
