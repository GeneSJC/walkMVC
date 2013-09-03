<?php
class PostFormConfig extends FormConfigBase
{
	public $action = '/post/save'; // REST path from current root
	
	public function getFormFieldArray()
	{
		return  array ( $this->headerConfig,
        								$this->updateId,
        								$this->title,
        								$this->body,
        								$this->status,
        								$this->submitConfig );
	}
	
	// Now define the fields
	public $headerConfig = array
		(
			"type" => "h1",
			"html" => "Add Post"
		);
	
		// name it this way to explicitly indicate it's only for update use
	public $updateId = array
		(
			"type" => "hidden",
			"id" => "post_id",
			"name" => "post_id",
			"value" => "-1"
		);
	

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