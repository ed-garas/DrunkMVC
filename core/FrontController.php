<?php

class FrontController
{
    private $router;
    private $dispatcher;

    public function __construct(Router $router, Dispatcher $dispatcher)
    {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    public function execute(Request $request, Response $response)
    {
        $route = $this->router->route($request);
        $this->dispatcher->dispatch($route, $request, $response);
    }
}
