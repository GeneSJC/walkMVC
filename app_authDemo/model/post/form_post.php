<?php
class PostFormConfig extends FormConfigBase
{
	public $action = '/post/save'; // REST path from current root
	public $formId = 'new-post-form';
	
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
                // "placeholder" => "My Title Here" // pre-populate text field
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
                "id" => "status", // html tag id
                "name" => "status", // name for: db column, form field
                
                "caption" => "Status", // Label

				"type" => "select",

				"options" => array 
				(
						"published" => "Published",
						
						"draft" => array 
						(
							"selected" => "selected",
							"html" => "Draft"
						)						
				),

				"css" => array(
						"width" => "200px",
						"margin-top" => "12px",
						"xclear" => "both",
				),
								
				
		);

	/**
	 * 
	 * @param string $postMapper only controller should create/manage that object 
	 * @return ORM Entity object
	 */
	public function getRequestAsEntity($postMapper=null)
	{
		# New, empty post entity
		$postEntity = $postMapper->get();
		
		# Set data and save it
		$postEntity->title = $_POST['title'];
		$postEntity->body = $_POST['body'];
		$postEntity->status = $_POST['status'];
		
		$updateId = $_POST['post_id'];
		if ($updateId > 0)
		{
				// do update instead of save
			$postEntity->id = $updateId;
		}
		
		return $postEntity;
	}
	
}

