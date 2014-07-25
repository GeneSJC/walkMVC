<?php

class LoginFormConfig extends FormConfigBase
{
	public $action = '/user/login'; // REST path from current root
	public $formId = 'login-form';
		
	public $cssConfig = array();
	
	public function getFormFieldArray()
	{
		return  array ( $this->headerConfig,
        								$this->login,
        								$this->password,
        								$this->submitConfig 
		);
	}

	// Now define the fields
	public $headerConfig = array
	(
			"type" => "h1",
			"html" => "Login Home"
	);
		
	// Now define the fields

	public $login = array
		(
                "id" => "login", // html tag id
                "name" => "login", // name for: db column, form field
                "type" => "text", // html form input type
		
                "caption" => "Username", // Label
                		
				"class" => "dform_label_input"
		);

	public $password = array
		(
                "id" => "password", // html tag id
                "name" => "password", // name for: db column, form field
                "type" => "password", // html form input type

                "caption" => "Password", // Label
                
				"class" => "dform_label_input"
		);

	/**
	 * Creates an array with the parameters mapped to the corresponding DB columns
	 * @return 
	 */
	public function getLoginQueryArray()
	{
		if ( 
			! isset($_POST['login']) 
				|| 
			! isset($_POST['password'])
			)
		{
			return null;
		}
		
		$login = $_POST['login'];
		$password = md5($_POST['password']);
		
		$loginArr = array(
						'login' => $login, 
						'password' => $password
						);
		
		return $loginArr;
	}
	
	public static function setLoginPostData($login=null, $password=null)
	{
		$_POST['login'] 			= $login;
		$_POST['password'] 	= $password;
	}
	
}

