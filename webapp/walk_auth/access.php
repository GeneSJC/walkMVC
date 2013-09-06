<?php

require_once './app_includes.php';	



\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

	// IMPORTANT: These includes must come after the $app declaration above & before the ->run() call below
require_once './user/rest_user.php';
require_once './user/rest_recover.php';
require_once './post/post_rest.php';


$app->run();