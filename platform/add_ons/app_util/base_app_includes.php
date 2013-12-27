<?php

class IncludeBaseUtil
{
	
	public static function doFrameworkIncludes($platformPath=null)
	{
			// 3rd-PARTY INCLUDES
			
		require_once $platformPath . '/php/codeguy-Slim/Slim/Slim.php';
		
		require_once $platformPath . '/php/phpDataMapper/Base.php';
		require_once $platformPath . '/php/phpDataMapper/Adapter/Mysql.php';
		
		require_once($platformPath . '/php/smarty/libs/Smarty.class.php');
		
		require_once($platformPath . '/php/facebook_api/facebook.php'); // the api
		require_once($platformPath . '/add_ons/general/facebook_utils/util_facebook.php');
		
			// walkMVC INCLUDES
			
		require_once $platformPath . '/add_ons/general/util_string.php';
		require_once $platformPath . '/add_ons/general/util_file.php';
		require_once $platformPath . '/add_ons/general/util_misc.php';
		
		require_once $platformPath . '/add_ons/app_util/base_app_util.php';
		require_once $platformPath . '/add_ons/app_util/base_message.php';
		require_once $platformPath . '/add_ons/app_util/base_path_cfg.php';
		require_once $platformPath . '/add_ons/app_util/base_formcfg.php';
		
		require_once $platformPath . '/add_ons/app_util/util_smarty.php';
	}
	
	public static function doAddonIncludes($platformModelPath=null)
	{
		require_once $platformModelPath . '/user/form_login.php';
		require_once $platformModelPath . '/user/form_register.php';
		require_once $platformModelPath . '/user/form_recover.php';
		require_once $platformModelPath . '/user/form_pwd_reset.php';
		require_once $platformModelPath . '/user/logic_user.php';
		require_once $platformModelPath . '/user/logic_recover.php';
		require_once $platformModelPath . '/user/map_user.php';
		require_once $platformModelPath . '/user/map_recover.php';	
	}

	public static function doRestAddons($platformModelPath=null)
	{
		global $app;
	
		require_once $platformModelPath . '/user/rest_user.php';	
		require_once $platformModelPath . '/user/rest_register.php';
		require_once $platformModelPath . '/user/rest_recover.php';
		
		require_once $platformModelPath . '/user/rest_facebook.php';	
	}
	
}