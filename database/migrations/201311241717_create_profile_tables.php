<?php
require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../config/config_bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->dropIfExists('profiles');

if (!Capsule::schema()->hasTable('profiles')) {
	Capsule::schema()->create('profiles', function($table) {
		$table->increments('id');
		$table->string('name');
		$table->string('email');
		$table->string('location');
		$table->text('about');
		$table->timestamps();
	});
}