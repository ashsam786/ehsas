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
define('DB_NAME', 'ehsas');

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
define('AUTH_KEY',         '=i7xR2$6al >>$ge-WimoJ*V1J@>6_>cVmi~zAs>H%r.RbN0+6HrnSbfOE(Qm#:b');
define('SECURE_AUTH_KEY',  'eR `f^^d+x%ssD&YqFc`qtk^OQ)|sCz?~2&F1_W9dtJ4qTKD=0z]c*kgaBT#L;66');
define('LOGGED_IN_KEY',    '|XXK$HJH-&GGe?>o0bDsD#Db#!?d@1i ,[pB}$mLqDFmB;5E81Ms(apsGKmU*]?7');
define('NONCE_KEY',        '[EY1a$Q.RaBjy/GgP8c}-EgvxgaK7FJ[no(?rkMT>+RTG9yL;ods/6EY*It!i}C/');
define('AUTH_SALT',        '}_8s??&bjwgU0,5 nrFu*<GZJDG#[7Y2XeFCLto5~3{65Iulm]VEXs e#aQDz~eP');
define('SECURE_AUTH_SALT', '=v(TbQH#8tw{2AzwX9a&oSc E2&(n,y@%d<uZW=Tp#7s4TXEot7@*]*L5QJRF]UL');
define('LOGGED_IN_SALT',   '`AnU2AFJ~K{=yA0^jJb:KtoD]3+,n%8w9H]9-rgY#$PxrP^/_DSlq,Ky82`cWw(.');
define('NONCE_SALT',       ')fUw|Vx;HR`JpM]jq`#dZ4gz25PqK5mJ/K&54F/(NEp@MUNmqV+GiYihdet-tQg?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
