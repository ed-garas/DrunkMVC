<?php
defined('CORE_PATH') or exit('no access');

class Route
{
    const DEFAULT_CONTROLLER = 'home';
    const DEFAULT_ACTION = 'index';

    private $controller;
    private $action;
    private $params;

    public function __construct($controller, $action, array $params = array())
    {
        $this->controller = ucfirst($controller) . 'Controller';
        $this->action = $action . 'Action';
        $this->params = $params;
    }

    public static function create(array $parts = array())
    {
        $controller = empty($parts[0]) ? self::DEFAULT_CONTROLLER : $parts[0];
        $action = empty($parts[1]) ? self::DEFAULT_ACTION : $parts[1];
        $params = array_slice($parts, 2);
        return new Route($controller, $action, $params);
    }

    public function getController(Request $request, Response $response)
    {
        return new $this->controller($request, $response);
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }
}
