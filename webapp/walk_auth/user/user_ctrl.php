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
		if (isset($_POST['login']) && isset($_POST['password'])) 
		{
		    $login = $_POST['login'];
		    $password = md5($_POST['password']);
		
		    // echo "$login $password <br/> ";
		    // return;
		    
			$userMapper = UserMapper::getDbMapper();
			 
			$user = $userMapper->first(
														array(
															'login' => $login, 
															'password' => $password
														)
													);
		
		    if ($user) 
		    {
		    		// echo "Got user<br/>";
		
		    		// session_start(); // should have been set "upstream"; nec. in order to use $_SESSION
		        $_SESSION['user_id'] = $user->id;
		        $_SESSION['user_name'] = $user->login;
		    }
		    else
		    {
		    		echo "NO	 user - BAD LOGIN ";
		    }
		}
 	}
	
	public function actionRegister()
	{
		$login = trim($_POST['login']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		
		$userMapper = UserMapper::getDbMapper();
		
		  // $q = mysql_query("SELECT COUNT(`id`) AS `c` FROM `users` WHERE `login`='$login' OR `email` = '$email' LIMIT 1");
		$users = $userMapper->first(array('login' => $login) ) ;
		$count = count($users);
		
		/* if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {
		  echo "Email so bad!";
		  } */
		$result = 'not set';
		
		if ($count > 0) 
		{
		    $result = 'User already exists';
		    $qq = false;
		}
		else
		{
			$userEntity = $userMapper->get();
			
			$userEntity->login = $login;
			$userEntity->email = $email;
			$userEntity->password = md5($password);
			
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