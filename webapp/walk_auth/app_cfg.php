<?php

class AppCfg
{
	const LOGFILEPATH = "/Users/gene/tools/walk.log";
	const WEB_ROOT = 'http://localhost/dev/walkMVC/webapp/walk_auth/access';

	const DB_SERVER = '127.0.0.1';
	const DB_NAME = 'walk_mvc';
	const DB_USER = 'gene';
	const DB_PWD = 'gene';
}


function xlog ($msg)
{
	$now = date("D M j G:i:s Y");
	writeFile ( "$now : $msg \n", AppCfg::LOGFILEPATH);
}

function sendRecoverEmail($recoverEmail, $resetKey=null)
{
	$recoverUrl = AppCfg::WEB_ROOT . "/user/reset/$resetKey";
	$recoverLink = "<a href='$recoverUrl '>$recoverUrl </a>";
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
			AppCfg::DB_SERVER,
			AppCfg::DB_NAME,
			AppCfg::DB_USER,
			AppCfg::DB_PWD
	);

	return $adapter;
}

?>
