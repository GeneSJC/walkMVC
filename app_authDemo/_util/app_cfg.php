<?php

/**
 * Go through all steps here to set up your deployment environment (local or live)
 * 1. Url Info
 * 2. Filesystem paths
 * 3. DB Info
 * 
 */

// 0) "BASELINE" CONFIG PARAMETERS
// ========================

	// WEB PATHS

define('DOMAIN', 							'http://localhost/dev');
define('APP_SUBDOMAIN', 				'/walkMVC/app_authDemo');
define('WALKMVC_SUBDOMAIN', 		'/walkMVC/platform');

	// FILESYS PATHS
	
define('WEB_ROOT_FILE_PATH', 		'/Library/WebServer/Documents/dev');


	// REST PATHS

// main .php file that will serve as centralized REST dispatcher
// necessary in url when the .htaccess rewrite isn't working
define('APP_REST_ACCESS_FILE', '/access.php');

// eg, 'http://localhost/dev/walkMVC/myApp/access'
define('APP_REST_ROOT_PATH', '/access');


	// 3) DB SETTINGS
	// ========================
	
class AppCfg
{
	const DB_SERVER = '127.0.0.1';
	const DB_NAME = 'walk_mvc';
	const DB_USER = 'root';
	const DB_PWD = '';
}

class FacebookCfg
{
	const APP_ID = 'a';
	const SECRET = 'b';
}
