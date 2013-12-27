<?php

class UserLogic
{
	private $statusMsg = 'none';
	
	public function actionLogout()
	{
		// session_start(); // req'd; should have been set already
		unset($_SESSION['user_id']);
		session_destroy();
	}
	
	public function actionLogin()
	{
		$loginFormConfig =  new LoginFormConfig();
		
		$loginQueryArr = $loginFormConfig->getLoginQueryArray();
		
		if ( $loginQueryArr == null )
		{
			BaseAppUtil::xlog("SYS ERROR: Missing necessary fields for actionLogin() ");
			
			return Msg::UNEXPECTED_ERROR;
		}
		
		$adapter = getDbAdapter();
		$userMapper = new UserMapper($adapter);
		
		$user = $userMapper->first($loginQueryArr);
		
		if ($user)
		{
			App::createSession($user->id, $user->login);
			return Msg::SUCCESS;
		}
		
		BaseAppUtil::xlog("NO user - BAD LOGIN ");
		return Msg::UNKNOWN_USER;
 	}
	
	/* if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {
	  echo "Email so bad!";
	  } */
	public function actionRegister()
	{
		$registerFormConfig =  new RegisterFormConfig();
		
		$registerQueryArr = $registerFormConfig->getRegisterQueryArray();
		// var_dump($registerQueryArr);
		
		$adapter = getDbAdapter();
		$userMapper = new UserMapper($adapter);
		
		$user = $userMapper->first($registerQueryArr) ;
		
		if ( $user ) 
		{
			return Msg::USERID_EXISTS;
		}
		
		$userEntity = $registerFormConfig->getRequestAsEntity($userMapper);
		$userMapper->save($userEntity);
		
			// this will automatically login the user
		App::createSession($userEntity->id, $userEntity->login);
		
		return  Msg::SUCCESS_REGISTER;
	}
	
	/**
	 * 1) See if the key exists and has not expired
	 * 2) If valid, get the user with that email address
	 * 3) Set the new password into that user object
	 * 4) Save it 
	 * 
	 * @return string
	 */
	public function actionResetPwd()
	{
		$pwdResetFormConfig =  new PasswordResetFormConfig();
		
		$resetKeyQueryArr = $pwdResetFormConfig->getResetKeyQueryArray();
		// var_dump($registerQueryArr);
		
		$adapter = getDbAdapter();
		$recoverMapper = new RecoverMapper($adapter);
		$resetEntry = $recoverMapper->first($resetKeyQueryArr) ;
		
		$result = Msg::UNEXPECTED_ERROR;
		if ( ! $resetEntry ) 
		{
			$result = Msg::UNKNOWN_RESETKEY;
			return $result;
		}

		$pwd = $pwdResetFormConfig->getResetPwd();
		if ( ! $pwd )
		{
			$result = Msg::CONFIRM_PWD_DIFFERENT;
			return $result;
		}
		
		$userMapper = new UserMapper($adapter);
		$userEntity = $userMapper->first(array('email' => $resetEntry->email)) ;
		
		if ( ! $userEntity )
		{
			$result = Msg::NO_USER_FOR_EMAIL;
			return $result;
		}
		
		// verify passwords are same
		
		$userEntity->password = md5($pwd);
		$userMapper->save($userEntity);
			
		$result = Msg::SUCCESS;

		return $result;
	}
	
	public static function getUniqueUsername($nameString=null)
	{
		$base_username = self::getBaseUsername($nameString);
		 
		$adapter = getDbAdapter();
		$userMapper = new UserMapper($adapter);
		
		$unique_end = 1;
		
		/*
		 * Run this loop to generate a username that is not already in the db
		 * 
		 * If username is unique, the query for $userEntity will return false
		 * Not checking for [$user != null] because phpDataMapper should return false for no results
		 * If result is other than false, it means data was returned and we need to try another username
		 */
		do
		{
			$new_username = $base_username . '_' . $unique_end;
			BaseAppUtil::xlog ("Generated new username = $new_username; will check to see if it exists.");
			
			$queryArr = array ('login'=>$new_username);
			
			$user = $userMapper->first($queryArr);
		} 
		while ( $user != false);
		
		return $new_username;
	}
	
	/**
	 * Returns the base username to use to generate a new username
	 */
	private static function getBaseUsername($nameString=null)
	{
		$random = time() . '';
		$base_username = substr($nameString, 0, 12); // . '_' . substr($random, 5);
		$base_username = strtolower($base_username);

		return $base_username;
	}

}


/**
 * Helper class based on model in map_user.php that support fb elements
 *
 */
class UserFacebookLogic
{
	/**
	 * Returns the app user model as a phpDataMapper 'entity'
	 *
	 * @param string $fbUserId
	 * @return unknown
	 */
	public static function getFacebookNativeUser($fbUserId=null)
	{
		$adapter = getDbAdapter();
		$userMapper = new UserMapper($adapter);
	
		$user = $userMapper->first(
				array(
						'fb_userid' => $fbUserId
				)
		);
	
		return $user;
	}
}
