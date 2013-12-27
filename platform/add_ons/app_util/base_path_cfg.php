<?php

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


