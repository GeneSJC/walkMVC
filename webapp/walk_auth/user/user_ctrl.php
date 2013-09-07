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
		
		var_dump($registerQueryArr);
		
		  // $q = mysql_query("SELECT COUNT(`id`) AS `c` FROM `users` WHERE `login`='$login' OR `email` = '$email' LIMIT 1");
		$user = $userMapper->first($registerQueryArr) ;
		
		/* if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {
		  echo "Email so bad!";
		  } */
		$result = 'User already exists'; // let $count say different
		if ( ! $user ) 
		{
			$userEntity = $registerFormConfig->getRequestAsEntity($userMapper);
			$userMapper->save($userEntity);
			
			$result = "success";
		}

		return $result;
	}
	
	/**
	 * 1. Get the email request param
	 * 2. Check in the db - if not there, show error message on same page
	 * 3. Send an email link 
	 * 		- /user/resetpwd/:$randomNum
	 * 		- link will have random #
	 * 		- we will have a recover_tbl where we store:
	 * 			> userid, date, random #
	 * 
	 * 4. /user/reset/:$randomNum goes to
	 * 		- if $randomNum valid, show reset view
	 * 		- reset_pwd.tpl
	 */
	public function actionSendRecoverEmail()
	{
		$recoverFormConfig =  new RecoverFormConfig();
		
		$emailQueryArr = $recoverFormConfig->getEmailQueryArray();
		
		if ( $emailQueryArr == null )
		{
			echo "Missing fields";
			return;
		}
		
		$userMapper = UserMapper::getDbMapper();
		
		$user = $userMapper->first($emailQueryArr);
		
		if ($user)
		{
			echo "TODO: [GENERATE KEY & SEND EMAIL] Got user for recover email: " . $_POST['email'];
		}
		else
		{
			echo "TODO: [SHOW ERROR PAGE] NO user for recover email: " . $_POST['email'];
		}
		
	}
}


?>