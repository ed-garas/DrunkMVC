<?php

class UrlHelper extends Singleton
{
    protected static $instance = null;

    public static function getBaseUrl()
    {
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
        echo $protocol.$hostName."/";
    }

}