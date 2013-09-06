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
		
		$userMapper = UserMapper::getDbMapper();
		
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
	
	public function actionRegister()
	{
		$registerFormConfig =  new RegisterFormConfig();
		
		$registerQueryArr = $registerFormConfig->getRegisterQueryArray();
		
		$userMapper = UserMapper::getDbMapper();
		
		  // $q = mysql_query("SELECT COUNT(`id`) AS `c` FROM `users` WHERE `login`='$login' OR `email` = '$email' LIMIT 1");
		$users = $userMapper->first($registerQueryArr) ;
		$count = count($users);
		
		/* if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {
		  echo "Email so bad!";
		  } */
		$result = 'User already exists'; // let $count say different
		if ($count = 0) 
		{
			$userEntity = $registerFormConfig->getRequestAsEntity($userMapper);
			$userMapper->save($userEntity);
			
			$result = "success";
		}
		
	}
	
	public function actionRecoverPassword()
	{
		// TODO
	}
}


?>