<?php

class RegisterFormConfig extends FormConfigBase
{
	public $action = '../public/register'; // REST path from current root
	public $formId = 'register-form';
	
	public function getFormFieldArray()
	{
		return  array ( $this->headerConfig,
        								$this->login,
        								$this->email,
        								$this->password,
        								$this->confirmPassword
        							);
	}
	
	// Now define the fields

	public $login = array
		(
                "id" => "login", // html tag id
                "name" => "login", // name for: db column, form field
                "type" => "text", // html form input type
		
                "caption" => "Username" // Label
		);

	public $email = array
		(
                "id" => "email", // html tag id
                "name" => "email", // name for: db column, form field
                "type" => "text", // html form input type
		
                "caption" => "Email" // Label
		);

	public $password = array
		(
                "id" => "password", // html tag id
                "name" => "password", // name for: db column, form field
                "type" => "password", // html form input type

                "caption" => "Password" // Label
		);

	public $confirmPassword = array
		(
                "id" => "confirm_password", // html tag id
                "name" => "confirm_password", // name for: db column, form field
                "type" => "password", // html form input type

                "caption" => "Confirm Password" // Label
		);


	

	public function getRegisterQueryArray()
	{
		if (
		! isset($_POST['login'])
		)
		{
			return null;
		}
	
		$login = trim($_POST['login']);
	
		$regArr = array(
				'login' => $login
		);
	
		return $regArr;
	}
	
	/**
	 * This is for doing register
	 * FIXME - figure out if dForm can send hashed pwd
	 * 			> IF NO - can't use the formCfg object
	 * 
	 * @param string $userMapper
	 * @return unknown
	 */
	public function getRequestAsEntity($userMapper=null)
	{
		$login = trim($_POST['login']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$confirmPassword = trim($_POST['confirm_password']);
	
		# New, empty user entity
		$userEntity = $userMapper->get();
	
		$userEntity->login = $login;
		$userEntity->email = $email;
		$userEntity->password = md5($password);
	
		return $userEntity;
	}
	
	
}


?>