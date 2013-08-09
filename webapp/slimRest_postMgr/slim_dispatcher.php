<?php

require_once '../../php/codeguy-Slim/Slim/Slim.php';

require_once('../../php/smarty/libs/Smarty.class.php');
require_once '../../php/smarty_util.php';
require_once('./smarty_cfg.php');

require_once '../../php/phpDataMapper/Base.php';
require_once '../../php/phpDataMapper/Adapter/Mysql.php';
require_once './post/post_mapper.php';

require_once '../../php/form_config_base.php';
require_once './post/post_formcfg.php';

require_once './post/post_ctrl.php';


\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();


$postCtrl = new PostController();

$app->get('/slim_dispatcher/home', actionIndex )->name('home');
$app->get('/slim_dispatcher/new', actionEditor );
$app->post('/slim_dispatcher/save', actionSave )->name('save');

function goHome()
{
 	header( 'Location: ./home' ) ;
 	// $app = new \Slim\Slim();
  	// $app->redirect('/home');
}

function actionIndex() 
{
	$postCtrl = new PostController();
	$postCtrl->actionIndex();
}

function actionEditor() 
{
	$postCtrl = new PostController();
	$postCtrl->actionEditor();
}

function actionSave() 
{
	$postCtrl = new PostController();
	$postCtrl->actionSave();
	$postCtrl->actionIndex();
}


$app->run();