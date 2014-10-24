<?php

class StringUtil
{
	/**
	 * If it returns position of needle as 0, then we know the string starts with needle
	 *
	 * @param unknown_type $haystack
	 * @param unknown_type $needle
	 */
	public static function startsWith($haystack=null,$needle=null)
	{
		return strpos($haystack, $needle, 0) === 0;
	}

	public static function endsWith($haystack, $needle)
	{
		return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
	}
	
	public static function getBooleanAsString($bool=null)
	{
		if ($bool)
			return 'true';
	
		return 'false';
	}
	
	/**
	 * Checks $needle is in $haystack
	 * 
	 * @param string $haystack
	 * @param string $needle
	 * @return boolean
	 */
	public static function contains($haystack=null,$needle=null)
	{
		return (strpos($haystack, $needle) !== false);
	}
	
	public static function trimTrailingNumbers($text) 
	{
		preg_match('/\d/', $text, $m, PREG_OFFSET_CAPTURE);
		if (sizeof($m))
			$offset = $m[0][1]; 
		else
			$offset = strlen($text);
		
		$val = substr($text, 0, $offset);
		
		return $val;	
	}
	

	public static function getPipeKeyValuePair($fieldValue=null)
	{
		$valueStartIdx = strpos($fieldValue, '|');
		$key = substr($fieldValue, 0, $valueStartIdx);
			
		$value = substr($fieldValue, $valueStartIdx + 1); // +1 to skip the |
	
		return array ( trim($key), trim($value) );
	}
	
	public static function getPhpAssignmentKeyValuePair($fieldValue=null)
	{
		// FIXME - strpos not working for '=>' .. has to do with character encoding it seems
		$valueStartIdx = strpos($fieldValue, "=");
		$key = substr($fieldValue, 0, $valueStartIdx);
		// dumpAndExit($key);
	
		// +5 for '> &gt;'
		$value = substr($fieldValue, $valueStartIdx  + 5);
	
		return array ( trim($key), trim($value) );
	}	
	
	public static function dumpToString($obj)
	{
		return getAsString($obj);
	}
	
	public static function getAsString($obj)
	{
		ob_start();
		var_dump($obj);
		$result = ob_get_clean();
	
		return $result;
	}
	
	public static function singleQuote ($val) {
		return "'$val'";
	}
}

