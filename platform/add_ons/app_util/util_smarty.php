<?php

/**
 * Util for setting up core Smarty elements 
 *
 */
class SmartyUtil
{
	/**
	 * 
	 * @param string $smartyPathPrefix use cur dir by default
	 */
	public static function loadSmarty($smartyPathPrefix='.')
	{
		global $smarty;  // the global smarty is instantiated in this function
		
		$smarty = new Smarty;
		
		$smarty->template_dir = $smartyPathPrefix . '/_templates/';
		
		$smarty->cache_dir = 	$smartyPathPrefix . '/_resources/cache/';
		$smarty->compile_dir = 	$smartyPathPrefix . '/_resources/templates_c/';
		$smarty->config_dir = 	$smartyPathPrefix . '/_resources/configs/';
		
		$smarty->assign("APP_FRAMEWORK_ROOT", 	APP_FRAMEWORK_ROOT );
		$smarty->assign("APP_WEB_ROOT", 				APP_WEB_ROOT );
		$smarty->assign("APP_REST_ROOT", 				APP_REST_ROOT );			
		$smarty->assign("BASE_CSS_ROOT", 				BASE_CSS_ROOT );
		$smarty->assign("BASE_IMG_ROOT", 				BASE_IMG_ROOT );
		$smarty->assign("BASE_JS_ROOT", 					BASE_JS_ROOT );
		
		// doesn't make sense to call this in the beginning
		// must call it after all logic completes - as is done in rest_register.php 
		// Leaving here for reference
		SmartyUtil::setStatusMessages();
		
		if ( defined('TEMPLATE_ROOT'))
		{
			$smarty->assign("TEMPLATE_ROOT", 				TEMPLATE_ROOT );
		}
		
		if ( BaseAppUtil::isSessionUserSet() )
		{
			$smarty->assign("USER_ID", 		BaseAppUtil::getSessionUserId()  );
			$smarty->assign("USER_NAME", 	BaseAppUtil::getSessionUserName()  );
		}
		else if ( FacebookApiUtil::$APP_ID != null)
		{
			// BaseAppUtil::xlog ("calling setFacebookLoginButtonData()");
			
			SmartyUtil::setFacebookLoginButtonData();
		}
		
		//$smarty->force_compile = true;
		//$smarty->debugging = true;
		
		// $smarty->caching = true;
		// $smarty->cache_lifetime = 120;
	}

	public static function setStatusMessages()
	{
		global $smarty;
		
		$okMsg = BaseAppUtil::getAndClearMessage('success_msg');
		if ($okMsg)
		{
			$smarty->assign("message", 	$okMsg );
		}
		
		$errMsg = BaseAppUtil::getAndClearMessage('error_msg');
		
		BaseAppUtil::xlog("setStatusMessages gets error msg = $errMsg");
		
		if ($errMsg)
		{
			$smarty->assign("error_msg", 	$errMsg );
		}		
	}

	/**
	 * Sets a single function to be loaded into the <body onload=".."> call
	 * 
	 * @param string $loadFunctionName
	 */
	public static function setOnLoad($loadFunctionName=null)
	{
		global $smarty;
		
		$loadSearchForm = $loadFunctionName;
		
		// FIXME - should be corrected to use just the *Arr
		
		// Used in body_dForm_onload.tpl
		$smarty->assign("loadFormFuncArr",$loadSearchForm); // must set this - can be array or individual element
	}

	public static function setSingleFormOnLoad($formCfg=null)
	{
		$funcName = str_replace("-", "_", $formCfg->formId);
		$funcName = 'load_' . $funcName . '()';
		
		SmartyUtil::setDFormData($formCfg);
		SmartyUtil::setOnLoad($funcName);
	}
	
	/**
	 * Sets error and calls to render login page
	 * 
	 * @param string $errorCode
	 * @param string $view optional alternative to login view
	 */
	public static function renderLoginForError ($errorCode=null, $view=null)
	{
		global $smarty, $app;

		$msg = Msg::get($errorCode);
		$smarty->assign("error_msg", $msg);
		
		if ($view)
		{
			$smarty->display($view);
		}
		else
		{
			// BaseAppUtil::setErrorMessage($msg); 
			
			$app->redirect(APP_REST_ROOT . '/public/login');
		}
	}

	/**
	 * Here we set the Smarty params to support config data for FB Login Button
	 */
	public static function setFacebookLoginButtonData()
	{
		global $smarty;
	
		// BaseAppUtil::xlog ("setFacebookLoginButtonData()");
		
		if (  startsWith(DOMAIN, 'http://localhost')
				||
				BaseAppUtil::isSessionUserSet() )
		{
			return;
		}
		
		$facebook_api = FacebookApiUtil::getFacebookApi();
	
		$smarty->assign("loginUrl", APP_REST_ROOT . '/public/initFacebookLogin');
		$smarty->assign("fbAppId", $facebook_api->getAppID());
	}	

/**
 *
 * @param string $formCfg A concrete class that we are referencing via it's base class
 * @deprecated deleteme
 */
	public static function setDFormData($formCfg=null)
	{
		global $smarty;

		$formCfg->loadFormFieldArray();
		$jsonArr = $formCfg->jsonArr; // getJsonArray();

		$smarty->assign("dFormId", $formCfg->formId);
		$smarty->assign("dFormJSON",$jsonArr);
	}
	
}



	