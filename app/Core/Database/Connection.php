<?php

namespace Astro\Core\Database;

use PDO;

class Connection
{
    protected ?PDO $db;
    static $instance = null;

    protected function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function __destruct()
    {
        $this->db = null;
    }

    /**
     * @param PDO|null $db
     * @return null
     * @internal This method creates a static object containing a PDO object for db connection that will be used throughout the system.
     * Use factory to generate this class through the container before using getInstance method.
     */
    public static function getInstance(PDO $db = null)
    {
        if (static::$instance === null) {
            static::$instance = new Connection($db);
        }
        return static::$instance;
    }

    public function getDb(): ?PDO
    {
        return $this->db;
    }
}