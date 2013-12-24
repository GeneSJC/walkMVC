<?php


function isLocalhost()
{
	return
	( $_SERVER['HTTP_HOST'] == 'localhost'
			|| $_SERVER['HTTP_HOST'] == '127.0.0.1');
}

// ==========================================
// =====================
//   Email Utils
// ------------------

function sendEmail($from, $to,$subject,$message)
{
	// 	$to = "someone@example.com";
	// 	$subject = "Test mail";
	// 	$message = "Hello! This is a simple email message.";
	// 	$from = "someonelse@example.com";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
}



?>