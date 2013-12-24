<?php

class PostMapper extends MapperBase
{
	// Specify the data source (table for SQL adapters)
	protected $_datasource = "blog_posts";

	// Define your fields as public class properties
	public $id = array('type' => 'int', 'primary' => true, 'serial' => true);
	public $title = array('type' => 'string', 'required' => true);
	public $body = array('type' => 'text', 'required' => true);
	public $status = array('type' => 'string', 'default' => 'draft');
	public $date_created = array('type' => 'datetime');

}



