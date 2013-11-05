<?php

require_once './_util/app_includes.php';
frameworkLevelIncludes('../..');
appLevelIncludes('.');

function create($flag=null)
{
	if (!$flag)
	{
		echo "Edit PHP to run create";
		return;	
	}

	try 
	{
		echo "starting process";
				
		$adapter = getDbAdapter();
		$userMapper = new UserMapper($adapter);
		$recoverMapper = new RecoverMapper($adapter);
		$postMapper = new PostMapper($adapter);
		echo  " <br/>\n";
		
		$userMapper->migrate(); 
		$recoverMapper->migrate(); 
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

function testUserMap()
{
	$adapter = getDbAdapter();
	$userMapper = new UserMapper($adapter);
	
	echo  " <h2>All Test</h2>\n";
	$users = $userMapper->all();
	echo "count = " + count($users);
	echo  " <br/>\n";
	foreach ($users as $user) {
		echo $user->id , '  ', $user->login, '  ', $user->email, '  ', $user->password, " <br/>\n";
	}
	
	
	echo  " <h2>First Test</h2>\n";
	$user = $userMapper->first();
	echo $user->id , '  ', $user->login, '  ', $user->email, '  ', $user->password, " <br/>\n";
	
	
	echo  " <h2>First User Login Test</h2>\n";
	$login = 'admin';
	$password = '21232f297a57a5a743894a0e4a801fc3';
	
	$user = $userMapper->first(
			array(
					'login' => $login,
					'password' => $password
			)
	);
	
	$user = $userMapper->first();
	echo $user->id , '  ', $user->login, '  ', $user->email, '  ', $user->password, " <br/>\n";
		
}

testUserMap();

// testPostMap();
// create(1);

?>