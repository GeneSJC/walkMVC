<?php

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


// ==========================================
// =====================
//   File Utils
// ------------------

function writeFile ($stringData, $myFile = null) {

	$mode = 'a';

	if ( ! file_exists($myFile)) {
		$mode = 'w';
	}

	// echo "attempting to open: $myFile with mode $mode";

	$fh = fopen($myFile, $mode) or die("can't open file");

	fwrite($fh, $stringData);
	fclose($fh);

	return $myFile;
}


// ==========================================
// =====================
//   String Utils
// ------------------

function dumpToString($obj)
{
	ob_start();
	var_dump($obj);
	$result = ob_get_clean();

	return $result;
}

function singleQuote ($val) {
	return "'$val'";
}


/**
 * If it returns position of needle as 0, then we know the string starts with needle
 *
 * @param unknown_type $haystack
 * @param unknown_type $needle
 */
function startsWith($haystack=null,$needle=null)
{
	return strpos($haystack, $needle, 0) === 0;
}


function getRandomString($length=10)
{
	$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
	shuffle($chars);
	$password = implode(array_slice($chars, 0, $length));

	return $password;
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