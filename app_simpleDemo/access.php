<?php

// ==============================
// ----- SESSION INIT ------
/*
 * must be called prior to app includes, since they check for user id
 * when running in public page, it is just an extra call with miniscule overhead
 */
session_start();  


// ==============================
// ----- LOCAL PATH INFO ------

localInit();

/**
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

// =====================
// ----- REST DEMO ------

$app->get('/access/sayHello', 'sayHello' ); 
function sayHello () 
				{ echo "hello2"; }

$app->run();

