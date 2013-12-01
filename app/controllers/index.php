<?php

$app->get('/', function () use ($app) {
    // Get all the objects needed for the view
    $parameters = array(
      'profile'    => Profile::first(),
      'categories' => Category::with('projects')->get(),
    );

    // Render view
    $app->render('index.html.twig', $parameters);
});