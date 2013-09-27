<?php

define("REST_ROOT", '/access');
define("REST_ACCESS_FILE", 'access.php');

echo REST_ROOT;

class AppCfg
{
	const FILE_PATH = 'C:\xampp\htdocs\dev\walkMVC\webapp\simpleDemo';
	const RELATIVE_LOGPATH = '\_resources\walk.log';
	
	const WEB_ROOT = 'http://localhost/dev/walkMVC/webapp/simpleDemo/access.php/access';
	
	const SERVER = '127.0.0.1';
	const DB_NAME = 'walk_mvc';
	const USER = 'root';
	const PWD = '';
}

function xlog ($msg)
{
	$logPath = AppCfg::FILE_PATH . AppCfg::RELATIVE_LOGPATH;
	$now = date("D M j G:i:s Y");
	writeFile ( "$now : $msg \n", $logPath);
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
