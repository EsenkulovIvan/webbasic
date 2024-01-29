<?php

namespace App\Controllers;

use App\Connect\DataBase;
use App\Models\Profile;
use App\Models\User;
use App\Views\RenderView;

class UserController
{
    public function logIn($arr)
    {
        if (!empty($_POST)) {
            try {
                $query = 'SELECT * FROM `user` WHERE email = ?';
                $user = User::readDataBase($query, $_POST);
                $_SESSION['id'] = $user->getId();
                $query = 'SELECT * FROM `profile` WHERE user_id = ?';
                $profile = Profile::getProfile($query, $user->getId());
                if (!empty($user)) {
                    if (!empty($profile)) {
                        $_SESSION['isProfileSave'] = $profile->getStatusIsProfileSave();
                        $_SESSION['userId'] = $profile->getUserId();
                    }
                    $_SESSION['auth'] = true;
                    $_SESSION['flash'] = 'Авторизация прошла успешно';
                    header('Location: /content/profile/list');
                    die;
                }
                RenderView::getRenderViewObject()->renderTemplate($arr, $user);
            } catch (\Exception $e) {
                $arr['error'] = 'Ошибка! ' . $e->getMessage();
                RenderView::getRenderViewObject()->renderTemplate($arr);
            }
        } elseif (isset($_SESSION['auth'])) {
            header('Location: /content/profile/list');
            die;
        } else {
            RenderView::getRenderViewObject()->renderTemplate($arr);
        }
    }

    public function logOut()
    {
        session_destroy();
        header('Location: /content/profile/list');
        die;
    }
    public function register($arr)
    {
        if (!empty($_POST)) {
            try {
                $query = 'INSERT INTO `user` (email, password, nickname) VALUES (?, ?, ?)';
                $success = User::writeDataBase($query, $_POST);
                if ($success) {
                    $_SESSION['auth'] = true;
                    $_SESSION['flash'] = 'Вы успешно зарегестрировались';
                    header('Location: /content/profile/list');
                    die;
                }
            } catch (\Exception $e) {
                $arr['error'] = 'Ошибка! ' . $e->getMessage();
                RenderView::getRenderViewObject()->renderTemplate($arr);
            }
        } else {
            RenderView::getRenderViewObject()->renderTemplate($arr);
        }
    }

    public function deleteAccount($arr)
    {
        if (isset($_SESSION['auth'])) {
            if (!empty($_POST)) {
                $query = 'SELECT * FROM `user` WHERE id = ?';
                try {
                    $user = User::getUser($query);
                    var_dump($_SESSION);
                    var_dump($user);
                    if (password_verify($_POST['password'], $user->getPassword())) {
                        $query = 'DELETE FROM `user` WHERE id = ?';
                        User::deleteUser($query);
                        $query = 'DELETE FROM `profile` WHERE user_id = ?';
                        Profile::deleteProfile($query);
                        session_destroy();
                        header('Location: /content/profile/list');
                        die;
                    } else {
                        $_SESSION['flash'] = 'Пароль неверный';
                        header('Location: /content/profile/list');
                        die;
                    }
                } catch (\Exception $e) {
                    $arr['error'] = $e->getMessage();
                    RenderView::getRenderViewObject()->renderTemplate($arr);
                    die;
                }
            } else {
                RenderView::getRenderViewObject()->renderTemplate($arr);
            }
        } else {
            header('Location: /auth/user/log');
            die;
        }
    }
}