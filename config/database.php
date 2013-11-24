<?php

// This is the configuration file for Eloquent ORM database connections

$database_connections = array(
	'default' => array(
		'driver'    => 'mysql',
	  'host'      => 'localhost',
	  'database'  => 'slim-example',
	  'username'  => 'root',
	  'password'  => 'root',
	  'charset'   => 'utf8',
	  'collation' => 'utf8_general_ci',
	  'prefix'    => ''
  ),
);