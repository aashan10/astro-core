<?php

use Astro\Controller\Auth\RegisterController;
use Astro\Controller\HomeController;
use Astro\Exceptions\NotFoundException;

global $routes;

$routes = [
    'home' => [
        'path' => '/^\/$/',
        'url' => '/',
        'action' => [
            'controller' => HomeController::class,
            'method' => 'index'
        ],
        'method' => 'GET',
    ],
    'register' => [
        'path' => '/^\/register$/',
        'url' => '/register',
        'action' => [
            'controller' => RegisterController::class,
            'method' => 'register'
        ],
        'method' => 'GET',
    ],
    'about' => [
        'path' => '/^\/about$/',
        'url' => '/about',
        'action' => [
            'controller' => HomeController::class,
            'method' => 'about'
        ],
        'method' => 'GET'
    ],
    'contact' => [
        'path' => '/^\/contact$/',
        'url' => '/contact',
        'action' => [
            'controller' => HomeController::class,
            'method' => 'contact'
        ],
        'method' => 'GET'
    ],
];


function route(string $name): string
{
    global $routes;

    if(isset($routes[$name])) {
        $basePath = $_SERVER['HTTP_HOST'];
        return $basePath . $routes[$name]['url'];
    }
    throw new NotFoundException( sprintf('Route `%s` is not registered. Please check your routes file!', $name));
}

return $routes;