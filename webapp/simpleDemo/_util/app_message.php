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
	
	
		// ERROR MESSAGES
		
	const UNEXPECTED_ERROR = -99;	

	public static function get($msgCode)
	{
		$message = null;

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
		
			case -999:
				$message = "Unknown email address.";
				break;

				
			case Msg::UNEXPECTED_ERROR:
			default:
				break;
			
		}		
		
		return $message;
	}		

}
?>
