<?php

namespace Astro\Model;

use Astro\Traits\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableInterface;

/**
 * @method getFirstName
 * @method setFirstName(string $firstName)
 * @method getLastName
 * @method setLastName(string $firstName)
 * @method getEmail
 * @method setEmail(string $email)
 * @method getPassword
 * @method setPassword(string $password)
 */
class User extends Model implements AuthenticatableInterface
{
    use AuthenticatableTrait;
    protected $table = 'users';
    protected $primaryKey = 'user_id';

}