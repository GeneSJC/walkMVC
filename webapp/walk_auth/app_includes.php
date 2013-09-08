<?php

	// 3rd-PARTY INCLUDES
	
require_once '../../php/codeguy-Slim/Slim/Slim.php';

require_once '../../php/phpDataMapper/Base.php';
require_once '../../php/phpDataMapper/Adapter/Mysql.php';




	// walkMVC INCLUDES
	
require_once '../../php/form_config_base.php';
require_once '../../php/misc_util.php';



	// app-specific INCLUDES

require_once './util_db.php';
require_once './util_session.php';	
require_once './load_smarty.php';




	// START model includes - after base includes
	
require_once './post/map_post.php';
require_once './post/ctrl_post.php';
require_once './post/formcfg_post.php';

require_once './user/map_user.php';
require_once './user/user_ctrl.php';
require_once './user/formcfg_login.php';
require_once './user/formcfg_register.php';
require_once './user/formcfg_recover.php';

	// END model includes

