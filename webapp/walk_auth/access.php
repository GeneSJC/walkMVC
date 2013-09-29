<?php

require_once './_util/app_includes.php';	

frameworkLevelIncludes('../..');
appLevelIncludes('.');

$smartyPathPrefix = '.';
loadSmarty($smartyPathPrefix);

$app = getRestConfig('.');

	// FOR DEMO
$app->get('/sayHello', 'sayHello' ); 
function sayHello () 
				{ echo "hello2"; }



session_start();

$app->run();
