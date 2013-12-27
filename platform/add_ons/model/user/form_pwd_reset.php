<?php

class PasswordResetFormConfig extends RegisterFormConfig
{
	public $action = '/user/reset'; // REST path from current root
	public $formId = 'reset_pwd-form';
	
	const TITLE = 'Password Reset';
	
	public function getFormFieldArray()
	{
		return  array ( $this->headerConfig,
        								$this->password,
        								$this->confirmPassword,
        								$this->resetKey,
										$this->submitConfig
        							);
	}
	

	// Now define the fields
	public $headerConfig = array
	(
			"type" => "h1",
			"html" => self::TITLE
	);
	

	public $resetKey = array
	(
			"id" => "reset_key", // html tag id
			"name" => "reset_key", // name for: db column, form field
			"type" => "hidden", // html form input type
	);
	

	public function getResetKeyQueryArray()
	{
		if (
			! isset($_POST['reset_key'])
		)
		{
			return null;
		}
	
		$resetKey = trim($_POST['reset_key']);
	
	
		$queryArr = array(
				'reset_key' => $resetKey
		);
	
		return $queryArr;
	}	
	

	public function getResetPwd()
	{
			// form validation can happen upstream
		if (
			! isset($_POST['password'])
			|| ! isset($_POST['confirm_password'])
		)
		{
			return null;
		}
	
		$password = trim($_POST['password']);
		$confirm_password = trim($_POST['confirm_password']);
	
		if ( $password != $confirm_password)
		{
			return null;
		}
		
		return $password;
	}	
	
}

