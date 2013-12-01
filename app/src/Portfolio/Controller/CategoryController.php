<?php

namespace Portfolio\Controller;

use Portfolio\Controller\Controller;
use Portfolio\Model\Profile;
use Portfolio\Model\Category;
use Portfolio\Model\Project;

class CategoryController extends Controller {

	/**
	 * Renders a category page.
	 * 
	 * @param string $category_permalink The identifying permalink of the category.
	 */
	public function index($category_permalink) {
		// Get all the objects needed for the view
		$parameters = array(
			'category' => Category::with('projects')->where('permalink', '=', $category_permalink)->first(),
		);

		// Render view
		$this->render('category.html.twig', $parameters);
	}

	/**
	 * Renders a project page. The project must belong to a category,
	 * so both identifiers must be provided.
	 * 
	 * @param string $category_permalink The identifying permalink of the category.
	 * @param string $project_permalink The identifying permalink of the project.
	 */
	public function project($category_permalink, $project_permalink) {
		// Get all the objects needed for the view
		$category   = Category::where('permalink', '=', $category_permalink)->first();
		$parameters = array(
			'project' => Project::where('permalink', '=', $project_permalink)->where('category_id', '=', $category->id)->first(),
		);

		// Render view
		$this->render('project.html.twig', $parameters);
	}
}
