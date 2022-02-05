<?php

namespace Astro\Exceptions;

use Throwable;

class RouteNotFoundException extends \Exception
{
    public function __construct(string $route, string $method = '', $code = 0, Throwable $previous = null)
    {
        $message = strtoupper($method ? $method . ': ' : '') . "Route '" . $route . "' not found!";
        parent::__construct($message, $code, $previous);
    }

}