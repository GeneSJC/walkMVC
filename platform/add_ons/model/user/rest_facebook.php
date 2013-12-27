<?php

/**
 * This handler expects the the walkMVC /user model (login, auth, etc) is in play 
 * 
 */

/**
 * This is invoked upon successful login from the FB-login button
 */
$app->get('/access/public/initFacebookLogin',  'actionInitFacebookLogin' );

/**
 * 1. Confirm we can get $fbUserId
 * 2. If $user doesn't exist redirect to registration
 */
function actionInitFacebookLogin()
{
	global $app;
	
	$fbUserId = FacebookApiUtil::getFbUserId(); // see function for global params accessible after this call
	if ( ! $fbUserId )
	{
		SmartyUtil::renderLoginForError(Msg::FACEBOOK_USER_IS_NULL);
		return; 
	}
	
	$user = UserFacebookLogic::getFacebookNativeUser($fbUserId);
	if ( $user != null )
	{
		$app->redirect(APP_REST_ROOT . '/doFacebookLogin');
		return;
	}
		
	// We will register the user if there is no $user entry in local db		
	$app->redirect(APP_REST_ROOT . '/doFacebookRegister');	
}
