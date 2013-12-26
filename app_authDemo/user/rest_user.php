<?php

	// viewXYZ should reference a Smarty template (.tpl)
	// actionXYZ should reference some controller logic

$app->get('/access/public/home',  'viewLogin' );  
$app->get('/access/public/login',  'viewLogin' );  
$app->get('/access/public/login/:msgId',  'viewLogin' );  
  
$app->get('/access/public/logout',  'actionLogout' );  

$app->get('/access/user/home',  'viewUserHome' ); // watch out to use 'get', & not post for redirects

$app->post('/access/user/login',  'actionLogin' );  

$app->get('/access/doFacebookLogin', 'actionFacebookLogin' );

// ==================
// PUBLIC VIEWS
// --------------------
function viewLogin($msgId=0) 
{
	global $smarty;
	
	if ($msgId != 0)
	{
		$message = Msg::get($msgId);
		$smarty->assign("message", $message);
	}
	
	$smarty->assign("title", "Login");
	$loginFormCfg = new LoginFormConfig();
	$loginFormCfg->loadFormFieldArray();
	
	$jsonArr = $loginFormCfg->jsonArr; // getJsonArray();

	$smarty->assign("action", $loginFormCfg->action);
	$smarty->assign("dFormId", $loginFormCfg->formId);
	$smarty->assign("dFormJSON",$jsonArr);

	// don't try to show the button on localhost
	if ( ! startsWith(DOMAIN, 'http://localhost') )
	{
		setFacebookLoginButtonData();
	}
	
	$smarty->display('user/login.tpl');
}


function actionLogout() 
{
	global $app;

	$userLogic = new UserLogic();
	$userLogic->actionLogout();
	
	$app->redirect('../public/login');
}


// ==================
// MEMBER-ONLY HANDLERS
// --------------------

function viewUserHome() 
{
	redirectIfNoSession(); // FIXME - set some variable to indicate no session
	
	global $smarty;
	
	$smarty->assign("title", "Profile Home");
	$smarty->display('user/profile.tpl');
}

function actionLogin() 
{
	global $app;
	$successPath = APP_REST_ROOT . '/user/home';
	
	$userLogic = new UserLogic();
	$resultCode = $userLogic->actionLogin();
	
	SmartyUtil::renderSuccessOrLoginForError ($resultCode, $successPath);
	
// 	if ( $resultCode !=  Msg::SUCCESS )
// 	{
// 		SmartyUtil::renderLoginForError(Msg::FACEBOOK_USER_IS_NULL);
// 		return;
// 	}
	
// 	$app->redirect(APP_REST_ROOT . '/user/home'); // this view verifies the session
}


// ==================
// FACEBOOK HANDLERS
// --------------------


function setFacebookLoginButtonData()
{
	global $smarty;

	$facebook_api = FacebookApiUtil::getFacebookApi();

	$smarty->assign("loginUrl", APP_REST_ROOT . '/public/initFacebookLogin');
	$smarty->assign("fbAppId", $facebook_api->getAppID());
}


/**
 *
 */
function actionFacebookLogin ()
{
	$fbUserId = FacebookApiUtil::getFbUserId();
	if ( ! $fbUserId )
	{
		SmartyUtil::renderLoginForError(Msg::FACEBOOK_USER_IS_NULL);
		return;
	}

	$user = UserFacebookLogic::getFacebookNativeUser($fbUserId);

	LoginFormConfig::setLoginPostData ($user->login, FB_PASSWORD);

	actionLogin(); // from rest_user.php
}
