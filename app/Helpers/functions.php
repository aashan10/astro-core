<?php

use Astro\Model\User;
use Astro\Services\AuthService;

if(!function_exists('ev')) {
    function ev($name, $default = null) {
        return $_ENV[$name] ?? $default;
    }
}

if (!function_exists('user')) {
    function user()
    {

    }
}

if (!function_exists('auth')) {
    function auth() : ?User
    {
        /** @var AuthService $authService */
        $authService = Application::getInstance()->getContainer()->get(AuthService::class);
        return $authService->isLoggedIn() ? $authService->getUser() : null;
    }
}