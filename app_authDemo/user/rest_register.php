<?php

	// viewXYZ should reference a Smarty template (.tpl)
	// actionXYZ should reference some controller logic

	// we can try to use the same path if get/post are different ?!
$app->get('/access/public/register',  'viewRegistration' );  
$app->post('/access/user/register',  'actionRegister' );  

$app->get('/access/doFacebookRegister', 'actionRegisterFacebookLogin' );

define('FB_PASSWORD',	'fbpwd99887722882255fbpwd@@');
define('UPDATE_EMAIL_DOMAIN',	'@PleaseUpdateEmail_myCompany.com');

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
	
	var_dump($_POST);
	die('h3');
	
	$userLogic = new UserLogic();
	$result = $userLogic->actionRegister();
	
	// echo $result;
	$app->redirect('../access/public/login/' . Msg::SUCCESS_REGISTER);
}

/**
 * Expectation: $_POST is already populated with register form data
 */
function actionRegisterFacebookLogin ()
{
	if ( isFacebookUserRegister() )
	{
		$fb_user_profile = FacebookApiUtil::getFacebookUserProfile();
		if ( ! $fb_user_profile )
		{
			handleNoSuccess(Msg::FACEBOOK_USER_IS_NULL);
			return;
		}
		
		$new_username = UserLogic::getUniqueUsername($fb_user_profile['first_name']);
		
		RegisterFormConfig::setRegisterPostData ($new_username);	
	}
	
	actionRegister(); // from rest_user.php
}

