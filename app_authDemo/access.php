<?php

// ==============================
// ----- SESSION INIT ------
/*
 * must be called prior to app includes, since they check for user id
 * when running in public page, it is just an extra call with miniscule overhead
 */
session_start();  

pathInit();

localInit();

// =====================
// ----- REST DEMO ------

$app->get('/access/sayHello', 'sayHello' );
function sayHello ()
{ echo "hello2"; }

$app->run();


/**
 * ==============================
 * ----- LOCAL PATH INFO ------
 * 
 * Helper function to keep inside access.php  , because:
 * a) Relative path info is for the folder that file is in
 * b) We can see the core config in the start file 
 * 		- eg, no need to see $app initialized elsewhere
 * c) In eclipse, can collapse the code for a more concise view of the access point file
 */
function localInit()
{
	global $app;
	
	$platformPath = '../platform';
	$smartyPathPrefix = '.';
	
	require_once './_util/app_cfg.php';
	require_once './_util/app_includes.php';
	
	AppIncludes::doFrameworkIncludes($platformPath);
	
	\Slim\Slim::registerAutoloader();
	$app = new \Slim\Slim();
	
	// ==============================
	// ----- APP INIT ------
	
	AppCfg::init($platformPath, $smartyPathPrefix);
}

function pathInit()
{
	// 0) "BASELINE" CONFIG PARAMETERS
	// ========================

	// WEB PATHS

	define('DOMAIN', 							'http://localhost/dev');
	define('APP_SUBDOMAIN', 				'/walkMVC/app_authDemo');
	define('WALKMVC_SUBDOMAIN', 		'/walkMVC/platform');

	// FILESYS PATHS

	define('WEB_ROOT_FILE_PATH', 		'/Library/WebServer/Documents/dev');
}