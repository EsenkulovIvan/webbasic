<?php

namespace App\Connect;

use PDO;

class DataBase
{
    private static $dataBaseObject;
    private $pdo;

    public function getPdo()
    {
        return $this->pdo;
    }

    private function __construct()
    {
        require_once __DIR__ . '/../../app/config/connection.php';
        $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
    }

    public static function getDataBaseObject()
    {
        if (self::$dataBaseObject === null) {
            self::$dataBaseObject = new DataBase();
        }
        return self::$dataBaseObject;
    }
}