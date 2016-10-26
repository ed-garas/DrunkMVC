<?php
defined('CORE_PATH') or exit('no access');

class Config extends Singleton
{
    protected static $instance = null;

    private $data = array();

    protected function __construct()
    {
        $path = APP_PATH . 'config.php';

        if (file_exists($path) && is_readable($path)) {
            require_once $path;
        }

        if (isset($config) && is_array($config)) {
            $this->data = $config;
        }
    }

    public function __get($param)
    {
        return array_key_exists($param, $this->data) ? $this->data[$param] : null;
    }

}
