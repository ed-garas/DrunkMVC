<?php
defined('CORE_PATH') or exit('no access');

class AutoLoader 
{
    public function __construct()
    {
        spl_autoload_register(array($this, 'load'));
        spl_autoload_register(array($this, 'model'));
        spl_autoload_register(array($this, 'controller'));
    }

    public function load($class, $path = null)
    {
        $path = empty($path) ? CORE_PATH : APP_PATH . $path . DIRECTORY_SEPARATOR;
        $filePath = $path . $class . '.php';

        if (file_exists($filePath) && is_readable($filePath)) {
            require_once $filePath;
        }
    }

    public function model($class)
    {
        $this->load($class, 'models');
    }

    public function controller($class)
    {
        $this->load($class, 'controllers');
    }
}
