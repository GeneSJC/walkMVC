<?php


$app->get('/access/post/new', postEdit );
$app->get('/access/post/home', postIndex );

$app->post('/access/post/save', postSave );

/**
 * Because there is only a simple get ->all() invocation,
 * don't think we need controller overhead
 */
function postIndex() 
{
	redirectIfNoSession();
	
	global $smarty;
	
	$postCtrl = new PostController();
	$items = $postCtrl->actionIndex();	

	$smarty->assign("items",$items);		
	$smarty->display('post/post_home.tpl');
}

/**
 * This function loads an empty form
 * No need to use a controller for this render
 */
function postEdit() 
{
	redirectIfNoSession();
	
	global $smarty;
	
	$postFormCfg = new PostFormConfig();
	
	$jsonArr = $postFormCfg->jsonArr; // getJsonArray();
	
	$smarty->assign("action",$jsonArr['action']);
	$smarty->assign("dFormId",'new-post-form');
	$smarty->assign("dFormJSON",$jsonArr);
	$smarty->display('post/post_edit.tpl');
}

function postSave() 
{
	redirectIfNoSession();
	
	global $app;
	
	$postCtrl = new PostController();
	$postCtrl->actionSave();
	$app->redirect('./home');
}

?>