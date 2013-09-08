<?php

class MapperBase extends phpDataMapper_Base
{
	const SERVER = '127.0.0.1';
	const DB_NAME = 'walk_mvc';
	const USER = 'gene';
	const PWD = 'gene';
	
}

function getDbAdapter()
{
	$adapter = new phpDataMapper_Adapter_Mysql(
			MapperBase::SERVER,
			MapperBase::DB_NAME,
			MapperBase::USER,
			MapperBase::PWD
	);
	
	return $adapter;
}
?>