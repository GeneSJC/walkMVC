<?php

class UserMapper extends MapperBase
{
	// Specify the data source (table for SQL adapters)
	protected $_datasource = "users";

	// Define your fields as public class properties
	public $id = array('type' => 'int', 'primary' => true, 'serial' => true);
	public $login = array('type' => 'string', 'required' => true);
	public $email = array('type' => 'string', 'required' => true);
	public $password = array('type' => 'string', 'default' => 'draft');
	public $created_on = array('type' => 'datetime');

}



?>