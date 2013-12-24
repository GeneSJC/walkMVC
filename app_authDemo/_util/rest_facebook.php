<?php

/**
 * This is invoked upon successful login from the FB-login button
 */
$app->get('/access/public/fbLogin',  'actionFacebookLogin' );

/**
 * 1. Confirm we can get $fbUserId
 * 2. If $user doesn't exist - prime $_POST data & redirect to actionRegister
 */
function actionFacebookLogin()
{
	global $app;
	
	$fbUserId = FacebookApiUtil::getFbUserId(); // see function for global params accessible after this call
	if ( ! $fbUserId )
	{
		handleMissingFbUserId();
		return; 
	}
	
	$userProfile = UserFacebookLogic::getExistingUserProfile($fbUserId);
	if ( $userProfile != null )
	{
		// set the flag for a known fb_user
		LoginFormConfig::setLoginPostData ($userProfile);
		$app->redirect(APP_WEB_ROOT . '/doFacebookLogin');
		return;
	}
		
	// We will register the user if there is no $user entry in local db		

	handleFacebookUserRegister();
}

function handleFacebookUserRegister()
{
	$fb_user_profile = FacebookUtil::getFacebookUserProfile();
	if ( ! $fb_user_profile )
	{
		handleNoSuccess(Msg::FACEBOOK_USER_IS_NULL);
		return; 
	}
	
	$new_username = UserLogic::getUniqueUsername($fb_user_profile['first_name']);
	
	RegisterFormConfig::setRegisterPostData ($new_username);
	$app->redirect(APP_WEB_ROOT . '/doFacebookRegister');	
}

function handleNoSuccess($resultCode=null)
{
	$msg = Msg::get($resultCode);
	$smarty->assign("error_msg", $msg);
	$smarty->display('user/login.tpl');
}

function handleMissingFbUserId()
{
	$msg = Msg::get(Msg::UNEXPECTED_FACEBOOK_ERROR);
	$smarty->assign("error_msg", $msg);
	$smarty->display('user/login.tpl');	
}




?>


