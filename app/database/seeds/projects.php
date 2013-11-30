<?php
require __DIR__.'/../../../bootstrap/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder {

	public function run() {
		Capsule::table('projects')->truncate();

		foreach ($this->getCategoryProjects() as $category_key => $projects) {
			$category = Category::where('name', '=', $category_key)->first();

			foreach ($projects as $p) {
				$project = new Project;
				$project->name        = $p['name'];
				$project->title       = $p['title'];
				$project->description = $p['description'];
				$project->permalink   = $p['permalink'];
				$project->tags        = $p['tags'];
				$project->url         = $p['url'];

				$project->save();
				$category->projects()->save($project);
			}
		}
	}

	private function getCategoryProjects() {
		$seeds = array(
			'frameworks' => array(
				array(
					'name'        => 'symfony',
					'title'       => 'Symfony 2',
					'description' => 'The most used PHP framework.',
					'permalink'   => 'symfony',
					'tags'        => 'php, symfony, mvc, doctrine',
					'url'         => 'http://symfony.com/',
				),
				array(
					'name'        => 'rails',
					'title'       => 'Ruby on Rails',
					'description' => 'The framework that radically changed web application development.',
					'permalink'   => 'rails',
					'tags'        => 'ruby, rails, mvc, active record',
					'url'         => 'http://rubyonrails.org/',
				),
			),
		);

		return $seeds;
	}

}

$seeder = new ProjectsSeeder;
$seeder->run();