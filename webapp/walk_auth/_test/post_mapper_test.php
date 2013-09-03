<?php

require_once '../../../php/phpDataMapper/Base.php';
require_once '../../../php/phpDataMapper/Adapter/Mysql.php';

require_once '../post/post_mapper.php';

$postMapper = PostMapper::getDbMapper();

 
# Get Things ---------------
$items = $postMapper->all();
foreach ($items as $item) {
	echo $item->id , '  ', $item->title , ' is ', $item->status, " <br/>\n";
}
 


?>