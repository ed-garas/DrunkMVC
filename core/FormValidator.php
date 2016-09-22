<?php
defined('CORE_PATH') or exit('no access');

class FormValidator extends Singleton
{
    protected static $instance = null;

    private $rules = array();

    protected function __construct()
    {
        $this->rules = Config::getInstance()->validator;
        if (!is_array($this->rules)) {
            $this->rules = array();
        }
    }

    public function validate($form, $rule)
    {
        if (!is_array($this->rules[$rule])) {
            return true;
        }
        return false;
    }
}
