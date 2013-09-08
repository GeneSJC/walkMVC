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
		// 1. Logic to get the email and see if it exists
		$recoverFormConfig =  new RecoverFormConfig();
		$emailQueryArr = $recoverFormConfig->getEmailQueryArray();
		if ( $emailQueryArr == null )
		{
			echo "Missing fields";
			return;
		}
		
		$adapter = getDbAdapter();
		$userMapper = new UserMapper($adapter);
		$user = $userMapper->first($emailQueryArr);
		
		if (! $user)
		{
			echo "TODO: [SHOW ERROR on RECOVER PAGE] NO user for recover email: " . $emailQueryArr['email'];
			return;
		}

		$resetKey = $this->saveResetKey();
		if ($resetKey)
		{
			sendRecoverEmail($emailQueryArr['email'], $resetKey); // FIXME - add try/catch
		}
	}
	
	private function saveResetKey($email=null)
	{
		$resetKey = randString(10);
			
		echo "TODO: [SAVE GENERATED KEY & SEND EMAIL] Got user for recover email: " . $_POST['email'];
		echo "random string: " . $resetKey;
		
		// need to save the info
		$adapter = getDbAdapter();
		$recoverMapper = new RecoverMapper($adapter);
		
		$recoverEntity = $recoverMapper->get();
		
		$recoverEntity->email = $email;
		$recoverEntity->resetKey = $resetKey;
		
		$recoverMapper->save($recoverEntity);
		
		return $resetKey;
	}
}


?>