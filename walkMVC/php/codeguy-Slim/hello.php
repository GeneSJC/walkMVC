<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/hello/:name', doHello );


function doHello ($name) {
    echo "zzHello, $name";
}

$app->run();