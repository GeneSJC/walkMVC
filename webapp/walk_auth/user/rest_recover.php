<?php

	// only viewXYZ should reference a Smarty template (.tpl)
	// all other REST actions shall be prefixed by the controller name

	// For each level of REST hierarchy - group by VIEWS, then ACTIONS
	
$app->get('/access/public/recover',  viewPwdRecover );
$app->get('/access/public/recover/:msgId',  viewPwdRecover );

$app->get('/access/public/login',  viewLogin );
$app->get('/access/public/login/:msgId',  viewLogin );

$app->post('/access/user/recover',  actionSendRecoverEmail );  

	// we can try to use the same path if get/post are different ?!
	
$app->get('/access/user/reset/:resetKey',  viewResetPassword ); // 
$app->post('/access/user/reset',  actionResetPassword ); // 

function viewPwdRecover($msgId=0) 
{
	global $smarty;
	
	$message = handleRecoverMessage($msgId);
	if ($message)
	{
		$smarty->assign("message", $message);
	}
	
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
	
	$recoverCtrl = new RecoverController();
	$errorCode = $recoverCtrl->actionSendRecoverEmail(); // FIXME: check for errors
	
	xlog("actionSendRecoverEmail rest");
	$restPath = '../public/recover';
	if ($errorCode != 0)
	{
		$restPath .= '/' . $errorCode;
	}
	
	xlog("actionSendRecoverEmail rest - redirecting now	");
	$app->redirect($restPath); // this view verifies the session
}

function handleRecoverMessage($msgId=null)
{
	if (!$msgId)
		return null;

	if($msgId == 1)
	{
		$message = "Recover password email was emailed.";
	}

	if($msgId == -3)
	{
		$message = "Unknown email address.";
	}

	if($msgId == -4)
	{
		$message = "Unexpected error.";
	}

	return $message;
}

/**
 * ACTIONS:
 * 	1) Verify the reset key exists
 *  2) Get the userid for that key
 *  3) When the user submits a valid password reset, they submit the key with it
 *  4) Once reset, delete
 * @param string $resetKey
 */
function viewResetPassword($resetKey=null)
{
	global $smarty;
	
	echo "thanks for the key = $resetKey";
	return;
	
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


