<?php

// must be called prior to app includes, since they check for user id
// when running in public page, it is just an extra call with miniscule overhead
session_start();  

require_once './_util/app_cfg.php';
require_once './_util/app_includes.php';	

$platformPath = '../platform';
AppIncludes::doFrameworkIncludes($platformPath);

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

AppIncludes::doAddonIncludes($platformPath);

AppIncludes::appLevelIncludes(APP_FILE_PATH);

$smartyPathPrefix = '.';
SmartyUtil::loadSmarty($smartyPathPrefix);

AppIncludes::getRestConfig('.');

// ==================
// REST DEMO
// --------------------

$app->get('/access/sayHello', 'sayHello' ); 
function sayHello () 
				{ echo "hello2"; }

$app->run();

// ==================
// FACEBOOK SETUP
// --------------------

$fbAppId = FacebookCfg::APP_ID;
$fbSecret = FacebookCfg::SECRET;
FacebookApiUtil::init($fbAppId, $fbSecret);
