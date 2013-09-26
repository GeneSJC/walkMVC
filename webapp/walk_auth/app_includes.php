<?php

	// 3rd-PARTY INCLUDES
	
require_once '../../php/codeguy-Slim/Slim/Slim.php';

require_once '../../php/phpDataMapper/Base.php';
require_once '../../php/phpDataMapper/Adapter/Mysql.php';

// place holder used by map_*.php class definitions
class MapperBase extends phpDataMapper_Base{}


require_once('../../php/smarty/libs/Smarty.class.php');


	// walkMVC INCLUDES
	
require_once '../../php/misc_util.php';



	// app-specific INCLUDES

require_once './app_cfg.php';
require_once './app_message.php';

require_once './util_formcfg.php';
require_once './util_session.php';	
require_once './util_smarty.php';

	// START model includes - after base includes
	
require_once './post/logic_post.php';
require_once './post/form_post.php';
require_once './post/map_post.php';

require_once './user/form_login.php';
require_once './user/form_register.php';
require_once './user/form_recover.php';
require_once './user/form_pwd_reset.php';
require_once './user/logic_user.php';
require_once './user/logic_recover.php';
require_once './user/map_user.php';
require_once './user/map_recover.php';

	// END model includes

function getRestConfig()
{
	\Slim\Slim::registerAutoloader();
	$app = new \Slim\Slim();
			
	require_once './user/rest_user.php';
	require_once './user/rest_register.php';
	require_once './user/rest_recover.php';
	require_once './post/rest_post.php';	
	
	return $app;
}
?>
