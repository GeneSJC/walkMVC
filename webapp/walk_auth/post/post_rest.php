<?php


$app->get('/access/post/home', viewPostIndex );

$app->get('/access/post/edit', viewPostEdit );
$app->get('/access/post/edit/:id', viewPostEdit );

$app->post('/access/post/save', actionPostSave );


/**
 * Because there is only a simple get ->all() invocation,
 * don't think we need controller overhead
 */
function viewPostIndex() 
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
function viewPostEdit($id=null) 
{
	redirectIfNoSession();
	
	global $smarty;
	
	$postFormCfg = new PostFormConfig();

	if ( $id )
	{
		$postMapper = PostMapper::getDbMapper();
		
		$post = $postMapper->first(
									array
									(
										'id' => $id
									)
								);
		
		if ($post)
		{
			$postFormCfg->title['value'] = $post->title;
			$postFormCfg->body['value'] = $post->body;
			$postFormCfg->status['value'] = $post->status;
		}
		else
		{
			$smarty->assign("error_msg","Error loading db");
		}
	}
	
	$postFormCfg->loadFormFieldArray();
	$jsonArr = $postFormCfg->jsonArr; // getJsonArray();
	
	$smarty->assign("action",$jsonArr['action']);
	$smarty->assign("dFormId",'new-post-form');
	$smarty->assign("dFormJSON",$jsonArr);
	$smarty->display('post/post_edit.tpl');
}

function actionPostSave() 
{
	redirectIfNoSession();
	
	global $app;
	
	$postCtrl = new PostController();
	$postCtrl->actionSave();
	$app->redirect('./home');
}

?>