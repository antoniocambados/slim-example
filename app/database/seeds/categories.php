<?php
require __DIR__.'/../../../bootstrap/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder {

	public function run() {
		Capsule::table('categories')->truncate();

		foreach ($this->getCategories() as $c) {
			$category = new Category;
			$category->name        = $c['name'];
			$category->title       = $c['title'];
			$category->description = $c['description'];
			$category->permalink   = $c['permalink'];

			$category->save();
		}
	}

	private function getCategories() {
		$seeds = array(
			array(
				'name'        => 'frameworks',
				'title'       => 'Frameworks',
				'description' => 'Here you can see a selection of some of the frameworks I\'ve been using recently for web application rapid development.',
				'permalink'   => 'frameworks',
			),
		);

		return $seeds;
	}

}

$seeder = new CategoriesSeeder;
$seeder->run();