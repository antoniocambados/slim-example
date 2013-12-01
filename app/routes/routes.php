<?php

/**
 * Routes
 */


// Index
$app->get('/', function () use ($app) {
     $controller = new Portfolio\Controller\IndexController($app);
     $controller->index();
});

// Category index
$app->get('/category/:category', function ($category) use ($app) {
    $controller = new Portfolio\Controller\CategoryController($app);
    $controller->index($category);
});

// Project
$app->get('/category/:category/:project', function ($category, $project) use ($app) {
    $controller = new Portfolio\Controller\CategoryController($app);
    $controller->project($category, $project); 
});
