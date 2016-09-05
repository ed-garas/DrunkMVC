<?php
/*include 'View.php';
$layout = new View('views/layout.php');
$meta = new View('views/meta.php', array('title'=>'Babina'));

$layout->addData('arr', array('vienas',2, 'trys'));
$layout->addData('coo', true);
$layout->addData('meta', $meta->render());
echo $layout->render();
 */

require_once 'controllers/BaseController.php';
require_once 'controllers/DummyController.php';
require_once 'controllers/BirdController.php';
require_once 'config.php';

$uri = trim(strtolower($_SERVER['PATH_INFO']), '/');

foreach ($mapping as $key=>$value){
    if(preg_match("#^$key$#",$uri)) {
        $uri = preg_replace("#^$key$#", $value, $uri);
        break;
    }
}
echo $uri;
die;
$segments = explode('/', $uri);
$segments = array_filter($segments, function ($segment) {
    return trim($segment);
});

$class = ucfirst($segments[0]) . 'Controller';
$method = $segments[1] . 'Action';
$params = array_slice($segments, 2);

$controller = new $class();
$controller->execute($method, $params);
