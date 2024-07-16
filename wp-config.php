<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'mynadiacademy' );

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
define( 'AUTH_KEY',         '7Y&Dvv)k_2A:72)2:ly_&zid{%1YFU|wN[q`iS4Zw{9ES`%mVr?!8x+j)DngE5<I' );
define( 'SECURE_AUTH_KEY',  's6rw0@!y0gH4>8u;[*LI+dOjO36;?P$uhl3yHllp/VjBmfbg0!27$6CS669TRFn/' );
define( 'LOGGED_IN_KEY',    'W?(X`/ GwG;:-d_WqbQ3/Z[<|@M{*73mBAV?A&5^&2TBP]hqjhzIMjO*qo08.3w1' );
define( 'NONCE_KEY',        'Lm^[UiGzdZ)_GzO[WhI#hwDp23, n%0aQSl~L%{gRL9^[A[x Nk=SASu..*WS0*[' );
define( 'AUTH_SALT',        'fho67K&b{]_#2}A<_G`3rN[H NrYJHVY4Vkp*BZK|B$4S400P5BvvD{5oWjc7?pN' );
define( 'SECURE_AUTH_SALT', '|Z>QsnzJ29;zX2h^)18)[{o? 6A/MG266h(r-A-22/YLG3$]3Db$bzVq SDNb4 3' );
define( 'LOGGED_IN_SALT',   'u:OF4GnQDDG6/T<Cdx10Pap:|&k#`,6kUKn<:Q`=Pc5MJgBLdnk1G|KcnovjO]R4' );
define( 'NONCE_SALT',       '*[g~KAM13[:}TLB20b<>Uonb7Xy#LQ[i/T?$PxxrfU?wv?T;3 cq`*3PY-iNOW]b' );

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
