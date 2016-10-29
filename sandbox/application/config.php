<?php
defined('CORE_PATH') or exit('no access');

$config = array(
    'baseUrl' => 'http://localhost/drunkmvc/sandbox/',
    'mappings' => array(
        'hello/world/(:num)' => 'bird/swag/$1',
        'hello/world/(:num)/(:num)' => 'bird/yolo/$1/$2',
        'product/(:num)' => 'product/view/$1',
        'samsung/(:any)/bird' => 'catalog/view/$0',
        'register' => 'welcome/register',
        'login' => 'welcome/login'
    ),
    'database' => array(
        'dsn' => 'mysql:host=localhost;dbname=drunkdb;charset=utf8',
        'username' => 'root',
        'password' => '',
        'options' => array()
    ),
    'cookie' => array(
        'expiration' => 900,
        'path' => '/'
    ),
    'validator' => array(
        'form/send' => array(
            'name' => ['required'],
            'date' => ['required', 'date'],
            'email' => ['email']
        ),
        'todo/create' => array(
            'task' => ['required']
        ),
        'registration' => array(
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        )
    )
);

/*$mappings['[^/]+(/[^/]+)*'] = 'catalog/view/$0';*/
/*$mappings[':any(/:any)*'] = 'catalog/view/$0';*/

