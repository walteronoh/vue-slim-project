<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

require __DIR__ . '/../services/services.php';

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    // Homepage
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('<h3 style="text-align:center">Slim API</h3>');
        return $response;
    });

    // Get All Users Api
    $app->get('/users', function (Request $request, Response $response) {
        $service = new Services();
        $result = $service->getUsers();
        $payload = json_encode($result);
        // echo $payload;
        $response->getBody()->write($payload);
        $response->withHeader('Content-Type', 'Application/Json')->withStatus(200);
        return $response;
    });

    // Login Api
    $app->post('/login', function (Request $request, Response $response) {
        $service = new Services();
        $body = $request->getParsedBody();
        $result = $service->loginUser($body['username'],$body['password']);
        $payload = json_encode($result);
        $response->getBody()->write($payload);;
        return $response;
    });

    // Register Api
    $app->post('/register', function (Request $request, Response $response) {
        $service = new Services();
        $body = $request->getParsedBody();
        $result = $service->registerUser($body['firstname'], $body['lastname'], $body['username'], $body['password']);
        $payload = json_encode($result);
        $response->getBody()->write($payload);
        return $response;
    });

    // Create users table
    $app->get('/create_users_table', function (Request $request, Response $response) {
        $service = new Services();
        $result = json_encode($service->create_users_table());
        $response->getBody()->write($result);
        if($response == 'true') return $response->withHeader('Content-Type', 'Application/Json')->withStatus(201);
        return $response->withHeader('Content-Type', 'Application/Json')->withStatus(400);
    });
};
