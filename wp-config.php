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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'auto-minhtrang');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '-ScVwP%:t@p>+qc76}Cw3SV55|6AKn}ANp,oR;`|Nb77SJ6zB)n)aNl-`rF?1/d-');
define('SECURE_AUTH_KEY',  '0USPZ[R>H}n6Ct5FJXGTKFR%$ZIqr5:brydOjA>M?-Ao[]Ik #-}<uE4g:M/~*9w');
define('LOGGED_IN_KEY',    '2]niHfR&EKg_Dj`>KI,r{&zC;_1vlFv>FpKxnm$Lu!]=<(bxGVEGSk!!ELh ~G,$');
define('NONCE_KEY',        '^^2nn-+PHKW9?-O2NOJdgztJEsSRm(S6}XWk@MNgc64,0Q[[qL+|BB5@qGg-)j59');
define('AUTH_SALT',        ';|-S|:sHJ(7>|kM*RPgjX}c`4HS53--gr~c+1+R:+IEP;M^s?nVRjC&,4/v9lUY4');
define('SECURE_AUTH_SALT', '-zmc]~LdVyKy]-/ InJ9L+srL<2#bD~n2E&7vJD!!-sI}fH[n={Ldat&sRV3-cT=');
define('LOGGED_IN_SALT',   'Jse%YlA6jUA;EY_+GemZ|J*qm%>8a~MF4WBy/<c6e*4#v=Hhf+1X-yw(8%{@S,=[');
define('NONCE_SALT',       'R|9du;tVq,1a+57#*aC+-g,&L-]d#-3pKAf*h)+)1p_/wwu@k2W%v!TT8.QF#)a7');
define( 'WP_AUTO_UPDATE_CORE', false );
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'jc_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
