<?php

/**
 * 
 * @param string $smartyPathPrefix use cur dir by default
 */
function loadSmarty($smartyPathPrefix='.')
{
	global $smarty;
	
	$smarty = new Smarty;
	
	$smarty->template_dir = $smartyPathPrefix . '/_templates/';
	
	$smarty->cache_dir = 	$smartyPathPrefix . '/_resources/cache/';
	$smarty->compile_dir = 	$smartyPathPrefix . '/_resources/templates_c/';
	$smarty->config_dir = 	$smartyPathPrefix . '/_resources/configs/';
	
	$smarty->assign("WALKMVC_ROOT", APP_FRAMEWORK_ROOT );
	$smarty->assign("APP_ROOT", APP_WEB_ROOT );
	
	//$smarty->force_compile = true;
	//$smarty->debugging = true;
	
	// $smarty->caching = true;
	// $smarty->cache_lifetime = 120;
}


?>