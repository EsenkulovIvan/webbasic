<?php

namespace App\Models;

use App\Connect\DataBase;
use PDO;

class Profile
{
    private $id;
    private $surname;
    private $name;
    private $jobTitle;
    private $company;
    private $education;
    private $gender;
    private $phone;
    private $aboutMe;
    private $userId;
    private $marriage;
    private $statusIsProfileSave;

    public function __set($name, $value)
    {
        $name = lcfirst(str_replace('_', '', ucwords($name, '_')));
        $this->$name = $value;
    }

    public static function renderList($query)
    {
        $dataBase = DataBase::getDataBaseObject();
        $prepare = $dataBase->getPdo()->prepare($query);
        $prepare->execute();
        $listUsers = $prepare->fetchAll(PDO::FETCH_CLASS, User::class);
        return $listUsers;

    }

    public static function getProfile($query, $input)
    {
        $dataBase = DataBase::getDataBaseObject();
        $prepare = $dataBase->getPdo()->prepare($query);
        $prepare->execute([$input]);
        $prepare->setFetchMode(PDO::FETCH_CLASS, Profile::class);
        $profile = $prepare->fetch();
        return $profile;

    }

    public static function writeQuestionnaire($query, $inputData)
    {
        if (empty($inputData['surname'])) {
            throw new \Exception('Не ввели фамилию');
        } elseif (empty($inputData['name'])) {
            throw new \Exception('Не ввели имя');
        } elseif (empty($inputData['jobTitle'])) {
            throw new \Exception('Не ввели должность');
        } elseif (empty($inputData['company'])) {
            throw new \Exception('Не ввели наименование компании');
        } elseif (empty($inputData['education'])) {
            throw new \Exception('Не ввели образовательное учреждение');
        } elseif (empty($inputData['gender'])) {
            throw new \Exception('Не выбрали пол');
        } elseif (empty($inputData['phone'])) {
            throw new \Exception('Не ввели номер телефона');
        }

        $dataBase = DataBase::getDataBaseObject();
        $prepare = $dataBase->getPdo()->prepare($query);
        return $prepare->execute([$inputData['surname'], $inputData['name'], $inputData['jobTitle'], $inputData['company'], $inputData['education'], $inputData['gender'], $inputData['phone'], $inputData['marriage'], $inputData['about'], $_SESSION['id'], $inputData['statusIsProfileSave']]);
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
    public function getStatusIsProfileSave()
    {
        return $this->statusIsProfileSave;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }
}