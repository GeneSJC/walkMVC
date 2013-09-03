<?php

class PostController
{
	private $statusMsg = 'none';
	
	public function actionSave()
	{
		$title = $_POST['title'];
		$body = $_POST['body'];
		$status = $_POST['status'];
		
		$postMapper = PostMapper::getDbMapper();
		 
		# Set data and save it
		$postEntity = $this->getRequestPostMapperEntity($postMapper);
		
		$postMapper->save($postEntity);

		/* 
		echo "title = $title , body = $body, status = $status";
		return;
		 */
		
		return "SAVE_OK";
 	}
	
 	/**
 	 * Echoes the JSON structure expected by AJAX
 	 */
	public function actionEdit()
	{
		global $smarty;
		
		$postFormCfg = new PostFormConfig();
		
		$jsonArr = $postFormCfg->jsonArr; // getJsonArray();
		
		// $smarty = SmartyCfg::getSmarty();
		
		$smarty->assign("action",$jsonArr['action']);
		$smarty->assign("dFormId",'new-post-form');
		$smarty->assign("dFormJSON",$jsonArr);
		$smarty->display('post/post_edit.tpl');
	}

	
	public function actionIndex()
	{
		global $smarty;
		
		$postMapper = PostMapper::getDbMapper();
		$items = $postMapper->all();
		
	 	// $smarty = SmartyCfg::getSmarty();

	 	if ( $this->statusMsg != null)
		{
			$smarty->assign("statusMsg", $this->statusMsg);
		}
		
		$smarty->assign("items",$items);		
		$smarty->display('post/post_home.tpl');
 	}
	
	function handleRequest()
	{
		$reqAction = null;
		if (array_key_exists('req', $_REQUEST))
		{
			$reqAction = trim($_REQUEST['req']);
		}
		
		if ( $reqAction == "new")
		{
			 $this->actionEdit();
			 return;
		}
		
		if ( $reqAction == "save")
		{
			 $this->statusMsg = $this->actionSave();
		}
		
		$this->actionIndex();	
	}
	
	private function getRequestPostMapperEntity($postMapper=null)
	{
		# New, empty post entity
		$postEntity = $postMapper->get();
		
		# Set data and save it
		$postEntity->title = $_POST['title'];
		$postEntity->body = $_POST['body'];
		$postEntity->status = $_POST['status'];
		
		return $postEntity;
	}
		
}

// $postCtrl = new PostController();
// $postCtrl->handleRequest();

?>