<?php

class Dispatcher
{
    public function dispatch(Route $route, Request $request, Response $response)
    {
        $controller = $route->getController($request, $response);
        $controller->execute($route->getAction(), $route->getParams());
    }
}