<?php

// NOTE: relative paths are the local path for access.php file (which includes this file)

define('WEB_ROOT_FILE_PATH', 			'/Library/WebServer/Documents/dev');
define('DOMAIN', 								'http://localhost/dev');

define('WALKMVC_SUBDOMAIN', 			'/walkMVC/platform');
define('WALKMVC_PLATFORM_PATH', 	WEB_ROOT_FILE_PATH . WALKMVC_SUBDOMAIN);

define('APP_SUBDOMAIN', 					'/walkMVC/app_authDemo');

define('SMARTY_PATH', 	'./client'); // will look for _templates folder here

define('DB_SERVER', 	'127.0.0.1');
define('DB_NAME', 		'walkmvc');
define('DB_USER', 		'root');
define('DB_PWD', 		'root');

	// DB SETTINGS
	// ========================
	
class AppCfg
{
	/**
	 * Order of static function calls below is important - changing it will likely cause errors
	 * 
	 * @param string $platformPath
	 * @param string $smartyPathPrefix
	 */
	public static function init($platformPath=null, $smartyPathPrefix=null)
	{
		PathUtil::setRestPathWithFileInUrl('access');
		// PathUtil::setRestPathNoFileInUrl('access');
		
		PathUtil::setCssTemplatePath (BASE_CSS_ROOT . '/SomeCssTemplate');
		
		AppIncludes::doAddonIncludes($platformPath);
		
		AppIncludes::appLevelIncludes(APP_FILE_PATH);
		
		// ==================
		// FACEBOOK SETUP
		// --------------------
		
		$fbAppId = FacebookCfg::APP_ID;
		$fbSecret = FacebookCfg::SECRET;
		FacebookApiUtil::init($fbAppId, $fbSecret);
		
		SmartyUtil::loadSmarty($smartyPathPrefix);
		
		AppIncludes::loadRestConfig(APP_FILE_PATH);
	}
}


/**
 * ==============================
 * ----- LOCAL PATH INFO ------
 */
function localInit()
{
	global $app;


	// ==============================
	// ----- SESSION INIT ------
	/*
	* must be called prior to app includes, since they check for user id
	* when running in public page, it is just an extra call with miniscule overhead
	*/
	session_start();

	AppIncludes::doFrameworkIncludes(WALKMVC_PLATFORM_PATH);

	\Slim\Slim::registerAutoloader();
	$app = new \Slim\Slim();

	// ==============================
	// ----- APP INIT ------

	AppCfg::init(WALKMVC_PLATFORM_PATH, SMARTY_PATH);
}


class FacebookCfg
{
	const APP_ID = 'a';
	const SECRET = 'b';
}