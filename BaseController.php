<?php

/**
 * Created by PhpStorm.
 * User: ed
 * Date: 16.8.31
 * Time: 17.45
 */
abstract class BaseController
{
    public function execute( $action, array $params = array() ){
        $this->before();
        call_user_func_array(array($this, $action), $params);
        $this->after();
    }

    protected function before()
    {

    }

    protected function after()
    {

    }
}