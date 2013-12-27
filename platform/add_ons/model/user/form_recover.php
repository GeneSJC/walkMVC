<?php

class RecoverFormConfig extends FormConfigBase
{
	public $action = '/user/recover'; // REST path from current root
	public $formId = 'recover-form';
	
	const TITLE = 'Password Recover';
	
	public function getFormFieldArray()
	{
		return  array ( $this->headerConfig,
        								$this->email,
        								$this->submitConfig );
	}


	// Now define the fields
	public $headerConfig = array
	(
			"type" => "h1",
			"html" => self::TITLE
	);
	
	public $email = array
	(
			"id" => "email", // html tag id
			"name" => "email", // name for: db column, form field
			"type" => "text", // html form input type
	
			"caption" => "Email" // Label
	);	
	

	public function getEmailQueryArray()
	{
		if (
		! isset($_POST['email'])
		)
		{
			return null;
		}
	
		$email = trim($_POST['email']);
	
		BaseAppUtil::xlog ("getEmailQueryArray email = " . $email );
		
		$emailArr = array(
				'email' => $email
		);
	
		return $emailArr;
	}	
}
