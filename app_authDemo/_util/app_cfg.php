<?php


/**
 * Go through all steps here to set up your deployment environment (local or live)
 * 1. Url Info
 * 2. Filesystem paths
 * 3. DB Info
 * 
 */


	// DB SETTINGS
	// ========================
	
class AppCfg
{
	static $DB_SERVER = '127.0.0.1';
	static $DB_NAME = 'walk_mvc';
	static $DB_USER = 'root';
	static $DB_PWD = '';
	
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
		
		SmartyUtil::loadSmarty($smartyPathPrefix);
		
		AppIncludes::loadRestConfig(APP_FILE_PATH);
		
		// ==================
		// FACEBOOK SETUP
		// --------------------
		
		$fbAppId = FacebookCfg::APP_ID;
		$fbSecret = FacebookCfg::SECRET;
		FacebookApiUtil::init($fbAppId, $fbSecret);
	}
}
