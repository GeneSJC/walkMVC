<?php

class RecoverMapper extends MapperBase
{
	// Specify the data source (table for SQL adapters)
	protected $_datasource = "recover_tbl";

	// Define your fields as public class properties
	public $id = array('type' => 'int', 'primary' => true, 'serial' => true);
	public $email = array('type' => 'string', 'required' => true);
	public $reset_key = array('type' => 'string', 'default' => 'draft');
	public $created_on = array('type' => 'datetime');

}



?>