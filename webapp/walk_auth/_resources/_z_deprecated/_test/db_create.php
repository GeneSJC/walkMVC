<?php

require_once '../../../php/phpDataMapper/Base.php';
require_once '../../../php/phpDataMapper/Adapter/Mysql.php';

require_once '../util_db.php';

require_once '../user/map_user.php';
require_once '../user/map_recover.php';
require_once '../post/map_post.php';

$adapter = getDbAdapter();
$userMapper = new UserMapper($adapter);
$recoverMapper = new RecoverMapper($adapter);
$postMapper = new PostMapper($adapter);
echo  " <br/>\n";

$userMapper->migrate(); 
$recoverMapper->migrate(); 
$postMapper->migrate(); 

echo "Script finished without any known error";
?>