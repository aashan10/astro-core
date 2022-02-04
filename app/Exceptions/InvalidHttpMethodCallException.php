<?php

namespace Astro\Exceptions;

use Throwable;

class InvalidHttpMethodCallException extends \Exception
{
    public function __construct(string $method, string $route, $code = 0, Throwable $previous = null)
    {
        parent::__construct('Method: ' . strtoupper($method) . ' is not available for route ' . $route, $code, $previous);
    }

}