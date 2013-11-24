<?php
require __DIR__.'/../../../bootstrap/autoload.php';

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