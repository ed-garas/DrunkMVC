<?php
defined('CORE_PATH')or exit('no access');
class Router
{
    private $mappings;

    public function __construct(array $mappings = array())
    {
        foreach ($mappings as $pattern => $uri) {
            $pattern = str_replace(array(':any', ':num'), array('[^/]+', '\d+'), $pattern);
            $this->mappings[$pattern] = $uri;
        }
    }

    public function route(Request $request)
    {
        $segments = explode('/', $this->getUri($request));
        return Route::create($segments);
    }

    protected function getUri(Request $request)
    {
        $uri = $request->getUri();
        foreach ($this->mappings as $key => $value) {
            if (preg_match("#^$key$#", $uri)) {
                $uri = preg_replace("#^$key$#", $value, $uri);
                break;
            }
        }
        return $uri;
    }
}
