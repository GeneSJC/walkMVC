<?php

	// viewXYZ should reference a Smarty template (.tpl)
	// actionXYZ should reference some controller logic

	// we can try to use the same path if get/post are different ?!
$app->get('/access/public/register',  viewRegistration );  
$app->post('/access/user/register',  actionRegister );  


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

function actionRegister() 
{
	global $app, $smarty;
	
	$userCtrl = new UserController();
	$result = $userCtrl->actionRegister();
	
	// echo $result;
	$app->redirect('../public/login/1');
}



?>


