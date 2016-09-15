<?php
defined('CORE_PATH')or exit('no access');
require_once CORE_PATH . 'AutoLoader.php';

new AutoLoader();

$request = new Request();
$response = new Response();

$router = new Router(Config::getInstance()->mappings);
$dispatcher = new Dispatcher();

$frontController = new FrontController($router, $dispatcher);
$frontController->execute($request, $response);
$response->send();

