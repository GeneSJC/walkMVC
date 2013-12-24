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
	
		// We will register the user if there is no $user entry in local db
		
	$userProfile = UserFacebookLogic::getExistingUserProfile($fbUserId);
	if ( $userProfile == null )
	{
		$resultCode = FacebookApiUtil::setFacebookUserRegistration();
		
		if ($resultCode != Msg::SUCCESS)
		{
			handleNoSuccess($resultCode);
			return;
		}
		
		$app->redirect(APP_WEB_ROOT . '/access/user/register');
		return;
	}
		
		// At this point we have a $user entry, so let's log them in
		
			// set the flag for a known fb_user
	FbSession::setSystemUsernameForCurrentFacebookUser ($userProfile->login);
	$this->redirect(array('user/login')); // post
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


