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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'real-estate' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'OPy*eFT9zws9=PZ1=!HJ&*qLOG?P &6s$[F~f(S]I5+s%2ynjTKLv(OX7r9[H!q$' );
define( 'SECURE_AUTH_KEY',  '^i:=?&ow+TJeN|mne3Zt]|~{(%AO&%K`#^$T31NAx.BE`jn*Kq 6xwnvyNRfm)_U' );
define( 'LOGGED_IN_KEY',    'o]= o$me{u:BXEg9X(E?ui2jh4rI4/F[^i6VPSMT25B923kI%t?Iq,ki-GBM`:FE' );
define( 'NONCE_KEY',        'k)9 M_luGR#3q&GJt7q%?V{x9u>b]_?wIhLaK/_J/(N?@#yof*gzj,IXma~eUN -' );
define( 'AUTH_SALT',        '2@5|MP+6W2y|~-uOGqR;<N[j}KSk,?c?ox=#j[DyJV=if}`Ig!l3`Y!?NH<CUHpX' );
define( 'SECURE_AUTH_SALT', 'fJ4q.~ykrcg3_#<7{KW5TniU/=jYG%yr4unTr_wF/zPeK|.GQ~XA$23+Y`,[!0<_' );
define( 'LOGGED_IN_SALT',   'zUFM^<dTRDC`rq*;51OQ4-83KJ#G(KmkJv:T:agWBZ;a2G_l/cu<|dd+E>Pg@Z#a' );
define( 'NONCE_SALT',       'iRz~kX*65RzOZej9?zt@C@I]`~d*{QPic$x^7%m{T-}{;ES41=4q:lqK/5Fj-UdA' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 're_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
