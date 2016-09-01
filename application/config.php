<?php
$mapping['hello/world'] = 'welcome/index';
$mapping['product/(\d+)'] = 'product/view/$1';
$mapping['samsung/smart/bird'] = 'catalog/view/$0';
$mapping['[^/]+(/[^/]+)*'] = 'catalog/view/$0';
