<?php


const BASE_PATH = __DIR__;

ini_set('display_errors', E_ALL);

if (file_exists(BASE_PATH . '/vendor/autoload.php')) {
    require_once BASE_PATH . '/vendor/autoload.php';
}

if(file_exists(BASE_PATH . '/boot/Application.php')) {
    require_once BASE_PATH . '/boot/Application.php';

    $app = new Application;
    $app->run();
}
