<?php

namespace Astro\Core\Database;

use PDO;

class Connection
{
    protected $db;
    static $instance = null;

    protected function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public static function getInstance(PDO $db)
    {
        if (static::$instance === null) {
            static::$instance = new Connection($db);
        }
        return static::$instance;
    }

    public function getDb()
    {
        return $this->db;
    }
}