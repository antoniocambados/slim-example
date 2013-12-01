<?php

namespace Portfolio\Controller;

use Portfolio\Controller\Controller;
use Portfolio\Model\Profile;
use Portfolio\Model\Category;

class IndexController extends Controller {

	/**
	 * Renders the index of the app.
	 */
	public function index() {
		// Get all the objects needed for the view
		$parameters = array(
			'profile'    => Profile::first(),
			'categories' => Category::with('projects')->get(),
		);

		// Render view
		$this->render('index.html.twig', $parameters);
	}
}