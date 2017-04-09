<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(__DIR__ .'/constants_config.php');
/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// custom constants
defined('NOREPLY_EMAIL')     OR define('NOREPLY_EMAIL', 'noreply@ehsas.in');      // set your base url here
defined('REGISTRATION_ADMIN_EMAIL')	OR define('REGISTRATION_ADMIN_EMAIL', 'info@ehsas.in');      // set your base url here

// links
defined('FB_LINK')      	OR define('FB_LINK', 'https://www.facebook.com/ehsas.in/?fref=ts'); 
defined('TWITTER_LINK')     OR define('TWITTER_LINK', '#'); 
defined('GOOGLEPLUS_LINK') 	OR define('GOOGLEPLUS_LINK', '#'); 
defined('EHSAS_TWITTER_HANDLE')	OR define('EHSAS_TWITTER_HANDLE', 'ashsam786'); 

//constants
defined('MOBILE_NUMBER_REGEX') 	OR define('MOBILE_NUMBER_REGEX', '/^\d{10}$/'); 
defined('UNFIT_DONOR_PERIOD') 	OR define('UNFIT_DONOR_PERIOD', 60); 

defined('PROJECT_NAME')    OR define('PROJECT_NAME', 'Ehsas'); 
defined('MAIN_TAGLINE')    OR define('MAIN_TAGLINE', 'ek zindagi bachane ka'); 
defined('MAIN_TITLE')      OR define('MAIN_TITLE', 'Ehsas - ek zindagi bachane ka'); 
defined('PAGE_TITLE')      OR define('PAGE_TITLE', 'Ehsas ek zindagi bachane ka');
defined('LOGO_IMAGE_URL')  OR define('LOGO_IMAGE_URL', BASE_URL.'/assets/img/logo.png');

defined('FEMALE_ALERT_MESSAGE') 	OR define('FEMALE_ALERT_MESSAGE', "Dear Sister, We appreciate you enthusiasm! We don't want your personal details to be made public! We will Soon come up with different option. You still can be part of group, By creating awareness about our cause! Kindly Encourage your friends via social networkings site to participate."); 
defined('FEMALE_ALERT_MESSAGE_TITLE') 	OR define('FEMALE_ALERT_MESSAGE_TITLE', "We Appreciate Your Enthusiasm - Jazakillahukhair."); 

