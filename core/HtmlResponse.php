<?php
defined('CORE_PATH') or exit('no access');

class HtmlResponse extends BaseResponse
{
    const CONTENT_TYPE = 'text/html';
    private $output = '';

    protected function getOutput()
    {
        return $this->output;
    }

    public function setOutput($output)
    {
        $this->append($output);
    }

    private function append($output)
    {
        $this->output .= $output;
    }

    protected function getContentType()
    {
        return self::CONTENT_TYPE;
    }
}