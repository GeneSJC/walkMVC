<?php

function redirectIfNoSession()
{
	global $app;
	
	if ( ! array_key_exists('user_name', $_SESSION) )
	{
		$app->redirect('../public/login/' . Msg::NO_SESSION);
		// echo "NOP!";
		return;
	}
	// else echo "YEP!";
}

function isSessionActive()
{
	if ( ! array_key_exists('user_name', $_SESSION) )
	{
		return false;
	}
	
	return true;
}

/**
 * Gets cleared after called
 * 
 * @return boolean
 */
function isFacebookUserRegister()
{
	if ( in_array(is_facebook_user_register, $_SESSION) )
	{
		unset($_SESSION['is_facebook_user_register']);
		return true;
	}
	
	return false; 
}

function setFacebookUserRegister()
{
	$_SESSION['is_facebook_user_register'] = true;
}
