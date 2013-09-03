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
		                "value" => "Go"
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
         			"action"  =>  $this->action,
					"method"  =>  $this->method,
					"html"  =>  $htmlFormDataArr
         		);
         
        $this->jsonArr = json_encode($jqDformData);
	}
	     
}



?>