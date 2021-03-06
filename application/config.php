<?php
defined('CORE_PATH') or exit('no access');

$config = array(
    /*
    Set URL for application
    */
    'baseUrl' => 'http://localhost/drunkmvc',
    /*
    URL mapping
    */
    'mappings' => array(
        'hello/world/(:num)' => 'bird/swag/$1',
        'hello/world/(:num)/(:num)' => 'bird/yolo/$1/$2',
        'product/(:num)' => 'product/view/$1',
        'samsung/(:any)/bird' => 'catalog/view/$0',
        'register' => 'welcome/register',
        'login' => 'welcome/login'
    ),
    /*
    Database connections
    */
    'database' => array(
        'dsn' => 'mysql:host=localhost;dbname=drunkdb;charset=utf8',
        'username' => 'root',
        'password' => '',
        'options' => array()
    ),
    /*
    Cookie settings
    */
    'cookie' => array(
        'expiration' => 900,
        'path' => '/'
    ),
    /*
    Data validations
    */
    'validator' => array(
        'myCustomValidationName' => array(
            /*'name' => ['required'],
            'date' => ['required', 'date'],
            'email' => ['email']*/
        )
    )
);

