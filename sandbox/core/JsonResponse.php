<?php
defined('CORE_PATH') or exit('no access');

class JsonResponse extends BaseResponse
{
    const CONTENT_TYPE = 'application/json';
    private $output;

    protected function getOutput()
    {
        return json_encode($this->output);
    }

    public function setOutput($output)
    {
        $this->output = $output;
    }

    protected function getContentType()
    {
        return self::CONTENT_TYPE;
    }
}