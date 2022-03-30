<?php
include_once __DIR__."/../.env.php";
// var_dump(getenv("BDDUSER"));
// die;
class MysqlConnect {
    public mysqli $link;
    private static $instance;

    private function __construct()
    {
        $this->link = mysqli_connect(getenv("BDDADD"), getenv("BDDUSER"), getenv("BDDMDP"), getenv("BDDNAME"));
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new static();
        } 
        return self::$instance;
    }
}
