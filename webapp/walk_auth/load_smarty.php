<?php

define('SMARTY_DIR', '../../php/smarty/libs/');

require_once(SMARTY_DIR . 'Smarty.class.php');

$smarty = new Smarty;

$smarty->template_dir = './_templates/';

$smarty->cache_dir = './_resources/cache/';
$smarty->compile_dir = './_resources/templates_c/';
$smarty->config_dir = './_resources/configs/';

//$smarty->force_compile = true;
//$smarty->debugging = true;

// $smarty->caching = true;
// $smarty->cache_lifetime = 120;

?>