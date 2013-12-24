<?php

	// viewXYZ should reference a Smarty template (.tpl)
	// actionXYZ should reference some controller logic

$app->get('/access/public/home',  'viewLogin' );  
$app->get('/access/public/login',  'viewLogin' );  
$app->get('/access/public/login/:msgId',  'viewLogin' );  
  
$app->get('/access/public/logout',  'actionLogout' );  

$app->get('/access/user/home',  'viewUserHome' ); // watch out to use 'get', & not post for redirects

$app->post('/access/user/login',  'actionLogin' );  
$app->get('/access/doFacebookLogin', 'actionSubmitFacebookLogin' );

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
	
	$smarty->display('user/login.tpl');
}

function actionLogout() 
{
	global $app;

	$userLogic = new UserLogic();
	$userLogic->actionLogout();
	
	$app->redirect('../public/login');
}

function actionSubmitFacebookLogin ()
{
	global $app;

	$_POST['login'] = 'aa';
	$_POST['password'] = 'aa';

	actionLogin(); // from rest_user.php
}



// ==================
// MEMBER-ONLY VIEWS
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
	
	$userLogic = new UserLogic();
	$userLogic->actionLogin();
	
	$app->redirect(APP_WEB_ROOT . '/user/home'); // this view verifies the session
}


?>


