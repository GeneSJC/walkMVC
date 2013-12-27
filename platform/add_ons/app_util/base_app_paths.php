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
	
	private static function setRestPath($filename=null, $rootPath=null)
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

define('APP_WEB_ROOT', 				DOMAIN . APP_SUBDOMAIN);  
define('APP_FRAMEWORK_ROOT', 	DOMAIN . WALKMVC_SUBDOMAIN);  

	// WEB PAGE RESOURCES
	
define('RESOURCES_ROOT', 	APP_WEB_ROOT . '/_resources');
define('BASE_IMG_ROOT', 		RESOURCES_ROOT . '/img');
define('BASE_CSS_ROOT', 		RESOURCES_ROOT . '/css');

	// 2) SET FILE SYSTEM PATH INFO
	// ==================================================

define('APP_WALKMVC_FILE_PATH', 	WEB_ROOT_FILE_PATH . WALKMVC_SUBDOMAIN);  
define('APP_FILE_PATH', 					WEB_ROOT_FILE_PATH . APP_SUBDOMAIN);  
define('APP_LOG_PATH', 					APP_FILE_PATH . '/_resources/walk.log'); 


