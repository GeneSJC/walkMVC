<?php

	// the top level path for any REST call
define("APP_REST_ROOT", '/access');

	//  main .php file that will serve as centralized REST dispatcher
define("APP_REST_ACCESS_FILE", 'access.php');  

define("APP_WEB_ROOT", 'http://localhost/dev/walkMVC/webapp/simpleDemo/access.php/access');  

	// You must update the path
	
$appPath = null;
// $appPath = 'C:\xampp\htdocs\dev\walkMVC\webapp\simpleDemo';
$appPath = '/Library/WebServer/Documents/dev/walkMVC/webapp/simpleDemo';
if ( !  $appPath )
{
	die ('You must set the $appPath in app_cfg.php.  Make sure it is set *for your filesystem*');
}

define("APP_FILE_PATH", $appPath);  

$logPath = null;
$logPath = '/_resources/walk.log'; // unix, mac
// $logPath = '\_resources\walk.log'; // windows
if ( !  $logPath )
{
	die ('You must set the $logPath in app_cfg.php.  Make sure it is set *for your filesystem*');
}


	// create file if it doesn't exist
	// echo ' ' >   walk.log
define("APP_LOG_PATH", APP_FILE_PATH . $logPath); 

class AppCfg
{
	const DB_SERVER = '127.0.0.1';
	const DB_NAME = 'walk_mvc';
	const DB_USER = 'root';
	const DB_PWD = '';
}


?>