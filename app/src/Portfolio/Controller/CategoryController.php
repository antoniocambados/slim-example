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
	public function category($category_permalink) {
		// Get the category
		$category = Category::with('projects')->where('permalink', '=', $category_permalink)->first();

		// Ensure the object has been found
		if (!$category) {
			$this->app->notFound();
		}

		// Get all the objects needed for the view
		$parameters = array(
			'category' => $category,
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
		// Get the category
		$category = Category::where('permalink', '=', $category_permalink)->first();
		if ($category) {
			$project  = Project::where('permalink', '=', $project_permalink)->where('category_id', '=', $category->id)->first();
		}

		// Ensure the objects have been found
		if (!$category || !$project) {
			$this->app->notFound();
		}

		// Get all the objects needed for the view
		$parameters = array(
			'project' => $project,
		);

		// Render view
		$this->render('project.html.twig', $parameters);
	}
}
