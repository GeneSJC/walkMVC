<?php

// die('hi');

require_once './_util/app_cfg.php';

$pathPrefix = '../walkMVC';
// die ($pathPrefix);

require_once ($pathPrefix . '/php/codeguy-Slim/Slim/Slim.php');

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

	// FOR DEMO

$app->get('/access/sayHello', 'sayHello' ); 
function sayHello () 
	{ echo "hello1"; }

$app->get('/access/sayHello2', 'sayHello2' ); 
function sayHello2 () 
	// { echo "hello2"; }
	
{ 
  global $app;
  $app->redirect('../access/sayHello'); 
}

$app->run();


