<?php

class UserController
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
			echo "Missing fields";
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
		}
		else
		{
			echo "NO user - BAD LOGIN ";
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
		
		$result = 'User already exists'; // let $count say different
		if ( ! $user ) 
		{
			$userEntity = $registerFormConfig->getRequestAsEntity($userMapper);
			$userMapper->save($userEntity);
			
			$result = "success";
		}

		return $result;
	}
	
}


?>