<?php

require_once '../../../php/phpDataMapper/Base.php';
require_once '../../../php/phpDataMapper/Adapter/Mysql.php';

require_once './user_mapper.php';

$userMapper = UserMapper::getDbMapper();

 
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
 
?>