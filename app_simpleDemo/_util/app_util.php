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
			DB_SERVER,
			DB_NAME,
			DB_USER,
			DB_PWD
	);

	return $adapter;
}

