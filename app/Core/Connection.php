<?php
namespace Astro\Core;


class Connection {

    static $instance = null;

    protected function __construct() {

    }

    public static function getInstance() {
        if(self::$instance !== null) {
            return self::$instance;
        }
        return new Connection();
    }
}