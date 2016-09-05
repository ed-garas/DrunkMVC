<?php

abstract class BaseController
{
    protected function before() {}

    protected function after() {}
    
    public function execute($action, array $params=array()) {
        $this->before();
        call_user_func_array(array($this, $action), $params);
        $this->after();
    }
}
