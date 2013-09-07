<?php

function sendRecoverEmail($recoverEmail, $resetKey=null)
{
	$recoverUrl = 'http://localhost/etc?id=$resetKey';
	$recoverLink = "<a href='$recoverUrl'>$recoverUrl</a>";
	
	$subject = "Recover email";
	$message = "Hello, this is a recover email message.";
	$message .= "\n\n  ";
	$message .= "Please click this link to reset your password  ";
	$message .= $recoverLink;
	
	$from = "admin@localhost.com";
	
	sendEmail($recoverEmail, $to,$subject,$message,$parameters);
	
}

function sendEmail($from, $to,$subject,$message,$parameters)
{
// 	$to = "someone@example.com";
// 	$subject = "Test mail";
// 	$message = "Hello! This is a simple email message.";
// 	$from = "someonelse@example.com";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
	echo "Mail Sent.";	
}

function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
{
	$str = '';
	$count = strlen($charset);
	while ($length--) {
		$str .= $charset[mt_rand(0, $count-1)];
	}
	return $str;
}

?>