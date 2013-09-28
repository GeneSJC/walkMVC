<?php


function xlog ($msg)
{
	echo "attempting to xlog: $msg , to path : " . APP_LOG_PATH;

	$logPath = APP_LOG_PATH;
	$now = date("D M j G:i:s Y");
	writeFile ( "$now : $msg \n", $logPath);
}

function sendRecoverEmail($recoverEmail, $resetKey=null)
{
	$appRoot = APP_WEB_ROOT;

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
			AppCfg::DB_SERVER,
			AppCfg::DB_NAME,
			AppCfg::DB_USER,
			AppCfg::DB_PWD
	);

	return $adapter;
}

?>