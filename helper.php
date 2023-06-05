<?php

class DB{
    private static $connection = null;

    private function __construct(){
        self::$connection = new mysqli("localhost", "root","", "library");
    }

    public static function getConnection(){
        if (self::$connection == null) {
            self::$connection = new mysqli("localhost", "root","", "library");
        }

        return self::$connection;
    }
}

?>