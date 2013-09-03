<?php

class PostController
{
	private $statusMsg = 'none';
	
	public function actionIndex()
	{
		global $smarty;
		
		$postMapper = PostMapper::getDbMapper();
		$items = $postMapper->all();
		
		return $items;
 	}
	
 	public function actionSave()
 	{
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
 	
 	
	private function getRequestPostMapperEntity($postMapper=null)
	{
		# New, empty post entity
		$postEntity = $postMapper->get();
		
		# Set data and save it
		$postEntity->title = $_POST['title'];
		$postEntity->body = $_POST['body'];
		$postEntity->status = $_POST['status'];

		$updateId = $_POST['post_id'];
		if ($updateId > 0)
		{
			// do update instead of save
			$postEntity->id = $updateId;
		}
		
		return $postEntity;
	}
		
}

// $postCtrl = new PostController();
// $postCtrl->handleRequest();

?>