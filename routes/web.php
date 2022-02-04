<?php

use Astro\Controller\HomeController;

return $routes = [
    'home' => [
        'path' => '/^\/$/',
        'action' => [
            'controller' => HomeController::class,
            'method' => 'index'
        ],
        'method' => 'GET',
    ],
    'about' => [
        'path' => '/^\/about$/',
        'action' => [
            'controller' => HomeController::class,
            'method' => 'about'
        ],
        'method' => 'GET'
    ],
    'contact' => [
        'path' => '/^\/contact$/',
        'action' => [
            'controller' => HomeController::class,
            'method' => 'contact'
        ],
        'method' => 'GET'
    ],
];
