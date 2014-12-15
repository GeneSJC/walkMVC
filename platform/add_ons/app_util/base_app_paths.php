<?php

class PathUtil
{
	public static function setCssTemplatePath($path=null)
	{
		define('TEMPLATE_ROOT', $path);
	}
	
	public static function setRestPathNoFileInUrl($rootPath=null)
	{
		// for .htaccess to work, seems the rest root & .php file that contains it must be the same string
		$filename = $rootPath . '.php';
		
		self::setRestPath($filename, $rootPath);
		define('APP_REST_ROOT', APP_WEB_ROOT . APP_REST_ROOT_PATH);
	}
	
	/**
	 * 
	 * @param string $rootPath
	 * @param string $filename optional. If omitted, will use $rootPath to get filename
	 */
	public static function setRestPathWithFileInUrl($rootPath=null, $filename=null)
	{
		if ( ! $filename )
		{
			$filename = $rootPath . '.php';
		}
		
		self::setRestPath($filename, $rootPath);
		define('APP_REST_ROOT', APP_WEB_ROOT . APP_REST_ACCESS_FILE . APP_REST_ROOT_PATH);
	}
	
	public static function setRestPath($filename=null, $rootPath=null)
	{
		// REST PATHS
	
		// primary .php file that will serve as centralized REST dispatcher
		// necessary in url when the .htaccess rewrite isn't working
		define('APP_REST_ACCESS_FILE', '/' . $filename);
	
		// the top level path for any REST call
		// eg, 'access' in 'http://localhost/dev/walkMVC/myApp/access'
		define('APP_REST_ROOT_PATH', '/' . $rootPath);
	}	
}
	// ================================================
	// ========================
	// ... the remaining paths are relative and should all fall in place

	// 1) SET URL INFO
	// ========================

if ( ! defined('APP_WEB_ROOT'))
{
	define('APP_WEB_ROOT', 				DOMAIN . APP_SUBDOMAIN);  
	define('APP_FRAMEWORK_ROOT', 	DOMAIN . WALKMVC_SUBDOMAIN);  
}
else 
{
	// BaseAppUtil::xlog('APP_WEB_ROOT already set, skipping in base_app_paths.php');
}

	// WEB PAGE RESOURCES

// Assumes all related paths will be set
// FIXME - need to see where RESOURCES_ROOT is being used,
// since we now will be calling most of that stuff WEB_ROOT
// RESOURCES_ROOT is not used anywhere, but BASE_CSS_ and _IMG_ are
if ( ! defined('RESOURCES_ROOT'))
{
	define('RESOURCES_ROOT', 	APP_WEB_ROOT . '/_resources');
	define('BASE_IMG_ROOT', 		RESOURCES_ROOT . '/img');
	define('BASE_CSS_ROOT', 		RESOURCES_ROOT . '/css');
	define('BASE_JS_ROOT', 		RESOURCES_ROOT . '/js');
	
	// not used by smarty
	define('SMARTY_TEMPLATE_ROOT', 		RESOURCES_ROOT . '/_templates');
	
	// 2) SET FILE SYSTEM PATH INFO
	// ==================================================
	
	define('APP_WALKMVC_FILE_PATH', 	WEB_ROOT_FILE_PATH . WALKMVC_SUBDOMAIN);
	define('APP_FILE_PATH', 					WEB_ROOT_FILE_PATH . APP_SUBDOMAIN);
	
	define('APP_LOG_PATH', 			APP_FILE_PATH . '/_runtime/walk.log'); 
}
else
{
	// BaseAppUtil::xlog('RESOURCES_ROOT already set, skipping in base_app_paths.php');
}



