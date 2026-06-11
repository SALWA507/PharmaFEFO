<?php

class Database
{
    public static function connect()
    {
        return new PDO(
            "mysql:host=localhost;dbname=pharmafefo;charset=utf8",
            "root",
            ""
        );
    }
}