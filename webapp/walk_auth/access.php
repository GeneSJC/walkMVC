<?php

require_once '../../php/codeguy-Slim/Slim/Slim.php';

require_once './load_smarty.php';
require_once './load_session.php';	

require_once '../../php/phpDataMapper/Base.php';
require_once '../../php/phpDataMapper/Adapter/Mysql.php';

require_once '../../php/form_config_base.php';


	// START model includes - after base includes
	
require_once './post/post_mapper.php';
require_once './post/post_ctrl.php';
require_once './post/post_formcfg.php';

require_once './user/user_mapper.php';
require_once './user/user_ctrl.php';
require_once './user/formcfg_login.php';

	// END model includes



\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

require_once './rest_user.php';
require_once './rest_post.php';


$app->run();