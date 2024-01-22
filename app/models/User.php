<?php

namespace App\Models;

use App\Connect\DataBase;
use PDO;

class User
{
    private $email;
    private $password;
    private $nickname;
    private $role;
    private $createdAt;

    public function __set($name, $value)
    {
        $name = lcfirst(str_replace('_', '', ucwords($name, '_')));
        $this->$name = $value;
    }

    public static function readDataBase($query, $inputData)
    {
        $dataBase = DataBase::getDataBaseObject();
        $prepare = $dataBase->getPdo()->prepare($query);
        $prepare->execute([$inputData['email']]);
        $prepare->setFetchMode(PDO::FETCH_CLASS, User::class);

        while ($obj = $prepare->fetch()) {
            if ($obj->email === $inputData['email'] && $obj->password === $inputData['password']) {
                return $obj;
            }
        }
        throw new \Exception('Пользователь не зарегестрирован');
    }
    public static function writeDataBase($query, $inputData)
    {
        if (empty($inputData['nickname'])) {
            throw new \Exception('Не ввели имя пользователя');
        } elseif (empty($inputData['password'])) {
            throw new \Exception('Не ввели пароль');
        } elseif (empty($inputData['email'])) {
            throw new \Exception('Не ввели почтовый адрес');
        }

        $dataBase = DataBase::getDataBaseObject();
        $prepare = $dataBase->getPdo()->prepare($query);
        return $prepare->execute([$inputData['email'], $inputData['password'], $inputData['nickname']]);
    }
}