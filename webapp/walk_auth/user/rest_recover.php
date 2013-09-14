<?php

	// only viewXYZ should reference a Smarty template (.tpl)
	// all other REST actions shall be prefixed by the controller name

	// For each level of REST hierarchy - group by VIEWS, then ACTIONS
	
$app->get('/access/public/recover',  viewPwdRecover );
$app->post('/access/user/recover',  actionSendRecoverEmail );  

	// we can try to use the same path if get/post are different ?!
	
$app->get('/access/user/reset',  viewResetPassword ); // 
$app->post('/access/user/reset',  actionResetPassword ); // 

function viewPwdRecover() 
{
	global $smarty;
	
	$recoverFormCfg = new RecoverFormConfig();
	$recoverFormCfg->loadFormFieldArray();
	
	$jsonArr = $recoverFormCfg->jsonArr; // getJsonArray();
	
	$smarty->assign("title", RecoverFormConfig::TITLE);
	
	$smarty->assign("action", $recoverFormCfg->action);
	$smarty->assign("dFormId", $recoverFormCfg->formId);
	$smarty->assign("dFormJSON",$jsonArr);	
	
	$smarty->display('user/forgot.tpl');
}


function actionSendRecoverEmail() 
{
	global $app;
	
	$userCtrl = new UserController();
	$userCtrl->actionSendRecoverEmail(); // FIXME: check for errors
	
	// $app->redirect('../public/login'); // this view verifies the session
}

function viewResetPassword()
{
	global $smarty;
	
	$pwdFormCfg = new PasswordFormConfig();
	$pwdFormCfg->loadFormFieldArray();
	
	$jsonArr = $pwdFormCfg->jsonArr; // getJsonArray();
	
	$smarty->assign("title", RecoverFormConfig::TITLE);
	
	$smarty->assign("action", $pwdFormCfg->action);
	$smarty->assign("dFormId", $pwdFormCfg->formId);
	$smarty->assign("dFormJSON",$jsonArr);	
	
	$smarty->display('user/reset_pwd.tpl');
}

function actionResetPassword()
{
	echo '.. actionResetPassword';
}

?>


