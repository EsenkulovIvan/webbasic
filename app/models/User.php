<?php

namespace app\models;

class User
{
    private $email;
    private $password;
    private $profileId;

    public function __construction(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}