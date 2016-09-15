<?php
defined('CORE_PATH') or exit('no access');

class Cookie extends Singleton
{
    private $salt = 'ghjklfgkjhfshjfgvcdfghjhgfdfg258f5d6fgh5j8hg5fdfg5h8g5f2g5h87g5f2345sscxaaxxsa';
    private $path = '/';
    private $domain = null;
    private $secure = false;
    private $httpOnly = false;
    private $expiration = 3600;

    protected function __construct()
    {
        $cookie = Config::getInstance()->cookie;

        isset($cookie['salt']) && ($this->salt = $cookie['salt']);
        isset($cookie['path']) && ($this->path = $cookie['path']);
        isset($cookie['domain']) && ($this->domain = $cookie['domain']);
        isset($cookie['secure']) && ($this->secure = $cookie['secure']);
        isset($cookie['httpOnly']) && ($this->httpOnly = $cookie['httpOnly']);
        isset($cookie['expiration']) && ($this->expiration = $cookie['expiration']);
    }

    public function get($key, $default = null)
    {
        if (!isset($_COOKIE[$key])) {
            return $default;
        }
        list($hash, $value) = explode('|', $_COOKIE[$key], 2);
        if ($this->encrypt($key, $value) === $hash) {
            return $value;
        }
        $this->delete($key);
        return $default;
    }

    public function set($key, $value, $expiration = null)
    {
        if ($expiration === null) {
            $expiration = $this->expiration;
        }

        if ($expiration !== 0) {
            $expiration += time();
        }
        $value = $this->encrypt($key, $value) . '|' . $value;
        return setcookie($key, $value, $expiration, $this->path, $this->domain, $this->secure, $this->httpOnly);
    }

    public function delete($key)
    {
        unset($_COOKIE[$key]);
        $this->set($key, null, -3600); //todo edgarui padaryt
    }

    private function encrypt($key, $value)
    {
        $agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '-';
        return sha1($agent . $key . $value . $this->salt);
    }
}
