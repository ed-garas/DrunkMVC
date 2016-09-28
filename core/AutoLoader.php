<?php
defined('CORE_PATH') or exit('no access');

class AutoLoader
{
    public function __construct()
    {
        spl_autoload_register(array($this, 'load'));
        spl_autoload_register(array($this, 'lib'));
        spl_autoload_register(array($this, 'helper'));
        spl_autoload_register(array($this, 'model'));
        spl_autoload_register(array($this, 'controller'));
    }

    public function load($class, $path = null, $isCore = true)
    {
        $filePath = $isCore ? CORE_PATH : APP_PATH;
        $filePath .= empty($path) ? '' : $path . DIRECTORY_SEPARATOR;
        $filePath .= $class . '.php';

        if (file_exists($filePath) && is_readable($filePath)) {
            require_once $filePath;
        }
    }

    public function lib($class)
    {
        $this->load($class, 'libs');
    }

    public function helper($class)
    {
        $this->load($class, 'helpers');
    }

    public function model($class)
    {
        $this->load($class, 'models', false);
    }

    public function controller($class)
    {
        $this->load($class, 'controllers', false);
    }
}
