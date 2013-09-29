<?php

	// 3rd-PARTY INCLUDES
	
require_once '../../php/codeguy-Slim/Slim/Slim.php';

require_once '../../php/phpDataMapper/Base.php';
require_once '../../php/phpDataMapper/Adapter/Mysql.php';

// place holder used by map_*.php class definitions
class MapperBase extends phpDataMapper_Base{}


require_once('../../php/smarty/libs/Smarty.class.php');
require_once './_util/util_smarty.php';

	// walkMVC INCLUDES
	
require_once '../../php/misc_util.php';



	// app-specific INCLUDES

require_once './_util/app_cfg.php';
require_once './_util/app_message.php';
require_once './_util/app_util.php';

require_once './_util/util_formcfg.php';
require_once './_util/util_session.php';	


	// START model includes - after base includes
	
require_once './post/logic_post.php';
require_once './post/form_post.php';
require_once './post/map_post.php';

/*
*/
	// END model includes

function getRestConfig()
{
	\Slim\Slim::registerAutoloader();
	$app = new \Slim\Slim();
			
	require_once './post/rest_post.php';	
	
	return $app;
}
?>