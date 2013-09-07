<?php

	// only viewXYZ should reference a Smarty template (.tpl)
	// all other REST actions shall be prefixed by the controller name

	// For each level of REST hierarchy - group by VIEWS, then ACTIONS
	
	// LEVEL: /access/public
	
$app->get('/access/public/home',  viewLogin );  
$app->get('/access/public/login',  viewLogin );  
$app->get('/access/public/login/:msgId',  viewLogin );  
$app->get('/access/public/register',  viewRegistration );  
  
$app->get('/access/public/logout',  actionLogout );  


	// LEVEL: /access/user
	
$app->get('/access/user/home',  viewUserHome ); // watch out to use 'get', & not post for redirects

$app->post('/access/user/login',  actionLogin );  
$app->post('/access/user/register',  actionRegister );  

	// we can try to use the same path if get/post are different ?!
	


// ==================
// PUBLIC VIEWS
// --------------------
function viewLogin($msgId=0) 
{
	global $smarty;
	
	$message = handleLoginMessage($msgId);
	if ($message)
	{
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

function handleLoginMessage($msgId=null)
{
	if (!$msgId)
		return null;
	
	$message = null;
	if($msgId == 1)
	{
		$message = "Successful Registeration";
	}
	
	if($msgId == 2)
	{
		$message = "You don't have a session";
	}
	
	return $message;
}

function viewRegistration() 
{
	global $smarty;

	$registerFormCfg = new RegisterFormConfig();
	$registerFormCfg->loadFormFieldArray();
	
	$jsonArr = $registerFormCfg->jsonArr; // getJsonArray();
	
	$smarty->assign("action", $registerFormCfg->action);
	$smarty->assign("dFormId", $registerFormCfg->formId);
	$smarty->assign("dFormJSON",$jsonArr);
	
	$smarty->assign("title", "Register");

	$smarty->display('user/register.tpl');
}


function actionLogout() 
{
	global $app;

	$userCtrl = new UserController();
	$userCtrl->actionLogout();
	
	$app->redirect('../public/login');
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
	
	$userCtrl = new UserController();
	$userCtrl->actionLogin();
	
	$app->redirect('../user/home'); // this view verifies the session
}


function actionRegister() 
{
	global $app, $smarty;
	
	$userCtrl = new UserController();
	$result = $userCtrl->actionRegister();
	
	// echo $result;
	$app->redirect('../public/login/1');
}


	// FOR DEMO
$app->get('/access/sayHello', sayHello ); 
function sayHello () 
				{ echo "hello2"; }


?>


