<?php

namespace App\Models;

use App\Connect\DataBase;

class User
{
    private $email;
    private $password;
    private $nickname;
    private $role;

    public function __construction(string $email, string $password, string $nickname)
    {
        $this->email = $email;
        $this->password = $password;
        $this->nickname = $nickname;
    }

    public function readDataBase($query, $params)
    {
        $dataBase = DataBase::getDataBaseObject();
        $dataBase->getPdo()->prepare($query);
        $dataBase->getPdo()->execute([$params['email'], $params['password'], $params['nickname']]);
    }
    public function writeDataBase($query, $params)
    {
        $dataBase = DataBase::getDataBaseObject();
        $dataBase->getPdo()->prepare($query);
        $dataBase->getPdo()->execute([$params['email'], $params['password'], $params['nickname']]);
    }
}