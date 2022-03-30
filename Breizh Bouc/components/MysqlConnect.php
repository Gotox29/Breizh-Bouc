<?php
include_once __DIR__."/../.env.php";
class MysqlConnect {
    public mysqli $link;
    private static $instance;

    private function __construct()
    {
        $this->link = mysqli_connect("database", getenv("BDDUSER"), getenv("BDDMDP"), getenv("BDDNAME"));
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new static();
        } 
        return self::$instance;
    }
}
