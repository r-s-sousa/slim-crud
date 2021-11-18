<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Source\Controllers\AddressController;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App(new \Slim\Container($configuration));

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Olá mundo');
});

$app->get('/enderecos', AddressController::class. ":getAllAddress");
$app->get('/endereco/{id}', AddressController::class. ":getAddressById");
$app->post('/endereco', AddressController::class. ":createAddress");
$app->put('/endereco/{id}', AddressController::class. ":updateAddressById");
$app->delete('/endereco/{id}', AddressController::class. ":deleteAddressById");

$app->run();
