<?php

	// viewXYZ should reference a Smarty template (.tpl)
	// actionXYZ should reference some controller logic
	
$app->get('/access/public/home',  viewLogin );  
$app->get('/access/public/login',  viewLogin );  
$app->get('/access/public/login/:msgId',  viewLogin );  
  
$app->get('/access/public/logout',  actionLogout );  
$app->post('/access/user/login',  actionLogin );  

$app->get('/access/user/home',  viewUserHome ); // watch out to use 'get', & not post for redirects



function actionLogout()
{
	global $app;

	$userCtrl = new UserController();
	$userCtrl->actionLogout();

	$app->redirect('../public/login');
}


function actionLogin()
{
	global $app;

	$userCtrl = new UserController();
	$userCtrl->actionLogin();

	$app->redirect('../user/home'); // this view verifies the session
}


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


	// FOR DEMO
$app->get('/access/sayHello', sayHello ); 
function sayHello () 
				{ echo "hello2"; }


?>


