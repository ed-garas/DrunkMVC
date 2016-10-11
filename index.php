<?php

$corePath = 'core';
$applicationPath = 'application';

if (($tmp = realpath($corePath)) !== false) {
    $corePath = $tmp . DIRECTORY_SEPARATOR;
}
if (!is_dir($corePath)) {
    exit('your core path conf. is invalid');
}
define('CORE_PATH', $corePath);

if (($tmp = realpath($applicationPath)) !== false) {
    $applicationPath = $tmp . DIRECTORY_SEPARATOR;
}
if (!is_dir($applicationPath)) {
    exit('your app path conf. is invalid');
}
define('APP_PATH', $applicationPath);

require_once(CORE_PATH . 'DrunkMVC.php');
