<?php

namespace Astro\Model;

use Astro\Core\Database\Connection;
use Astro\Core\Database\CrudQueries;

abstract class Model extends CrudQueries
{
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
}
