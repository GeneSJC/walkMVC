<?php

	// 3rd-PARTY INCLUDES
	
require_once '../../php/codeguy-Slim/Slim/Slim.php';

require_once '../../php/phpDataMapper/Base.php';
require_once '../../php/phpDataMapper/Adapter/Mysql.php';




	// walkMVC INCLUDES
	
require_once '../../php/form_config_base.php';



	// app-specific INCLUDES

require_once './load_smarty.php';
require_once './load_session.php';	




	// START model includes - after base includes
	
require_once './post/post_mapper.php';
require_once './post/post_ctrl.php';
require_once './post/formcfg_post.php';

require_once './user/user_mapper.php';
require_once './user/user_ctrl.php';
require_once './user/formcfg_login.php';
require_once './user/formcfg_register.php';
require_once './user/formcfg_recover.php';

	// END model includes

