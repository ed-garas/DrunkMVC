<?php
defined('CORE_PATH')or exit('no access');
class Dispatcher
{
    public function dispatch(Route $route, Request $request, BaseResponse $response)
    {
        try {
            $controller = $route->getController($request, $response);
            $controller->execute($route->getAction(), $route->getParams());
        }catch (\Exception $e){
            $response->setOutput('404');
        }
    }
}