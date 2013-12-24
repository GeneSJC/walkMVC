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
			xlog("Missing fields");
			return;
		}
		
		$adapter = getDbAdapter();
		$userMapper = new UserMapper($adapter);
		
		$user = $userMapper->first($loginQueryArr);
		
		if ($user)
		{
			// echo "Got user<br/>";
		
			// session_start(); // should have been set "upstream"; nec. in order to use $_SESSION
			$_SESSION['user_id'] = $user->id;
			$_SESSION['user_name'] = $user->login;
			
			return Msg::SUCCESS;
		}
		else
		{
			xlog("NO user - BAD LOGIN ");
			return Msg::UNKNOWN_USER;
		}		
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
		
		$result = Msg::USERID_EXISTS; // let $count say different
		if ( ! $user ) 
		{
			$userEntity = $registerFormConfig->getRequestAsEntity($userMapper);
			$userMapper->save($userEntity);
			
			$result = Msg::SUCCESS;
		}

		return $result;
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
	
	public static function getUniqueUsername($firstName=null)
	{
		$random = time() . '';
		$new_username = substr($firstName, 0, 12); // . '_' . substr($random, 5);
		$new_username = strtolower($new_username);
		$base_username = $new_username;
		
		xlog ("Generated newusername = $new_username; will check to see if it exists.");
		$unique_end = 0;
		 
		$adapter = getDbAdapter();
		$userMapper = new UserMapper($adapter);
		
		$queryArr = array ('login'=>$new_username);
		
		// while a user is retrieved successfully with the criteria, let's generate another one; FIXME try as do/while
		while ($user = $userMapper->first($queryArr))
		{
			xlog ("Found a match for username = $new_username , so we will try to generate another.");
			 
			$unique_end++;
			 
			$new_username = $base_username . '_' . $unique_end;
		}
		
		return $new_username;
	}
}


?>