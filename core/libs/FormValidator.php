<?php
defined('CORE_PATH') or exit('no access');

class FormValidator extends Singleton
{
    protected static $instance = null;

    private $collections = array();

    protected function __construct()
    {
        $this->collections = Config::getInstance()->validator;
        if (!is_array($this->collections)) {
            $this->collections = array();
        }
    }

    public function validate($data, $collection, &$result)
    {
        $fields = $this->collections[$collection];
        if (!is_array($fields)) {
            return true;
        }
        $isValid = true;
        $result = array_merge(
            array_fill_keys(array_keys($data), true),
            array_fill_keys(array_keys($fields), true)
        );
        foreach ($fields as $field => $rules) {
            $result[$field] = $this->isValid($data[$field], $rules);
            $isValid = $result[$field] && $isValid;
        }
        return $isValid;
    }

    private function isValid($value, $rules)
    {
        foreach ($rules as $rule) {
            $method = 'isValid' . ucfirst($rule);
            if (!$this->$method($value)) {
                return false;
            }
        }
        return true;
    }

    private function isValidRequired($value)
    {
        return !empty($value) && trim($value);
    }

    private function isValidEmail($value)
    {
        if (empty($value)) {
            return true;
        }
        return filter_var($value, FILTER_SANITIZE_EMAIL) !== false;
    }

    private function isValidDate($value, $format = 'Y-m-d')
    {
        if (empty($value)) {
            return true;
        }
        return $value === date($format, strtotime($value));
    }

}
