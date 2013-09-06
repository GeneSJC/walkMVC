<?php

	// only viewXYZ should reference a Smarty template (.tpl)
	// all other REST actions shall be prefixed by the controller name

	// For each level of REST hierarchy - group by VIEWS, then ACTIONS
	
	// LEVEL: /access/public
	
$app->get('/access/public/home',  viewLogin );  
$app->get('/access/public/login',  viewLogin );  
$app->get('/access/public/register',  viewRegistration );  
$app->get('/access/public/recover',  viewPwdRecover );
  
$app->get('/access/public/logout',  actionLogout );  


	// LEVEL: /access/user
	
$app->get('/access/user/home',  viewUserHome ); // watch out to use 'get', & not post for redirects

$app->post('/access/user/login',  actionLogin );  
$app->post('/access/user/register',  actionRegister );  
$app->post('/access/user/recover',  actionRecover );  



// ==================
// PUBLIC VIEWS
// --------------------
function viewLogin() 
{
	global $smarty;
	
	$smarty->assign("title", "Login");
	
	$loginFormCfg = new LoginFormConfig();
	$loginFormCfg->loadFormFieldArray();
	
	$jsonArr = $loginFormCfg->jsonArr; // getJsonArray();

	$smarty->assign("action", $loginFormCfg->action);
	$smarty->assign("dFormId", $loginFormCfg->formId);
	$smarty->assign("dFormJSON",$jsonArr);
	
	$smarty->display('user/login.tpl');
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

function viewPwdRecover() 
{
	global $smarty;
	
	$smarty->assign("title", "Login");
	$smarty->display('login.tpl');
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
	$userCtrl->actionRegister();
	
	$smarty->assign("title", "Registration page");
	$smarty->assign("result", $result);
	$smarty->display('register_results.tpl');		
}


function actionRecover() 
{
	global $app;
	
	$userCtrl = new UserController();
	$userCtrl->actionRecover();
	
	$app->redirect('../public/login'); // this view verifies the session
}




	// FOR DEMO
$app->get('/access/sayHello', sayHello ); 
function sayHello () 
				{ echo "hello2"; }


?>