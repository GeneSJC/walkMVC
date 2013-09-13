<?php

	// 3rd-PARTY INCLUDES
	
require_once '../../php/codeguy-Slim/Slim/Slim.php';

require_once '../../php/phpDataMapper/Base.php';
require_once '../../php/phpDataMapper/Adapter/Mysql.php';

require_once('../../php/smarty/libs/Smarty.class.php');


	// walkMVC INCLUDES
	
require_once '../../php/misc_util.php';



	// app-specific INCLUDES

require_once './app_cfg.php';

require_once './util_formcfg.php';
require_once './util_session.php';	
require_once './util_smarty.php';

	// START model includes - after base includes
	
require_once './post/map_post.php';
require_once './post/ctrl_post.php';
require_once './post/form_post.php';

require_once './user/map_user.php';
require_once './user/map_recover.php';
require_once './user/ctrl_user.php';
require_once './user/ctrl_recover.php';
require_once './user/formcfg_login.php';
require_once './user/formcfg_register.php';
require_once './user/formcfg_recover.php';
require_once './user/formcfg_password.php';

	// END model includes

?>
