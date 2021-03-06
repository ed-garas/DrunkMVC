<?php
defined('CORE_PATH')or exit('no access');
class FrontController
{
    private $router;
    private $dispatcher;

    public function __construct(Router $router, Dispatcher $dispatcher)
    {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    public function execute(Request $request, BaseResponse $response)
    {
        $route = $this->router->route($request);
        $this->dispatcher->dispatch($route, $request, $response);
    }
}
