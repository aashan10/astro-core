<?php

namespace Astro\Model;

use Astro\Core\Connection;
use Astro\Core\Data\DataObject;
use Astro\Core\Database\CrudQueries;
use Illuminate\Support\Collection;

abstract class Model extends CrudQueries
{
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
}
