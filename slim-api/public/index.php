<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate app
$app = AppFactory::create();

// Parse json, form data and xml
$app->addBodyParsingMiddleware();

// Register routes
$routes = require __DIR__ .'/../app/routes/routes.php';
$routes($app);

// Run App
$app->run();
?>
