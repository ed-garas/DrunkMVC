<?php

class UrlHelper
{
    public static function getBaseUrl()
    {
        return trim(Config::getInstance()->baseUrl, '/');
    }

    public static function getUrl($uri)
    {
        return self::getBaseUrl() .'/'. trim($uri, '/');
    }

}