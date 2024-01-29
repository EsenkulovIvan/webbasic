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
        $email = htmlspecialchars($inputData['email']);
        $password = htmlspecialchars($inputData['password']);
        $dataBase = DataBase::getDataBaseObject();
        $prepare = $dataBase->getPdo()->prepare($query);
        $prepare->execute([$email]);
        $prepare->setFetchMode(PDO::FETCH_CLASS, User::class);
        $obj = $prepare->fetch();
        if (!((!empty($obj)) && $obj->getEmail() === $email && password_verify($password, $obj->getPassword()))) {
            throw new \Exception('Пользователь не зарегестрирован');
        }
        return $obj;
    }

    public static function writeDataBase($query, $inputData)
    {
        if (empty($inputData['nickname'])) {
            throw new \Exception('Не ввели имя пользователя');
        } elseif (empty($inputData['email'])) {
            throw new \Exception('Не ввели почтовый адрес');
        } elseif (empty($inputData['password'])) {
            throw new \Exception('Не ввели пароль');
        }
        $nickname = htmlspecialchars($inputData['nickname']);
        $email = htmlspecialchars($inputData['email']);
        $password = htmlspecialchars($inputData['password']);
        $confirm = htmlspecialchars($inputData['confirm']);
        if ($password === $confirm) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $dataBase = DataBase::getDataBaseObject();
            $prepare = $dataBase->getPdo()->prepare($query);
            $prepare->execute([$email, $passwordHash, $nickname]);
            $_SESSION['id'] = $dataBase->getPdo()->lastInsertId();
            return $prepare;
        } else {
            throw new \Exception('Введен неверный пароль');
        }
    }

    public static function getUser($query)
    {
        $dataBase = DataBase::getDataBaseObject();
        $prepare = $dataBase->getPdo()->prepare($query);
        $prepare->execute([$_SESSION['id']]);
        $prepare->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $prepare->fetch();
        return $user;
    }

    public static function deleteUser($query)
    {
                $dataBase = DataBase::getDataBaseObject();
                $prepare = $dataBase->getPdo()->prepare($query);
                $prepare->execute([$_SESSION['id']]);
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

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
}