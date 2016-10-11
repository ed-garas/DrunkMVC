<?php
defined('CORE_PATH') or exit('no access');

abstract class BaseResponse
{
    protected abstract function getContentType();
    protected abstract function getOutput();
    public abstract function setOutput($output);

    public function send()
    {
        header('Content-Type: '.$this->getContentType().';charset=utf-8');
        echo $this->getOutput();
    }

}