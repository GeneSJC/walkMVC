<?php

function getValidHttpPostResetPwd()
{
	// form validation can happen upstream
	if (
		! isset($_POST['password'])
		|| ! isset($_POST['confirm_password'])
	)
	{
		return null;
	}

	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);

	if ( $password != $confirm_password)
	{
		return null;
	}

	return $password;
}

function getPostParam($paramName=null)
{
	$value = null;
	
	if ( isset($_POST[$paramName]) )
	{
		$value = trim($_POST[$paramName]);
	}
	
	return $value;
}

function isLocalhost()
{
	return
	( $_SERVER['HTTP_HOST'] == 'localhost'
			|| $_SERVER['HTTP_HOST'] == '127.0.0.1');
}

// ==========================================
// =====================
//   Email Utils
// ------------------

/**
 * 
 * @param unknown $from
 * @param unknown $to
 * @param unknown $subject
 * @param unknown $message
 * @return $result true if sent successfully 
 */
function sendEmail($from=null, $to=null, $subject=null, $message=null)
{
	// 	$to = "someone@example.com";
	// 	$subject = "Test mail";
	// 	$message = "Hello! This is a simple email message.";
	// 	$from = "someonelse@example.com";
	$headers = "From:" . $from;
	$result = mail($to,$subject,$message,$headers);
	
	return $result;
}


function dumpAndDie($data=null)
{
	echo "<pre>";
	var_dump($data);
	die;
}
