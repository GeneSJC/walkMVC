<?php

require_once '../../../php/form_config_base.php';
require_once './post_formcfg.php';

require_once '../../../php/phpDataMapper/Base.php';
require_once '../../../php/phpDataMapper/Adapter/Mysql.php';
require_once './post_mapper.php';

require_once('../../../php/smarty/libs/Smarty.class.php');
require_once '../../../php/smarty_util.php';

require_once('../smarty_cfg.php');

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

		return "SAVE_OK";
 	}
	
 	/**
 	 * Echoes the JSON structure expected by AJAX
 	 */
	public function actionEdit()
	{
		$postFormCfg = new PostFormConfig();
		
		$jsonArr = $postFormCfg->jsonArr; // getJsonArray();
		
		$smarty = SmartyCfg::getSmarty();
		
		$smarty->assign("formJSON",$jsonArr);
		$smarty->display('post/post_edit.tpl');
	}

	
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

$postCtrl = new PostController();
$postCtrl->handleRequest();

?>