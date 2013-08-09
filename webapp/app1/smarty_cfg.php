<?php

class SmartyCfg
{
	public static $APP_ROOT = "/Library/WebServer/Documents/dev/walkMVC/webapp/app1/";
	public static $SMARTY_GEN_ROOT;

	public static function getSmarty()
	{
		SmartyCfg::$SMARTY_GEN_ROOT = SmartyCfg::$APP_ROOT . "/_smarty";
		
		$mySmarty = new Smarty;

		$mySmarty->setTemplateDir( SmartyCfg::$APP_ROOT . '/_templates');
		
		$mySmarty->setCacheDir(SmartyCfg::$SMARTY_GEN_ROOT . '/cache');
		
		$mySmarty->setCompileDir(SmartyCfg::$SMARTY_GEN_ROOT . '/templates_c');
		
		return $mySmarty;
		
	}
}

?>