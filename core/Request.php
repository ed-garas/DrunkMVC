<?php

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

}