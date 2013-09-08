<?php

require_once '../../../php/phpDataMapper/Base.php';
require_once '../../../php/phpDataMapper/Adapter/Mysql.php';

require_once '../util_db.php';

require_once '../user/map_user.php';
require_once '../post/map_post.php';

$adapter = getDbAdapter();
$userMapper = new UserMapper($adapter);
$postMapper = new PostMapper($adapter);
echo  " <br/>\n";

$userMapper->migrate(); 
$postMapper->migrate(); 

echo "Script finished without any known error";
?>