<?php

function loadSmarty()
{
	global $smarty;
	
	$smarty = new Smarty;
	
	$smarty->template_dir = './_templates/';
	
	$smarty->cache_dir = './_resources/cache/';
	$smarty->compile_dir = './_resources/templates_c/';
	$smarty->config_dir = './_resources/configs/';
	
	$smarty->assign("WALKMVC_ROOT","http://localhost/dev/walkMVC/" );
	$smarty->assign("APP_ROOT","http://localhost/dev/walkMVC/webapp/walk_auth/access" );
	
	//$smarty->force_compile = true;
	//$smarty->debugging = true;
	
	// $smarty->caching = true;
	// $smarty->cache_lifetime = 120;
}


?>