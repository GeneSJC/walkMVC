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
define('WALKMVC_SUBDOMAIN', 		'/walkMVC/walkMVC');

	// FILESYS PATHS
	
define('WEB_ROOT_FILE_PATH', 		'/Library/WebServer/Documents/dev');


	// REST PATHS

// main .php file that will serve as centralized REST dispatcher
// necessary in url when the .htaccess rewrite isn't working
define('APP_REST_ACCESS_FILE', '/access.php');

// eg, 'http://localhost/dev/walkMVC/myApp/access'
define('APP_REST_ROOT_PATH', '/access');


	// ================================================
	// ========================
	// ... the remaining paths are relative and should all fall in place

	// 1) SET URL INFO
	// ========================

define('APP_WEB_ROOT', 				DOMAIN . APP_SUBDOMAIN);  
define('APP_FRAMEWORK_ROOT', 	DOMAIN . WALKMVC_SUBDOMAIN);  


	// the top level path for any REST call
// define('APP_REST_ROOT', APP_WEB_ROOT . APP_REST_ROOT_PATH);  

	// with .php in the path
define('APP_REST_ROOT', APP_WEB_ROOT . APP_REST_ACCESS_FILE . APP_REST_ROOT_PATH);

	// WEB PAGE RESOURCES
	
define('RESOURCES_ROOT', 	APP_WEB_ROOT . '/_resources');
define('BASE_IMG_ROOT', 		RESOURCES_ROOT . '/img');
define('BASE_CSS_ROOT', 		RESOURCES_ROOT . '/css');
define('TEMPLATE_ROOT', 		BASE_CSS_ROOT . '/DesignShackTemplate');


	// 2) SET FILE SYSTEM PATH INFO
	// ==================================================

define('APP_WALKMVC_FILE_PATH', 	WEB_ROOT_FILE_PATH . WALKMVC_SUBDOMAIN);  
define('APP_FILE_PATH', 					WEB_ROOT_FILE_PATH . APP_SUBDOMAIN);  
define('APP_LOG_PATH', 					APP_FILE_PATH . '/_resources/walk.log'); 


	// 3) DB SETTINGS
	// ========================
	
class AppCfg
{
	const DB_SERVER = '127.0.0.1';
	const DB_NAME = 'walk_rsnpg';
	const DB_USER = 'root';
	const DB_PWD = '';
}

class FacebookCfg
{
	const APP_ID = 'a';
	const SECRET = 'b';
}

?>
