<?php

// place holder used by map_*.php class definitions
class MapperBase extends phpDataMapper_Base{}

/**
 * Wrapper class for basic app methods 
 *
 */
class BaseAppUtil
{
	public static function xlog ($msg)
	{
		// echo "attempting to xlog: $msg , to path : " . APP_LOG_PATH;
	
		$logPath = APP_LOG_PATH;
		$now = date("D M j G:i:s Y");
		writeFile ( "$now : $msg \n", $logPath);
	}
	
	public static function sendRecoverEmail($recoverEmail, $resetKey=null)
	{
		$appRoot = APP_REST_ROOT;
	
		$recoverUrl = $appRoot . "/user/reset/$resetKey";
		$recoverLink = "<a href='$recoverUrl'>$recoverUrl</a>";
		$recoverLink = $recoverUrl;
	
		$subject = "Recover email";
		$message = "Hello, this is a recover email message.";
		$message .= "\n\n  ";
		$message .= "Please click this link to reset your password  ";
		$message .= $recoverLink;
	
		$from = "admin@localhost.com";
	
		sendEmail($from, $recoverEmail, $subject,$message);
	}

	// =========================
	// ====  SESSION HELPERS =====
	
	public static function redirectIfNoSession()
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
	
	public static function isSessionActive()
	{
		if ( ! array_key_exists('user_name', $_SESSION) )
		{
			return false;
		}
	
		return true;
	}

	public static function deleteSession ()
	{
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
	
		session_destroy();
	}
	
	public static function createSession ($userId=null, $userName=null)
	{
		// session_start(); // should have been set "upstream"; nec. in order to use $_SESSION
	
		$_SESSION['user_id'] = $userId;
		$_SESSION['user_name'] = $userName;
	}
	
	public static function setSuccessMessage ($msgCode)
	{
		$msg = Msg::get($msgCode);
		$_SESSION['success_msg'] = $msg;
	}
	
	public static function getSuccessMessage ()
	{
		BaseAppUtil::xlog ("in getSuccessMessage()");
		
		// var_dump($_SESSION);
		
		if ( array_key_exists('success_msg', $_SESSION) )
		{
			App::xlog ("unsetting ..");
			
			$msg = $_SESSION['success_msg'];
			unset($_SESSION['success_msg']);
			return $msg;
		}
		
		App::xlog ("returning null ..");
		return null;
	}
	
}



