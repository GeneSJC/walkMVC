<?php 

		// point this at the first REST path a user should see

		// FIXME - this should use the cfg var somehow
	$restStart = ' ./access/post/home';
	$restStart = ' ./access.php/access/post/home';
	
 	header( 'Location: ' . $restStart ) ;

?>