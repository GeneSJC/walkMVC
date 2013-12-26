<?php

/**

usage:
echo Msg::get(Msg::SUCCESS2);
echo Msg::get(Msg::UNKNOWN_EMAIL);

 */
class Msg
{
		// SUCCCESS MESSAGES
		
	const SUCCESS = 0;
	const SUCCESS_REGISTER = 1;
	const SEND_EMAIL_SUCCEEDED = 2;
	
	
		// ERROR MESSAGES
		
	const UNEXPECTED_ERROR = -99;	
	const NO_SESSION = -1;	
	const UNKNOWN_EMAIL = -2;	
	const BAD_CREDENTIALS = -3;	
	const SEND_EMAIL_FAILED = -4;	
	const UNKNOWN_USER = -5;	
	const UNKNOWN_RESETKEY = -6;	
	const CONFIRM_PWD_DIFFERENT = -7;	
	const USERID_EXISTS = -8;	
	const NO_USER_FOR_EMAIL = -9;
	const FACEBOOK_USER_IS_NULL = -10;
	const UNEXPECTED_FACEBOOK_ERROR = -11;
	
	/**
	 * Assumption: this will always be called with some param 
	 * 
	 * @param $msgCode 
	 * @return Messages string
	 */
	public static function get($msgCode=null)
	{
		( ! $msgCode ) ? die('Calling Msg::get() with no param') : null;
		
		$message = null;

			// hack-ish solution for bypassing numeric code
			// if not an int, then assuming it's  hard coded string
		if ( ! is_numeric($msgCode))
		{
			$message = $msgCode;
			return $message;
		}
		
		if ($msgCode < 0)
		{
			$message = self::getErrorMsg($msgCode);
		}
		else
		{
			$message = self::getOkMsg($msgCode);
		}
		
		return $message;
	}
	

	public static function getOkMsg($msgCode)
	{
		$message = null;
	
		switch ($msgCode) {
		
			case Msg::SUCCESS_REGISTER:
				$message = "Successful Registration";
				break;
		
			case Msg::SEND_EMAIL_SUCCEEDED:
				$message = "Password reset email sent successfully";
				break;
		
			case Msg::SUCCESS:
			default:
				$message = "Success.";
				break;
		}
		
		return $message;
	}
	
	public static function getErrorMsg($errCode)
	{
		$message = "Unexpected error.";
	
		switch ($errCode) {
		
			case Msg::UNKNOWN_EMAIL:
				$message = "Unknown email address.";
				break;
				
			case Msg::SEND_EMAIL_FAILED:
				$message = "Failed to send email.";
				break;
				
			case Msg::UNKNOWN_USER:
				$message = "Unknown user.";
				break;
				
			case Msg::UNKNOWN_RESETKEY:
				$message = "No entry for reset key";
				break;
				
			case Msg::CONFIRM_PWD_DIFFERENT:
				$message = "Passwords don't match";
				break;
				
			case Msg::NO_USER_FOR_EMAIL:
				$message = "No user for resetKey email";
				break;
				
			case Msg::USERID_EXISTS:
				$message = "User already exists";
				break;
				
			case Msg::FACEBOOK_USER_IS_NULL:
				$message = "Facebook user is null";
				break;
				
			case Msg::UNEXPECTED_FACEBOOK_ERROR:
				$message = "Unexpected Facebook login error. Please inform admin";
				break;
				
			case Msg::UNEXPECTED_ERROR:
			default:
				break;
			
		}		
		
		return $message;
	}		

}
