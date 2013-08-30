<?php

class LoginFormConfig extends FormConfigBase
{
	public $action = '../user/login'; // REST path from current root
	
	public function getFormFieldArray()
	{
		return  array ( $this->headerConfig,
        								$this->login,
        								$this->password
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

	public $password = array
		(
                "id" => "password", // html tag id
                "name" => "password", // name for: db column, form field
                "type" => "password", // html form input type

                "caption" => "Password" // Label
		);


	
}


?>