<?php


$app->get('/access/post/new', postEdit );
$app->get('/access/post/home', postIndex );

$app->post('/access/post/save', postSave );


function postIndex() 
{
	redirectIfNoSession();
	
	$postCtrl = new PostController();
	$postCtrl->actionIndex();
}

function postEdit() 
{
	$postCtrl = new PostController();
	$postCtrl->actionEdit();
}

function postSave() 
{
	global $app;
	
	$postCtrl = new PostController();
	$postCtrl->actionSave();
	$app->redirect('./home');
}

?>