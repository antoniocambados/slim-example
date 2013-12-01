<?php

// - Category index
$app->get('/category/:category_permalink', function ($category_permalink) use ($app) {
    // Get all the objects needed for the view
    $parameters = array(
        'category' => Category::with('projects')->where('permalink', '=', $category_permalink)->first(),
    );

    // Render view
    $app->render('category.html.twig', $parameters);
});


// - Project
$app->get('/category/:category_permalink/:project_permalink', function ($category_permalink, $project_permalink) use ($app) {
    // Get all the objects needed for the view
    $category = Category::where('permalink', '=', $category_permalink)->first();
    $parameters = array(
        'project' => Project::where('permalink', '=', $project_permalink)->where('category_id', '=', $category->id)->first(),
    );

    // Render view
    $app->render('project.html.twig', $parameters);
});