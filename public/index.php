<?php

require_once '../Core/Router.php';
require_once '../App/Controllers/TestController.php';

$router = new Router();

$router->addRoute('GET', '/test', 'TestController', 'getAction');
$router->addRoute('POST', '/test', 'TestController', 'postAction');

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($method, $uri);
