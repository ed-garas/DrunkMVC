<?php
defined('CORE_PATH') or exit('no access');

class View
{
    const VIEWS_DIR = 'views' . DIRECTORY_SEPARATOR;
    protected $_template;
    protected $_data = array();

    public function __construct($template, array $data = array())
    {
        $this->setTemplate($template)->setData($data);
    }

    public function setData(array $data, $rewrite = false)
    {
        $this->_data = $rewrite ? $data : array_merge($this->_data, $data);
        return $this;
    }

    public function setTemplate($template)
    {
        $this->_template = APP_PATH . self::VIEWS_DIR . $template . '.php';
        if (!file_exists($this->_template) || !is_readable($this->_template)) {
            throw new DrunkException('File not found: ' . $this->_template);
        }
        return $this;
    }

    public function addData($name, $value)
    {
        $this->_data[$name] = $value;
        return $this;
    }

    public function render()
    {
        extract($this->_data);
        ob_start();
        include $this->_template;
        $buffer = ob_get_contents();
        @ob_end_clean();
        return $buffer;
    }
}
