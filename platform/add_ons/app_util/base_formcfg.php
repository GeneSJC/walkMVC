<?php

abstract class FormConfigBase
{
	public $jsonArr;
	public $action;
	public $method = 'post' ;
	public $cssConfig = array();
	public $enctype;
	
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
                				"margin-left" => "40px",
                				"margin-top" => "20px",
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

		$action = APP_REST_ROOT . $this->action;
		
        $jqDformData = array
         		(
         				// need to set this when we have an extra REST level for params
         			"action"  	=>  $action,
					"method"  	=>  $this->method,
					"css" 	 		=>  $this->cssConfig,
					"html"  		=>  $htmlFormDataArr
         		);
        
        if ($this->enctype)
        {
        		// BaseAppUtil::xlog("Setting enctype with value =  " . $this->enctype);
        		$jqDformData['enctype'] = $this->enctype;
        }
         
        $this->jsonArr = json_encode($jqDformData);
	}
	
	/**
	 * Helper to set values from $_POST
	 *
	 * @param string $fieldNames
	 */
	public function setFormCfgWithValues_base($fieldNames=null)
	{
		foreach ($fieldNames as $fieldName)
		{
			$curFieldArr = $this->$fieldName;
	
			$curFieldId = $curFieldArr['id'];
	
			$val = getPostParam($curFieldId);
	
			if ( $val )
			{
				$cfgArr = $this->$fieldName;
	
				$cfgArr['value'] = $val;
	
				// need to reassign array back to property after setting value
				$this->$fieldName = $cfgArr;
			}
		}
	
	}	
	     
}


