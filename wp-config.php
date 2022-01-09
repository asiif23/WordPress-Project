<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'cobalms' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4jDai9jjZ1&^;>SWM4ZWhtMf.IeWK@`bB4#%Rs{5Eu=f,#R@>XH&7NRkHqm=7bxe' );
define( 'SECURE_AUTH_KEY',  '&SNR4bf.1nsr|mWFID;,[*y+rev.K~B?lk#UK>,G5H0kp+DVa3? j7~o&HeuJqzv' );
define( 'LOGGED_IN_KEY',    'DBPDFj;{A$f3i&W*=/DCv7ILCbH>&6OhsMYQv14oMk%cOPPc+7IYcR@ub(h/wmb6' );
define( 'NONCE_KEY',        'RX<LZ-W,QO;S7aTW@t@6P9(4ME}Y3*f% (XfkU-RZ;{nRSs8>r>/C[&8|zZ)d|Lw' );
define( 'AUTH_SALT',        '@[!eeIf+WfmImbC5</|MfCjB!~|PVgqYtiM*ZW}Y.Ww&<#]N_yI)10~+O6[_3k<<' );
define( 'SECURE_AUTH_SALT', 'Jx]DF/acb<+X}IPlwe>[6c?v*WTIRrvszHr!cZ+kOz;bs!M{8M-8],i&cmltIH<n' );
define( 'LOGGED_IN_SALT',   'lW[vj3tjf~{_trYp)vSl*VE)^n&Cp:L8U/.[K~E.V#P:O9|vdb@!L`u%:ECKp*!>' );
define( 'NONCE_SALT',       'g?RdY]#ev96eT2AQW4:,0)E1K0sB!LK1zuCbp/cnf/PXV)axQowAb3C(56!*axs&' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
