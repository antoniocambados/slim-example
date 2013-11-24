<?php
require __DIR__.'/../app/config/database.php';

// Register databases
$capsule = new \Illuminate\Database\Capsule\Manager;

foreach ($database_connections as $key => $value) {
	$capsule->addConnection($value, $key);
}

// Set the event dispatcher used by Eloquent models... (optional)
$capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
