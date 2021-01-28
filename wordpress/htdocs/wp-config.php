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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'stage-rsd' );

/** MySQL database username */
define( 'DB_USER', 'stage-rsd' );

/** MySQL database password */
define( 'DB_PASSWORD', 'jrjc7aNfDqoCCPGF!' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bc93a204762391637e15e29444c4aec9dab7543f2157da06fc1a3604ce37ec95');
define('SECURE_AUTH_KEY',  '20c805cede705e4e14b8b45c689f2d11ea42f8a933cce436755de26214f3480b');
define('LOGGED_IN_KEY',    '50a3e5d02d207e3a380c47d6f91652e3afbbb644a227aef0ec6414fc67bce474');
define('NONCE_KEY',        '08e97170d0905e14dbbd9ed8a47af435b9d4cb096515a74ac78cf195b2a0e2c3');
define('AUTH_SALT',        '88158efc69c27a4d0388e853830428a48c9fdc8a6d86c14086eecb5b938f1009');
define('SECURE_AUTH_SALT', '95a8d8f9c31901e7ff3c16019fbac66ff8ef56afaeb19f750814be06f3579414');
define('LOGGED_IN_SALT',   '910966023ef25bcf4cd117af73a3218dc5e0ac00520080fdef32756d8df51d45');
define('NONCE_SALT',       '312d203ca7d00d50a7bc86a9de1073b68954e4d3f93e25cca55d0efe4bee1b5f');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
*/

if ( defined( 'WP_CLI' ) ) {
    $_SERVER['HTTP_HOST'] = 'localhost';
}

define('WP_SITEURL', 'https://rsd.stage.curio.codes');
define('WP_HOME', 'https://rsd.stage.curio.codes');


/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('WP_TEMP_DIR', 'D:/XAMPP/apps/wordpress/tmp');


//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks
//  More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/

if ( !defined( 'WP_CLI' ) ) {
    // remove x-pingback HTTP header
    add_filter('wp_headers', function($headers) {
        unset($headers['X-Pingback']);
        return $headers;
    });
    // disable pingbacks
    add_filter( 'xmlrpc_methods', function( $methods ) {
            unset( $methods['pingback.ping'] );
            return $methods;
    });
    add_filter( 'auto_update_translation', '__return_false' );
}
