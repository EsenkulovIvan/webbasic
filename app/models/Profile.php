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
    private $familyStatus;
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

    public static function redactorProfile($query, $inputData)
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
        } elseif (empty($inputData['about'])) {
            throw new \Exception('Не ввели информацию о себе');
        }
        $surname = htmlspecialchars($inputData['surname']);
        $name = htmlspecialchars($inputData['name']);
        $jobTitle = htmlspecialchars($inputData['jobTitle']);
        $company = htmlspecialchars($inputData['company']);
        $education = htmlspecialchars($inputData['education']);
        $gender = htmlspecialchars($inputData['gender']);
        $phone = htmlspecialchars($inputData['phone']);
        $about = htmlspecialchars($inputData['about']);
        $familyStatus = htmlspecialchars(implode('-', $inputData['familyStatus']));
        $dataBase = DataBase::getDataBaseObject();
        $prepare = $dataBase->getPdo()->prepare($query);
        return $prepare->execute([$surname, $name, $jobTitle, $company, $education, $gender, $phone, $familyStatus, $about, $_SESSION['id']]);
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
        } elseif (empty($inputData['about'])) {
            throw new \Exception('Не ввели информацию о себе');
        }
        $surname = htmlspecialchars($inputData['surname']);
        $name = htmlspecialchars($inputData['name']);
        $jobTitle = htmlspecialchars($inputData['jobTitle']);
        $company = htmlspecialchars($inputData['company']);
        $education = htmlspecialchars($inputData['education']);
        $gender = htmlspecialchars($inputData['gender']);
        $phone = htmlspecialchars($inputData['phone']);
        $about = htmlspecialchars($inputData['about']);
        $familyStatus = htmlspecialchars(implode('-', $inputData['familyStatus']));
        $dataBase = DataBase::getDataBaseObject();
        $prepare = $dataBase->getPdo()->prepare($query);
        return $prepare->execute([$surname, $name, $jobTitle, $company, $education, $gender, $phone, $familyStatus, $about, $_SESSION['id'], $inputData['statusIsProfileSave']]);
    }

    public static function deleteProfile($query)
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

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return mixed
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getAboutMe()
    {
        return $this->aboutMe;
    }

    /**
     * @return mixed
     */
    public function getFamilyStatus()
    {
        return $this->familyStatus;
    }
}