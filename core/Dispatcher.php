<?php
defined('CORE_PATH')or exit('no access');
class Dispatcher
{
    public function dispatch(Route $route, Request $request, Response $response)
    {
        try {
            $controller = $route->getController($request, $response);
            $controller->execute($route->getAction(), $route->getParams());
        }catch (\Exception $e){
            $response->append('404');//TODO@Kazimieras:create method setOutput
        }
    }
}