<?php

class PostController
{
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

 		$postFormConfig =  new PostFormConfig();
 		
 		# Set data and save it
 		$postEntity = $postFormConfig->getRequestAsEntity($postMapper);
 	
 		$postMapper->save($postEntity);
 	
 		/*
 		echo "title = $title , body = $body, status = $status";
 			return;
 		*/
 	
 		return "SAVE_OK";
 	}
 	
}

?>