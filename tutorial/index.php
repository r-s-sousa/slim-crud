<?php

require __DIR__ . "/../vendor/autoload.php";
include 'Middleware.php';
include 'Actions.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
    'displayErrorDetails' => true
]];
$app = new \Slim\App($config);

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/rafael', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("teste<br>");
})->add(Middleware::class)->add(Middleware2::class);

// Add route callbacks
$app->get('/', function ($request, $response, $args) {
    return $response->withStatus(200)->write('Hello World!');
});

$app->group('/api', function ($app) {
    $app->get('', None::class);
    $app->get('/v1', Action::class);
    $app->get('/v2', Action2::class);
})->add(Auth::class);


$app->run();
