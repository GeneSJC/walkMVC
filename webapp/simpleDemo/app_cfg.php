<?php

class AppCfg
{
	const LOGFILEPATH = "/Users/gene/tools/walk.log";
	const WEB_ROOT = 'http://localhost/dev/walkMVC/webapp/simpleDemo/access';
	
	const SERVER = '127.0.0.1';
	const DB_NAME = 'walk_mvc';
	const USER = 'gene';
	const PWD = 'gene';
}

function xlog ($msg)
{
	$now = date("D M j G:i:s Y");
	writeFile ( "$now : $msg \n", AppCfg::LOGFILEPATH);
}

function sendRecoverEmail($recoverEmail, $resetKey=null)
{
	$appRoot = AppCfg::WEB_ROOT;
	
	$recoverUrl = $appRoot . "/user/reset/$resetKey";
	$recoverLink = "<a href='$recoverUrl'>$recoverUrl</a>";
	$recoverLink = $recoverUrl;

	$subject = "Recover email";
	$message = "Hello, this is a recover email message.";
	$message .= "\n\n  ";
	$message .= "Please click this link to reset your password  ";
	$message .= $recoverLink;

	$from = "admin@localhost.com";

	sendEmail($from, $recoverEmail, $subject,$message);
}

function getDbAdapter()
{
	$adapter = new phpDataMapper_Adapter_Mysql(
			AppCfg::SERVER,
			AppCfg::DB_NAME,
			AppCfg::USER,
			AppCfg::PWD
	);

	return $adapter;
}

?>
