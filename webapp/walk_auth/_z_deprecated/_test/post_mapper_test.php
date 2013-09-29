<?php

require_once '../../../php/phpDataMapper/Base.php';
require_once '../../../php/phpDataMapper/Adapter/Mysql.php';

require_once '../util_db.php';

require_once '../post/map_post.php';

$adapter = getDbAdapter();
$postMapper = new PostMapper($adapter);


 
# Get Things ---------------
$items = $postMapper->all();
foreach ($items as $item) {
	echo $item->id , '  ', $item->title , ' is ', $item->status, " <br/>\n";
}
 
$postMapper->delete(
		array(
				'id' => 47,
		)
);

?>