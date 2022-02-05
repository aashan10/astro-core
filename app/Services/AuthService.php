<?php

namespace Astro\Services;

use Illuminate\Contracts\Auth\Authenticatable;

class AuthService
{

    public function isLoggedIn(): bool
    {
        return false;
    }

    public function login(): ?Authenticatable
    {
        return null;
    }
}