<?php

namespace app\connect;

class DataBase
{
    private static $dataBaseObject;
    private $pdo;
    private function __construction()
    {
        $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
    }

    public static function getDataBaseObject(): DataBase
    {
        if (self::$dataBaseObject === null) {
            self::$dataBaseObject = new DataBase();
        }
        return self::$dataBaseObject;
    }
}