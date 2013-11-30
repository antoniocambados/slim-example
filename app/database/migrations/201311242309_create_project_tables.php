<?php
require_once __DIR__.'/../../../bootstrap/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->dropIfExists('projects');

if (!Capsule::schema()->hasTable('projects')) {
	Capsule::schema()->create('projects', function ($table) {
		$table->increments('id');
		$table->integer('category_id');
		$table->string('name');
		$table->string('title');
		$table->text('description');
		$table->string('permalink');
		$table->text('tags');
		$table->text('url');
		$table->timestamps();
	});

	// Indexes
	Capsule::schema()->table('projects', function ($table) {
		$table->index('category_id');
	});
}