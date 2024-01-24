<?php

namespace App\Models;

use App\Connect\DataBase;
use PDO;

class User
{
    private $id;
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
        if (empty($inputData['email'])) {
            throw new \Exception('Не ввели почтовый адрес');
        } elseif (empty($inputData['password'])) {
            throw new \Exception('Не ввели пароль');
        }


        $dataBase = DataBase::getDataBaseObject();
        $prepare = $dataBase->getPdo()->prepare($query);
        $prepare->execute([$inputData['email']]);
        $prepare->setFetchMode(PDO::FETCH_CLASS, User::class);
        $obj = $prepare->fetch();
        if (!($obj->email === $inputData['email'] && password_verify($inputData['password'], $obj->password))) {
            throw new \Exception('Пользователь не зарегестрирован');
        }
        return $obj;
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
        if ($inputData['password'] === $inputData['confirm']) {
            $password = password_hash($inputData['password'], PASSWORD_DEFAULT);
            $dataBase = DataBase::getDataBaseObject();
            $prepare = $dataBase->getPdo()->prepare($query);
            return $prepare->execute([$inputData['email'], $password, $inputData['nickname']]);
        } else {
            throw new \Exception('Введен неверный пароль');
        }

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}