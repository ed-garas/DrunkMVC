<?php
/*include 'View.php';
$layout = new View('templates/layout.php');
$meta = new View('templates/meta.php', array('title'=>'Babina'));

$layout->addData('arr', array('vienas',2, 'trys'));
$layout->addData('coo', true);
$layout->addData('meta', $meta->render());
echo $layout->render();
 */

require_once 'BaseController.php';
require_once 'DummyController.php';
require_once 'BirdController.php';

$uri = strtolower($_SERVER['PATH_INFO']);
$segments = explode("/", trim($uri, "/"));
$segments = array_filter($segments, function ($segment) { return trim($segment);});

$class = ucfirst($segments[0]).'Controller';
$method = $segments[1].'Action';
$params = array_slice($segments, 2);

$controller = new $class();
$controller->execute($method, $params);



