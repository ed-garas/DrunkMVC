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
        spl_autoload_register(array($this, 'entitie'));
    }

    public function load($class, $path = null)
    {
        $pathApp = APP_PATH . $path . DIRECTORY_SEPARATOR . $class . '.php';
        $pathCore = CORE_PATH . $path . DIRECTORY_SEPARATOR . $class . '.php';

        if (file_exists($pathApp) && is_readable($pathApp)) {
            require_once $pathApp;
        }elseif (file_exists($pathCore) && is_readable($pathCore)){
            require_once $pathCore;
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
        $this->load($class, 'models');
    }

    public function controller($class)
    {
        $this->load($class, 'controllers');
    }

    public function entitie($class)
    {
        $this->load($class, 'entities');
    }
}
