<?php 

		// point this at the first REST path a user should see
	
	$restStart = ' ./access/public/home';
	$restStart = ' ./access.php/access/post/home';
	
 	header( 'Location: ' . $restStart ) ;

?>