<?php

require_once './app_includes.php';	

$smartyPathPrefix = '.';
loadSmarty($smartyPathPrefix);

	// IMPORTANT: These includes must come after the $app declaration above & before the ->run() call below
$app = getRestConfig();

	// FOR DEMO
$app->get('/sayHello', 'sayHello' ); 
function sayHello () 
				{ echo "hello2"; }



session_start();

$app->run();
