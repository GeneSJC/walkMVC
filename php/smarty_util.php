<?php

class SmartyUtil
{

	public static function getSmarty($root=null)
	{
		$mySmarty = new Smarty;
		// chaining of method calls
		$mySmarty->setTemplateDir( $root . '/templates');
		$mySmarty->setCacheDir($root . '/cache');
		
		$mySmarty->setCompileDir($root . '/templates_c');
//					
		
		return $mySmarty;
	}
}

?>