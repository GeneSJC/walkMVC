<?php


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



?>