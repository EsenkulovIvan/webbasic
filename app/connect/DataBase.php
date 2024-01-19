<?php

namespace App\Connect;

use PDO;

class DataBase
{
    private static self $dataBaseObject;
    private $pdo;

    public function getPdo()
    {
        return $this->pdo;
    }

    private function __construction(): void
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