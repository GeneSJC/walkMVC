<?php 

		// point this at the first REST path a user should see
	
	$restStart = ' ./access/public/home';
	
 	header( 'Location: ' . $restStart ) ;

?>