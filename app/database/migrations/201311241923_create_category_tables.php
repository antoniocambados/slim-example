<?php
require_once __DIR__.'/../../../bootstrap/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->dropIfExists('categories');

if (!Capsule::schema()->hasTable('categories')) {
	Capsule::schema()->create('categories', function($table) {
		$table->increments('id');
		$table->string('name');
		$table->string('title');
		$table->text('description');
		$table->string('permalink');
		$table->timestamps();
	});
}