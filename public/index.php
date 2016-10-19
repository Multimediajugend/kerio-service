<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true,
        'logger' => [
            'name' => 'slim-app',
            'level' => Monolog\Logger::DEBUG,
            'path' => __DIR__ . '/logs/app.log',
        ],
    ],
];

$app = new \Slim\App($config);

$app->get('/hello/{name}', function (\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, {$name}");
    return $response;
});
$app->group('/kerio', function () {
    $this->get('/users', 'Controllers\Kerio:getUsers');
});
$app->run();
