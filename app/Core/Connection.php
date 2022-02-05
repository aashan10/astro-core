<?php
namespace Astro\Core;

use PDO;

use function DI\get;

class Connection {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public function getDb() {
        return $this->db;
    }
}