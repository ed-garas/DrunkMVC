<?php
defined('CORE_PATH')or exit('no access');

$config = array(
    'mappings'=>array(
        'hello/world/(:num)'=>'bird/swag/$1',
        'hello/world/(:num)/(:num)'=>'bird/yolo/$1/$2',
        'product/(:num)'=>'product/view/$1',
        'samsung/(:any)/bird'=>'catalog/view/$0'
    ),
    'database'=>array(
        'dsn'=>'mysql:host=localhost;dbname=wordpress;charset=utf8',
        'username'=>'',
        'password'=>'',
        'options'=>array()
    ),
    'cookie'=>array(
        'expiration'=>900,
        'path'=>'/'
    ),
    'validator'=>array(
        'form/send'=>array(
            'name'=>['required'],
            'date'=> ['required', 'date'],
            'email'=> ['email']
        )
    )
);

/*$mappings['[^/]+(/[^/]+)*'] = 'catalog/view/$0';*/
/*$mappings[':any(/:any)*'] = 'catalog/view/$0';*/

