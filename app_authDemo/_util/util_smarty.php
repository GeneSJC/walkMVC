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
		
		self::setMessageValues();
		
		//$smarty->force_compile = true;
		//$smarty->debugging = true;
		
		// $smarty->caching = true;
		// $smarty->cache_lifetime = 120;
	}

	public static function setMessageValues()
	{
		global $smarty;
		
		xlog ("checking for successMsg");
		
		$successMsg = App::getSuccessMessage();
		if ($successMsg)
		{
			$smarty->assign('message', $successMsg);
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
		$smarty->assign("loadFormFunc",$loadSearchForm);
		$smarty->assign("loadFormFuncArr",$loadSearchForm); // must set this - can be array or individual element
	}
	
	/**
	 * 
	 * @param string $formCfg A concrete class that we are referencing via it's base class
	 */
	public static function setDFormData($formCfg=null)
	{
		global $smarty;

		$formCfg->loadFormFieldArray();
		$jsonArr = $formCfg->jsonArr; // getJsonArray();
		$smarty->assign("dFormId", $formCfg->formId);
		$smarty->assign("dFormJSON",$jsonArr);
	}

	/**
	 * Sets error and calls to render login page
	 * 
	 * @param string $errorCode
	 * @param string $view optional alternative to login view
	 */
	public static function renderLoginForError ($errorCode=null, $view=null)
	{
		global $smarty;

		$msg = Msg::get($errorCode);
		$smarty->assign("error_msg", $msg);
		
		if ($view)
		{
			$smarty->display($view);
		}
		else
		{
			$smarty->display('user/login.tpl');
		}
	}



}