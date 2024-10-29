<?php
// Stolen shamelessly with some modifications from Mark Jaquith's WordPress
// Skeleton project: https://github.com/markjaquith/WordPress-Skeleton

// Load composer autoloader if it's available
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    include(__DIR__ . '/../vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
} else if (file_exists(dirname(__DIR__) . '/vendor/autoload.php')) {
    require_once dirname(__DIR__) . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $_SERVER['DB_DATABASE']);

/** MySQL database username */
define('DB_USER', $_SERVER['DB_USERNAME']);

/** MySQL database password */
define('DB_PASSWORD', $_SERVER['DB_PASSWORD']);

/** MySQL hostname */
define('DB_HOST', $_SERVER['DB_HOST']);

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

/**#@-*/
define('AUTH_KEY',         'U{(OOQOps7ya&wE0B;|sF(tB,KOjXXt}lmvmCpWGQNq(S(! &#G))F]!n&^a84a*');
define('SECURE_AUTH_KEY',  'IZ=9-|3op+$J+1w q.r8#[6n;CP+5Bds?`fCg0yON1L.N<iL?cIc|:^KJuSxX9hE');
define('LOGGED_IN_KEY',    'Wdvbx6n|S|lpY~%D{8-4>?s-bXBds?u5k1^yMQ*lM-3VNT<N;f-+Y4hJ[&qF;R;:');
define('NONCE_KEY',        'W)pZX*%yJ+u&0jGk:e2I~YUc2Ult+i;[9.2(H$bXBri)fLSjuXm-I+psBBw+jw+v');
define('AUTH_SALT',        's`K^|sa+SV-^8z4]AgBM*QWtzk,8Q[V&;!zqs|HZRlrd-_3&gA2^;+/e^6+n1s5L');
define('SECURE_AUTH_SALT', 'am-`bQWg;LOh7tNRq=J1OEIr7da4nw@p-vBuGa|Ww||+%>y&,#3ER7R6}3j;d3GN');
define('LOGGED_IN_SALT',   '@h+3T)zkf+o^+2@yXEG@9.[)JcroWelC_e SFLq:faKpn)!7nPt.YW9-AydnZ0ph');
define('NONCE_SALT',       'Do9}37O#r``%F~VZEjX#y5G-5r!P;G^}*5m:C2Jsu`XHf_41t.=*p|~=;vgHJI~!');

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
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', $_SERVER['APP_DEBUG'] == 'true' ? true : false);

if ($_SERVER['APP_ENV'] != 'local') {
    define('AUTOMATIC_UPDATER_DISABLED', true);
    define('DISALLOW_FILE_EDIT', true);
    define('DISALLOW_FILE_MODS', true);
}

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
//define( 'WP_STAGE', '%%WP_STAGE%%' );
//define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

/** Automatically set paths */
define('WP_HOME', ($_SERVER['APP_SSL'] == 'true' ? 'https://' : 'http://') . ($_SERVER['APP_WWW'] == 'true' ? 'www.' : '') . str_replace('www.', '', $_SERVER['HTTP_HOST']));
define('WP_SITEURL', ($_SERVER['APP_SSL'] == 'true' ? 'https://' : 'http://') . ($_SERVER['APP_WWW'] == 'true' ? 'www.' : '') . str_replace('www.', '', $_SERVER['HTTP_HOST']) . $_SERVER['APP_CORE']);


define('WP_CONTENT_DIR', __DIR__ . '/content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content');

// ===================
// Bootstrap WordPress
// ===================
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/wp/');
}
require_once(ABSPATH . 'wp-settings.php');
