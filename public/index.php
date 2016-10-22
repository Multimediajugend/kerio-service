<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../application/config.php';

$app = new \Slim\App(["settings" => $config]);

$app->get('/hello/{name}', function (\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, {$name}");
    return $response;
});

$app->group('/kerio', function () {
    $this->get('/users', 'Controllers\Kerio:getUsers');
    $this->put('/user', 'Controllers\Kerio:addUser');
});

$app->run();
