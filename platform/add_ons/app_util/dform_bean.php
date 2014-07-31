<?php

class dFormBean 
{
	public $action;
	public $dFormId;	
	public $dFormJSON;	
	public $loadFunctionString; // e.g., = 'loadProjectForm()';
	
	public function __toString() {
	
		return (string)$this->action;
	}	
}