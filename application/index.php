<?php
/*include 'View.php';
$layout = new View('views/layout.php');
$meta = new View('views/meta.php', array('title'=>'Babina'));

$layout->addData('arr', array('vienas',2, 'trys'));
$layout->addData('coo', true);
$layout->addData('meta', $meta->render());
echo $layout->render();
 */

require_once '../core/BaseController.php';
require_once '../core/Router.php';
require_once '../core/Route.php';
require_once '../core/Dispatcher.php';
require_once '../core/FrontController.php';
require_once '../core/Request.php';
require_once '../core/Response.php';
require_once 'controllers/DummyController.php';
require_once 'controllers/BirdController.php';
require_once 'controllers/HomeController.php';
require_once 'config.php';

$request = new Request();
$response = new Response();

$router = new Router($mappings);
$dispatcher = new Dispatcher();

$frontController = new FrontController($router, $dispatcher);
$frontController->execute($request, $response);