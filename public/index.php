<?php
require '../bootstrap/autoload.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../app/views',
    'mode' => 'development',
    'log.level' => \Slim\Log::ERROR,
    'log.enabled' => true,
    'log.writer' => new \Slim\Extras\Log\DateTimeFileWriter(array(
        'path' => '../logs',
        'name_format' => 'y-m-d'
    ))
));

// Only invoked if mode is "production"
$app->configureMode('production', function () use ($app) {
    $app->config(array(
        'debug' => false,
    ));
});

// Only invoked if mode is "development"
$app->configureMode('development', function () use ($app) {
    $app->config(array(
        'debug' => true,
    ));
});


// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../app/views/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->getInstance()->addGlobal('app', $app);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());


// Define routes
// - Index
$app->get('/', function () use ($app) {
    // Get all the objects needed for the view
    $parameters = array(
      'profile'    => Profile::first(),
      'categories' => Category::with('projects')->get(),
    );

    // Render view
    $app->render('index.html.twig', $parameters);
});
// - Category
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

// 404 Not Found handler
$app->notFound(function () use ($app) {
    $app->render('404.html.twig');
});

// Error handler
$app->error(function () use ($app) {
    $app->render('500.html.twig');
});

// Run app
$app->run();
