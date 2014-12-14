<?php

class AppIncludes
{
	/**
	 * 3rd-party includes
	 * 
	 * @param string $pathPrefix
	 */
	public static function doFrameworkIncludes($platformPath=null)
	{
		require_once $platformPath . '/add_ons/app_util/base_app_includes.php';
		
		IncludeBaseUtil::doFrameworkIncludes($platformPath);		
	}
	
	public static function doAddonIncludes($platformPath=null)
	{
		$platformPath .= '/add_ons/model';
		
		IncludeBaseUtil::doAddonIncludes($platformPath);
		
			// supports user & facebook
		IncludeBaseUtil::doRestAddons($platformPath);
	}
	
	public static function appLevelIncludes($pathPrefix=null)
	{
		// app-specific INCLUDES
		
		require_once $pathPrefix . '/_util/app_cfg.php';
		require_once $pathPrefix . '/_util/app_message.php';
		require_once $pathPrefix . '/_util/app_util.php';
		
		// START model includes - after base includes
		
		require_once $pathPrefix . '/model/post/logic_post.php';
		require_once $pathPrefix . '/model/post/form_post.php';
		require_once $pathPrefix . '/model/post/map_post.php';
	}
	
	/*
	*/
		// END model includes
	
	public static function loadRestConfig($pathPrefix=null)
	{
		global $app;
		
		if ( ! $pathPrefix || ! $app )
		{
			die ('You must provide the $pathPrefix to getRestConfig(), and initialized the slim $app var');
		}
	
		require_once $pathPrefix . '/model/post/rest_post.php';	
	}
}