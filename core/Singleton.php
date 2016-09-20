<?php
defined('CORE_PATH')or exit('no access');

abstract class Singleton
{
    protected static $instance = null;

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}
