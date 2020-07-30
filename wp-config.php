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

define('DB_NAME', "persianapa");


/** MySQL database username */

define('DB_USER', "root");


/** MySQL database password */

define('DB_PASSWORD', "");


/** MySQL hostname */

define('DB_HOST', "localhost");


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

define('AUTH_KEY',         'p{4js&,uiCjdgcf)=&RZ-!S=p,xZ,qrDhX6Z_UizX*CL/)t[&.Ckm~aF~sE.AMFd');

define('SECURE_AUTH_KEY',  '}ZESrcm>O~V4>2W5?z+Rj(dfT%2]^9]q$JUTh*))#}o`b?f3AJlC@ObGX$R2I2$-');

define('LOGGED_IN_KEY',    'C`H;,=;vwX{J74#>z3?<^@_W!d_>8-FL=27z7{p%%ELuraYH@]i?KxAi,#|A*6X5');

define('NONCE_KEY',        '2y?lJ4CKUC1(a3QcON:V?YYw=)ZQ*P+k.ioOB}cZMOB{;mjm=aUW0z]Nr_`55kv[');

define('AUTH_SALT',        '+7(rFC0h2+2SBnof~z{zAS8+w7=ahO|actEQHBy*[luU+`X:aqce0U~J2vHN#sU9');

define('SECURE_AUTH_SALT', '3d}N}Jw&|BF|9^9hz~5n^sc~h!rF0k,%U{8$TA`s. 9B`,Cx5L1_Zitlgv#s<Q-#');

define('LOGGED_IN_SALT',   '=r2z9#8`]Y&q}Y|0yQNrqwcO+OA|pH<&N+*j8tgB$E4^$=TC`>HSSP)0>U{3|aV9');

define('NONCE_SALT',       'ib{h,3H90U6OvjD0zTnGW2QQw+|0(CjTL9HVG9zSlQKFu&Y*B{H^4dED( >q]Oo1');


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

