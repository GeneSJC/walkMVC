<?php

// ~~~~~~~~~~~~~~~~~~~ BEGIN - Ajax Demo REST

$app->get('/access/demo/ajaxClient1', 'demoAjaxClient1' );

$app->get('/access/demo/ajaxSvc1', 'demoAjaxSvc1' );

function demoAjaxSvc1() { echo 55; }

function demoAjaxClient1()
{
	global $smarty;
	$smarty->display('_demo/ajax_jquery_demo.tpl');
}

// ~~~~~~~~~~~~~~~~~~~ END - Ajax Demo REST


?>