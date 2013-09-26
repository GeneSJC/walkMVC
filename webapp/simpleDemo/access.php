<?php

require_once './app_includes.php';	

loadSmarty();

	// IMPORTANT: These includes must come after the $app declaration above & before the ->run() call below
$app = getRestConfig();

session_start();

$app->run();
