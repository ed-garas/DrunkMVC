<?php

class View
{
    const DEFAULT_TEMPLATE = 'default.php';

    protected $_template;
    protected $_data = array();

    public function __construct($template = self::DEFAULT_TEMPLATE, array $data = array())
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
        if (!file_exists($template) || !is_readable($template)) {
            throw new InvalidArgumentException('File not found: ' . $template);
        }
        $this->_template = $template;
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
