<?php

// place holder used by map_*.php class definitions
class MapperBase extends phpDataMapper_Base{
	
	protected $_datasource;
	
	public function getDatasource()
	{
		return $this->_datasource;	
	}
}

/**
 * Wrapper class for basic app methods 
 *
 */
class BaseAppUtil
{
	public static $LOG_PATH = null; 
	
	public static function xlog ($msg)
	{
		// echo "attempting to xlog: $msg , to path : " . APP_LOG_PATH;
	
		if ( ! BaseAppUtil::$LOG_PATH )
		{
			BaseAppUtil::$LOG_PATH = APP_LOG_PATH;
		}
		
		$logPath = BaseAppUtil::$LOG_PATH;
		// $now = date("D M j G:i:s Y");
		$now = date("m-d-Y G:i");
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
			BaseAppUtil::setErrorMessage("There is no user session - please login");
			$app->redirect(APP_REST_ROOT . '/public/login');
			return;
		}
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
	
	public static function setErrorMessage ($msgCode)
	{
		$msg = Msg::get($msgCode);
		$_SESSION['error_msg'] = $msg;
	}
	
	public static function getSuccessMessage ()
	{
		return self::getAndClearMessage('success_msg');
	}
	
	public static function getErrorMessage ()
	{
		return self::getAndClearMessage('error_msg');
	}
	
	public static function getAndClearMessage ($msgKey)
	{
		// BaseAppUtil::xlog ("in getSuccessMessage()");
		
		// var_dump($_SESSION);
		
		if ( array_key_exists($msgKey, $_SESSION) )
		{
			// App::xlog ("unsetting ..");
			
			$msg = $_SESSION[$msgKey];
			unset($_SESSION[$msgKey]);
			return $msg;
		}
		
		// App::xlog ("returning null ..");
		return null;
	}

	public static function isSessionUserSet()
	{
		return isset($_SESSION)
		&& array_key_exists('user_id', $_SESSION);
	}
	
	public static function getSessionUserId()
	{
		if (! BaseAppUtil::isSessionUserSet())
		{
			return null;
		}
		
		return $_SESSION['user_id'];
	}
	
	public static function getSessionUserName()
	{
		if (! BaseAppUtil::isSessionUserSet())
		{
			return null;
		}
				
		return $_SESSION['user_name'];
	}
	
}



