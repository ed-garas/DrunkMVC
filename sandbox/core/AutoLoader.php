<?php
defined('CORE_PATH') or exit('no access');

class AutoLoader
{
    public function __construct()
    {
        spl_autoload_register(array($this, 'lib'));
        spl_autoload_register(array($this, 'load'));
        spl_autoload_register(array($this, 'model'));
        spl_autoload_register(array($this, 'entity'));
        spl_autoload_register(array($this, 'helper'));
        spl_autoload_register(array($this, 'controller'));
    }

    public function load($class, $path = null)
    {
        $path = empty($path) ? '' : $path . DIRECTORY_SEPARATOR;
        $filePath = APP_PATH . $path . $class . '.php';

        if (!$this->loadClass($filePath)) {
            $filePath = CORE_PATH . $path . $class . '.php';
            $this->loadClass($filePath);
        }
    }

    private function loadClass($path)
    {
        $exists = file_exists($path) && is_readable($path);
        if ($exists) {
            require_once $path;
        }
        return $exists;
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
        $this->load($class, 'models');
    }

    public function controller($class)
    {
        $this->load($class, 'controllers');
    }

    public function entity($class)
    {
        $this->load($class, 'entities');
    }
}
