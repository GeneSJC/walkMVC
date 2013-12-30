<?php

	// only viewXYZ should reference a Smarty template (.tpl)
	// all other REST actions shall be prefixed by the controller name

	// For each level of REST hierarchy - group by VIEWS, then ACTIONS
	
$app->get('/access/public/recover',  'viewPwdRecover' );
$app->get('/access/public/recover/:msgId',  'viewPwdRecover' );

$app->post('/access/user/recover',  'actionSendRecoverEmail' );  

	// we can try to use the same path if get/post are different ?!
	
$app->get('/access/user/reset/:resetKey',  'viewResetPassword' ); // 
$app->post('/access/user/reset',  'actionResetPassword' ); // 

function viewPwdRecover($msgId=0) 
{
	global $smarty;
	
	if ($msgId != 0)
	{
		$message = Msg::get($msgId);
		$smarty->assign("message", $message);
	}
	
	$recoverFormCfg = new RecoverFormConfig();
	
	SmartyUtil::setDFormData($recoverFormCfg);
	SmartyUtil::setOnLoad('loadRecoverForm()');

	$smarty->assign("title", RecoverFormConfig::TITLE);
	
	$smarty->display('user/forgot.tpl');
}


function actionSendRecoverEmail() 
{
	global $app;
	
	$recoverLogic = new RecoverLogic();
	$errorCode = $recoverLogic->actionSendRecoverEmail(); // FIXME: check for errors
	
	BaseAppUtil::xlog("actionSendRecoverEmail rest");
	$restPath = '../public/recover';
	if ($errorCode != 0)
	{
		$restPath .= '/' . $errorCode;
	}
	
	BaseAppUtil::xlog("actionSendRecoverEmail rest - redirecting now	");
	$app->redirect($restPath); // this view verifies the session
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

	if ( ! $resetKey )
	{
		echo "resetKey missing - try again";
		return;
	}
	
	global $smarty;
	
	$adapter = getDbAdapter();
	$recoverMapper = new RecoverMapper($adapter);
	
	$entry = $recoverMapper->first(array('reset_key' => $resetKey));
	
	if ( ! $entry )
	{
		echo "Unknown resetKey - try again";
		return;	
	}
	
	// now we know it exists
	BaseAppUtil::xlog("got resetkey = $resetKey");
	
// 	var_dump($entry);
// 	return;
	
	$pwdFormCfg = new PasswordResetFormConfig();
	
	$pwdFormCfg->resetKey['value'] = $resetKey;
	
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
	$userLogic = new UserLogic();
	$result = $userLogic->actionResetPwd(); // FIXME: check for errors
	
	echo $result;
}

