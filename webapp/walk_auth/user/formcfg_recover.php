<?php

class RecoverFormConfig extends FormConfigBase
{
	public $action = './save'; // REST path from current root
	public $formId = 'recover-form';
	
	public function getFormFieldArray()
	{
		return  array ( $this->headerConfig,
        								$this->title,
        								$this->body,
        								$this->status,
        								$this->submitConfig );
	}
	
	public $title = array
		(
                "id" => "txt-title", // html tag id
                "name" => "title", // name for: db column, form field
                "type" => "text", // html form input type
		
                "caption" => "Title", // Label
                "placeholder" => "My Title Here" // pre-populate text field
		);

	public $body = array
		(
                "id" => "txt-body", // html tag id
                "name" => "body", // name for: db column, form field
                "type" => "text", // html form input type

                "caption" => "Body" // Label
		);

	public $status = array
		(
                "id" => "txt-status", // html tag id
                "type" => "text", // html form input type
                "name" => "status", // name for: db column, form field

                "caption" => "Status", // Label
                "value" => "Sammy" // html form input type
		);
	
}


?>