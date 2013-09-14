<?php

$LOGFILEPATH = "/Users/gene/tools/walk.log";
function xlog ($msg) 
{
	global $LOGFILEPATH;
	
	$now = date("D M j G:i:s Y");
	writeFile ( "$now : $msg \n", $LOGFILEPATH);
}


class MapperBase extends phpDataMapper_Base
{
	const SERVER = '127.0.0.1';
	const DB_NAME = 'walk_mvc';
	const USER = 'gene';
	const PWD = 'gene';

}



function sendRecoverEmail($recoverEmail, $resetKey=null)
{
	$appRoot = "http://localhost/";
	
	$recoverUrl = "$appRoot/access/user/reset/$resetKey";
	$recoverLink = "<a href='$recoverUrl'>$recoverUrl</a>";

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
			MapperBase::SERVER,
			MapperBase::DB_NAME,
			MapperBase::USER,
			MapperBase::PWD
	);

	return $adapter;
}

?>
