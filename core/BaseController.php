<?php
defined('CORE_PATH') or exit('no access');

abstract class BaseController
{
    protected $request;
    protected $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function execute($action, array $params = array())
    {
        $this->before();
        call_user_func_array(array($this, $action), $params);
        $this->after();
    }

    protected function view($template, array $data = array(), $return = false)
    {
        $view = new View($template, $data);
        $buffer = $view->render();
        if ($return) {
            return $buffer;
        }
        $this->response->append($buffer);
        return $this;
    }

    protected function before()
    {
    }

    protected function after()
    {
    }
}
