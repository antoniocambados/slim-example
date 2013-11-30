<?php
require __DIR__.'/../../../bootstrap/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Seeder;

class ProfilesSeeder extends Seeder {

	public function run() {
		Capsule::table('profiles')->truncate();

		foreach ($this->getProfiles() as $p) {
			$profile = new Profile;
			$profile->name     = $p['name'];
			$profile->email    = $p['email'];
			$profile->location = $p['location'];
			$profile->about    = $p['about'];

			$profile->save();
		}
	}

	private function getProfiles() {
		$seeds = array(
			array(
				'name'     => 'Antonio Cambados',
				'email'    => 'undisclosed.email@mailprovider.com',
				'location' => 'O Grove, Pontevedra, Spain',
				'about'    => '<p>Hi! I am a web programmer. I create web applications based on <strong>HTML5 standards</strong>.</p> <p>This web application is based on the <strong>Slim framework</strong> for PHP, and I have used things like Sass, Foundation, Modernizr and Twig.</p>',
			),
		);

		return $seeds;
	}

}

$seeder = new ProfilesSeeder;
$seeder->run();