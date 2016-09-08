<?php
defined('CORE_PATH') or exit('no access');

class Response
{
    private $output = '';

    public function append($output)
    {
        $this->output .= $output;
    }

    public function send()
    {
        echo $this->output;
    }

}