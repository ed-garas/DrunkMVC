<?php
defined('CORE_PATH')or exit('no access');
class Request
{
    private $uri = '';

    public function __construct()
    {
        if (isset($_SERVER['PATH_INFO'])) {
            $this->uri = trim(strtolower($_SERVER['PATH_INFO']), '/');
        }
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function isAjax(){
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    public function post(){
        return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }

}