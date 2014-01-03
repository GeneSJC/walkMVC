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

/**
 * 
 * @param unknown $from
 * @param unknown $to
 * @param unknown $subject
 * @param unknown $message
 * @return $result true if sent successfully 
 */
function sendEmail($from=null, $to=null, $subject=null, $message=null)
{
	// 	$to = "someone@example.com";
	// 	$subject = "Test mail";
	// 	$message = "Hello! This is a simple email message.";
	// 	$from = "someonelse@example.com";
	$headers = "From:" . $from;
	$result = mail($to,$subject,$message,$headers);
	
	return $result;
}

