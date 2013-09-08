<?php

class PasswordFormConfig extends RegisterFormConfig
{
	public $action = '/user/reset_pwd'; // REST path from current root
	public $formId = 'reset_pwd-form';
	
	const TITLE = 'Password Reset';
	
	public function getFormFieldArray()
	{
		return  array ( $this->headerConfig,
        								$this->password,
        								$this->confirmPassword,
										$this->submitConfig
        							);
	}
	

	// Now define the fields
	public $headerConfig = array
	(
			"type" => "h1",
			"html" => self::TITLE
	);
	

}


?>