<?php

require_once '../_util/app_cfg.php';
require_once '../_util/app_includes.php';
  
localInit();

function create($flag=null)
{
	echo "Enter create";
	
	if (!$flag)
	{
		echo "Edit PHP to run create";
		return;	
	}

	try 
	{
		echo "starting process";
				
		$adapter = getDbAdapter();
		$postMapper = new PostMapper($adapter);

		echo  " Got all objects <br/>\n";
		
		$postMapper->migrate(); 
		
		echo "Script finished without any known error";
	} 
	catch (Exception $e) 
	{
		echo "Error!";		
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
		
		
}

function testPostMap()
{
	$adapter = getDbAdapter();
	$postMapper = new PostMapper($adapter);

	$postEntity = $postMapper->get();
	$postEntity->title = 'first post';
	$postEntity->body = 'body OF first post';
	$postEntity->status = 'live';
	
	$postMapper->save($postEntity);
	
	echo "finished save";
	
	# Get Things ---------------
	$items = $postMapper->all();
	foreach ($items as $item) {
		echo $item->id , '  ', $item->title , ' is ', $item->status, " <br/>\n";
	}
	
	// 	$postMapper->delete(
	// 			array(
	// 					'id' => 47,
	// 			)
	// 	);
	
}

testPostMap();
// create(1);


