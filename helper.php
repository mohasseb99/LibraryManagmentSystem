<?php

class DB{
    public static function getConnection(){
        return $conn= new mysqli("localhost", "root","", "newdb");
    }
}

?>