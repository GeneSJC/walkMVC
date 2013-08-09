<?php

require_once '../../php/phpDataMapper/Base.php';
require_once '../../php/phpDataMapper/Adapter/Mysql.php';


class PostController
{
	private $statusMsg = 'none';
	
	public function actionIndex()
	{
		$postMapper = PostMapper::getDbMapper();
		$items = $postMapper->all();
		
	 	$smarty = SmartyCfg::getSmarty();

	 	if ( $this->statusMsg != null)
		{
			$smarty->assign("statusMsg", $this->statusMsg);
		}
		
		$smarty->assign("items",$items);		
		$smarty->display('post/post_home.tpl');
 	}
	
 	/**
 	 * Echoes the JSON structure expected by AJAX
 	 */
	public function actionEditor()
	{
		$postFormCfg = new PostFormConfig();
		
		$jsonArr = $postFormCfg->jsonArr; // json array for display
		
		$smarty = SmartyCfg::getSmarty();
		
		$smarty->assign("formJSON",$jsonArr);
		$smarty->display('post/post_edit.tpl');
	}

 	
	public function actionSave()
	{
		$postMapper = PostMapper::getDbMapper();
		 
		# Set data and save it
		$postEntity = $this->getRequestPostMapperEntity($postMapper);
		
		$postMapper->save($postEntity);

		$this->statusMsg = "SAVE_OK";
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
			 $this->actionEditor();
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


?>