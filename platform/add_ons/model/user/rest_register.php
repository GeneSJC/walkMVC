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

	// handled in SmartyUtil::loadSmarty
	// SmartyUtil::setFacebookLoginButtonData();
	
	$registerFormCfg = new RegisterFormConfig();

	SmartyUtil::setDFormData($registerFormCfg);
	SmartyUtil::setOnLoad('loadRegisterForm()');
	
	$smarty->assign("title", "Register");

	$smarty->display('user/register.tpl');
}

/**
 * Upon registering, will set the session info too
 */
function actionRegister() 
{
	global $app;
	
	$userLogic = new UserLogic();
	$resultCode = $userLogic->actionRegister();
	
	if ( $resultCode >= 0)
	{
		App::setSuccessMessage($resultCode);
	}
	
	$app->redirect(APP_REST_ROOT . '/user/home');
}

/**
 * Expectation: $_POST is already populated with register form data
 */
function actionRegisterFacebookLogin ()
{
	global $app;
	
	$fb_user_profile = FacebookApiUtil::getFacebookUserProfile();
	if ( ! $fb_user_profile )
	{
		SmartyUtil::renderLoginForError(Msg::FACEBOOK_USER_IS_NULL);
		return;
	}
	
	$new_username = UserLogic::getUniqueUsername($fb_user_profile['first_name']);
	
	RegisterFormConfig::setRegisterPostData ($new_username, $fb_user_profile['id']);	
	
	actionRegister();
	
	// $userLogic = new UserLogic();
	// $result = $userLogic->actionRegister();
		
	/*
	 * If the result is success, it means a few things:
	* a) Currently user logged in from FB
	* b) They have a native user entry setup
	* c) We can redirect to doFacebookLogin and it will be able to use current fb_userid to find the native user
	*
	*/
	// $app->redirect('../access/doFacebookLogin');
}

