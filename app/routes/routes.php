<?php

/**
 * Routes
 */


// Index
$app->get('/', function () use ($app) {
     $controller = new Portfolio\Controller\IndexController($app);
     $controller->index();
})->name('index');

// Category index
$app->get('/category/:category', function ($category) use ($app) {
    $controller = new Portfolio\Controller\CategoryController($app);
    $controller->category($category);
})->name('category');

// Project
$app->get('/category/:category/:project', function ($category, $project) use ($app) {
    $controller = new Portfolio\Controller\CategoryController($app);
    $controller->project($category, $project); 
})->name('project');
