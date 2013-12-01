<?php

namespace Portfolio\Controller;

use \Slim\Slim;

class Controller {

	private $app;

	public function __construct(Slim $app) {
		$this->app = $app;
	}

	protected function render($template, $data = array(), $status = null) {
    $this->app->render($template, $data, $status);
	}

}