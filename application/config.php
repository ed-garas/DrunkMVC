<?php
$mappings['hello/world/(:num)'] = 'bird/swag/$1';
$mappings['hello/world/(:num)/(:num)'] = 'bird/yolo/$1/$2';
$mappings['product/(:num)'] = 'product/view/$1';
$mappings['samsung/(:any)/bird'] = 'catalog/view/$0';
/*$mappings['[^/]+(/[^/]+)*'] = 'catalog/view/$0';*/
/*$mappings[':any(/:any)*'] = 'catalog/view/$0';*/
