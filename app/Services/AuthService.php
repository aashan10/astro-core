<?php

namespace Astro\Services;

use Astro\Model\User;
use DI\Container;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthService
{

    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function isLoggedIn(): bool
    {
        return true;
    }

    public function login(): ?Authenticatable
    {
        return null;
    }

    public function getUser(): User
    {
        return $this->container->make(User::class);
    }
}