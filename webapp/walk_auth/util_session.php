<?php

function redirectIfNoSession()
{
	global $app;
	
	if ( ! array_key_exists('user_name', $_SESSION) )
	{
		$app->redirect('../public/login/2');
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

?>