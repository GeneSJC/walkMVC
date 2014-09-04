<?php

	// viewXYZ should reference a Smarty template (.tpl)
	// actionXYZ should reference some controller logic

$app->get('/access/public/login',  'viewLogin' );  
$app->get('/access/public/login/:msgId',  'viewLogin' );  
  
$app->get('/access/public/logout',  'actionLogout' );  

$app->get('/access/user/home',  'viewUserHome' ); // watch out to use 'get', & not post for redirects

$app->post('/access/user/login',  'actionLogin' );  

$app->get('/access/user/update',  'viewChangePassword' );  
$app->post('/access/user/update',  'actionResetPassword' ); //

$app->get('/access/doFacebookLogin', 'actionFacebookLogin' );

function viewChangePassword() 
{
	global $smarty;

	$pwdFormCfg = new PasswordResetFormConfig();
	
	$pwdFormCfg->resetKey['value'] = 'reset';
	
	$pwdFormCfg->loadFormFieldArray();
	
	$jsonArr = $pwdFormCfg->jsonArr; // getJsonArray();
	
	$smarty->assign("title", "Change Password");
	
	$smarty->assign("action", $pwdFormCfg->action);
	$smarty->assign("dFormId", $pwdFormCfg->formId);
	$smarty->assign("dFormJSON",$jsonArr);
	
	$loadRecoverForm = 'loadChangePwdForm()';
	
	// Used in body_dForm_onload.tpl
	$smarty->assign("loadFormFuncArr", $loadRecoverForm);
	
	$smarty->display('user/reset_pwd.tpl');
}


function actionResetPassword()
{
	global $app;

	$userLogic = new UserLogic();
	$result = $userLogic->actionResetPwd(); // FIXME: check for errors

	if ( $result == Msg::SUCCESS)
	{
		BaseAppUtil::setSuccessMessage("Pwd updated successfully");
	}
	else
	{
		BaseAppUtil::setErrorMessage("Error happend for pwd update.  Result code: $result");
	}

	if ( BaseAppUtil::isSessionActive())
	{
		$restPath = '../user/update';
	}
	else
	{
		$restPath = '../public/login';
	}
	
	BaseAppUtil::xlog("actionResetPassword result code = $result, redirecting now	");
	$app->redirect($restPath); // this view verifies the session
}


// ==================
// PUBLIC HANDLERS
// --------------------
function viewLogin($msgId=0) 
{
	global $smarty;

	$loginFormCfg = new LoginFormConfig();
	
	if ($msgId != 0)
	{
		$message = Msg::get($msgId);
		$smarty->assign("message", $message);
		
		// reset form fields
		// $loginFormCfg->login = getPostParam('login');
		// $loginFormCfg->password = getPostParam('password');
	}
	
	$smarty->assign("title", "Login");
	
	$loginFormCfg->loadFormFieldArray();
	
	$jsonArr = $loginFormCfg->jsonArr; // getJsonArray();

	$smarty->assign("action", $loginFormCfg->action);
	$smarty->assign("dFormId", $loginFormCfg->formId);
	$smarty->assign("dFormJSON",$jsonArr);

	$loadLoginForm = 'loadLoginForm()';
	$smarty->assign("loadFormFuncArr",$loadLoginForm);
	
	// don't try to show the button on localhost
	if ( ! startsWith(DOMAIN, 'http://localhost') )
	{
		// handled in SmartyUtil::loadSmarty
		// SmartyUtil::setFacebookLoginButtonData();
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
	BaseAppUtil::redirectIfNoSession(); // FIXME - set some variable to indicate no session
	
	global $smarty;
	
	$smarty->assign("title", "Profile Home");
	$smarty->display('user/profile.tpl');
}

function actionLogin() 
{
	global $app;
	$successRestPath = APP_REST_ROOT . '/user/home';
	
	$userLogic = new UserLogic();
	$resultCode = $userLogic->actionLogin();

	if ( $resultCode <  Msg::SUCCESS ) // Msg::SUCCESS is 0
	{
		SmartyUtil::renderLoginForError($resultCode);
		return;
	}
	
	BaseAppUtil::xlog("Login result code: $resultCode");
	
	$msg = BaseMsg::get($resultCode);
	
	BaseAppUtil::setSuccessMessage("Login successful");
	
	$app->redirect($successRestPath); // this view verifies the session
}


// ==================
// FACEBOOK HANDLERS
// --------------------

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
