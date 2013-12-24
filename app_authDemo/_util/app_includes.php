<?php

function frameworkLevelIncludes($pathPrefix='../..')
{
		// 3rd-PARTY INCLUDES
		
	require_once $pathPrefix . '/php/codeguy-Slim/Slim/Slim.php';
	
	require_once $pathPrefix . '/php/phpDataMapper/Base.php';
	require_once $pathPrefix . '/php/phpDataMapper/Adapter/Mysql.php';
	
	require_once($pathPrefix . '/php/smarty/libs/Smarty.class.php');
	
	require_once($pathPrefix . '/php/facebook_utils/facebook_api/facebook.php'); // the api
	require_once($pathPrefix . '/php/facebook_utils/util_facebook.php');
	
		// walkMVC INCLUDES
		
	require_once $pathPrefix . '/php/util_string.php';
	require_once $pathPrefix . '/php/util_file.php';
	require_once $pathPrefix . '/php/util_misc.php';
}


function appLevelIncludes($pathPrefix='.')
{
	// app-specific INCLUDES
	
	require_once $pathPrefix . '/_util/util_smarty.php';
	
	require_once $pathPrefix . '/_util/app_cfg.php';
	require_once $pathPrefix . '/_util/app_message.php';
	require_once $pathPrefix . '/_util/app_util.php';
	
	require_once $pathPrefix . '/_util/util_formcfg.php';
	require_once $pathPrefix . '/_util/util_session.php';
	
	
	// START model includes - after base includes
	
	require_once $pathPrefix . '/post/logic_post.php';
	require_once $pathPrefix . '/post/form_post.php';
	require_once $pathPrefix . '/post/map_post.php';
	
	require_once $pathPrefix . '/user/form_login.php';
	require_once $pathPrefix . '/user/form_register.php';
	require_once $pathPrefix . '/user/form_recover.php';
	require_once $pathPrefix . '/user/form_pwd_reset.php';
	require_once $pathPrefix . '/user/logic_user.php';
	require_once $pathPrefix . '/user/logic_recover.php';
	require_once $pathPrefix . '/user/map_user.php';
	require_once $pathPrefix . '/user/map_recover.php';
	
}

/*
*/
	// END model includes

function getRestConfig($pathPrefix=null, $app=null)
{
	if ( ! $pathPrefix || ! $app )
	{
		die ('You must provide the $pathPrefix to getRestConfig(), and initialized the slim $app var');
	}

	require_once $pathPrefix . '/post/rest_post.php';	

	require_once $pathPrefix . '/user/rest_user.php';
	require_once $pathPrefix . '/user/rest_recover.php';
	require_once $pathPrefix . '/user/rest_register.php';
	
	require_once $pathPrefix . '/_util/rest_facebook.php';
	
	return $app;
}
