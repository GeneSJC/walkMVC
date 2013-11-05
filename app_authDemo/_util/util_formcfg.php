<?php

abstract class FormConfigBase
{
	public $jsonArr;
	public $action;
	public $method = 'post' ;
	
	public $headerConfig = array
				(
		               "type" => "p",
		                "html" => "Create your entry"
          		);

	public $submitConfig = array
                (
		                "type" => "submit",
		                "value" => "Go",
                		
                		"css" => array(
                				"width" => "100px",
                				"margin-left" => "40px"
                				),
                		
                );
	
    public abstract function getFormFieldArray();
     
	public function __construct()
	{
		// $this->loadFormFieldArray();
	}

	public function loadFormFieldArray()
	{
		$htmlFormDataArr = $this->getFormFieldArray();

        $jqDformData = array
         		(
         				// need to set this when we have an extra REST level for params
         			"action"  =>  APP_WEB_ROOT . $this->action,
					"method"  =>  $this->method,
					"html"  =>  $htmlFormDataArr
         		);
         
        $this->jsonArr = json_encode($jqDformData);
	}
	     
}



?>