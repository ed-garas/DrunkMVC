<?php
defined('CORE_PATH')or exit('no access');
require_once CORE_PATH.'BaseController.php';
require_once CORE_PATH.'Router.php';
require_once CORE_PATH.'Route.php';
require_once CORE_PATH.'Dispatcher.php';
require_once CORE_PATH.'FrontController.php';
require_once CORE_PATH.'Request.php';
require_once CORE_PATH.'Response.php';
require_once CORE_PATH.'View.php';
require_once CORE_PATH.'Singleton.php';
require_once CORE_PATH.'DrunkException.php';
require_once CORE_PATH.'Config.php';
require_once CORE_PATH.'Database.php';
require_once CORE_PATH.'BaseModel.php';
require_once APP_PATH.'controllers/DummyController.php';
require_once APP_PATH.'controllers/BirdController.php';
require_once APP_PATH.'controllers/HomeController.php';
require_once APP_PATH.'models/BirdModel.php';
require_once APP_PATH.'models/DummyModel.php';

$request = new Request();
$response = new Response();

$router = new Router(Config::getInstance()->mappings);
$dispatcher = new Dispatcher();

$frontController = new FrontController($router, $dispatcher);
$frontController->execute($request, $response);
$response->send();

