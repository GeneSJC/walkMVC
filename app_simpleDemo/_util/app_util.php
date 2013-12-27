<?php

/**
 * Wrapper class for basic app methods 
 *
 */
class App extends BaseAppUtil
{	
}


function getDbAdapter()
{
	$adapter = new phpDataMapper_Adapter_Mysql(
			AppCfg::DB_SERVER,
			AppCfg::DB_NAME,
			AppCfg::DB_USER,
			AppCfg::DB_PWD
	);

	return $adapter;
}

