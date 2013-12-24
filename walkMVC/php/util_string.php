<?php

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

/**
 * Basic encryption of values for communicating with 3rd parties
 */
function getMixedValue($realValue=null)
{
	$core = $realValue * 13;

	$prefix = getRandomString(5);
	$suffix = getRandomString(5);

	$mixedValue = $prefix . $core . $suffix;

	return $mixedValue;
}


/**
 * Basic decryption of values for communicating with 3rd parties
 */
function getUnmixedValue($mixedValue=null)
{
	// core + suffix
	// at position 6 core begins
	$core_suffix = substr($mixedValue, 5);
		
	$suffix_len = strlen($core_suffix);
		
	// go from core_suffix to as many characters up to where suffix begins
	$core = substr($core_suffix, 0, $suffix_len - 5);
		
	$realValue = $core / 13;

	return $realValue;
}

function getMixedUserTrxnId($userId, $userName)
{
	$nameHex = bin2hex($userName);
	$idMixed = getMixedValue($userId);

	$mixedUserTrxnId = $nameHex . '_' . $idMixed;

	return $mixedUserTrxnId;
}

function getTrxnIdUserArr($mixedUserTrxnId)
{
	list ( $nameHex, $idMixed) = explode('_', $mixedUserTrxnId);

	$userName = hexToStr($nameHex);
	$userId = getUnmixedValue($idMixed);

	return array($userId, $userName);
}

function hexToStr($hex)
{
	$str='';
	for ($i=0; $i < strlen($hex)-1; $i+=2)
	{
		$str .= chr(hexdec($hex[$i].$hex[$i+1]));
	}
	return $str;
}

