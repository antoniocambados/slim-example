<?php

namespace Portfolio\Controller;

use \Slim\Slim;

class Controller {

	protected $app;

	public function __construct(Slim $app) {
		$this->app = $app;
	}

	/**
	 * Renders the template with the specified data.
	 * This serves as a wrap for $this->app->render();
	 */
	protected function render($template, $data = array(), $status = null) {
    $this->app->render($template, $data, $status);
	}

	/**
	 * Returns a basic breadcrumb array with home node already in it.
	 * It is just an array which elements consist of the properties
	 * 'title', 'url', and 'class'.
	 */
	protected function breadcrumbs() {
		$breadcrumbs = array();

		$breadcrumbs[] = array(
			'title' => 'Home',
			'url'   => $this->app->urlFor('index'),
			'class' => '',
		);

		return $breadcrumbs;
	}

}