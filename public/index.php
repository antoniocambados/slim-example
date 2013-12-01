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

// 404 Not Found handler
$app->notFound(function () use ($app) {
    $app->render('404.html.twig');
});

// Error handler
$app->error(function () use ($app) {
    $app->render('500.html.twig');
});

// Routes
require '../app/routes/routes.php';

// Run app
$app->run();
