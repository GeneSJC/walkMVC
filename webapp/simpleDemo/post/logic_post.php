<?php

class PostController
{
	public function actionIndex()
	{
		global $smarty;
		
		$adapter = getDbAdapter();
		$postMapper = new PostMapper($adapter);
		
		$items = $postMapper->all();
		
		return $items;
 	}
	
 	public function actionSave()
 	{
		$adapter = getDbAdapter();
		$postMapper = new PostMapper($adapter);
 		
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