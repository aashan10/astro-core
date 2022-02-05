<?php
namespace Astro\Model;

use Astro\Core\Connection;

abstract class Model
{
    protected $connection;
    protected $table;

    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }
}